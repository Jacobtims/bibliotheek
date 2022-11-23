<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreReaderRequest;
use App\Http\Requests\UpdateReaderRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReaderController extends Controller
{
    public function index()
    {
        $users = User::role('Lezer')->withWhereHas('reader')->with('subscription.subscriptionPlan')->paginate(10);

        return view('pages.dashboard.readers.index', compact('users'));
    }

    public function create()
    {
        return view('pages.dashboard.readers.create');
    }

    public function store(StoreReaderRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->reader()->create([
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'phone' => $request->phone
        ]);
        $user->assignRole('Lezer');

        return redirect()->route('dashboard.readers.index')->with('success', 'Lezer succesvol aangemaakt!');
    }

    public function edit(User $user)
    {
        $user->load('reader');

        return view('pages.dashboard.readers.edit', compact('user'));
    }

    public function update(UpdateReaderRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));
        $user->reader()->update($request->only(['address', 'postal_code', 'city', 'state', 'country', 'phone']));

        // Only update password if set
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('dashboard.readers.index')->with('success', 'Lezer succesvol aangepast!');
    }

    public function destroy(User $user)
    {
        $user->reader()->delete();
        $user->delete();

        return back()->with('success', 'Lezer succesvol verwijderd!');
    }
}
