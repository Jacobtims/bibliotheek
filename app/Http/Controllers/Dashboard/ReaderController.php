<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReaderRequest;
use App\Http\Requests\UpdateReaderRequest;
use App\Models\LentBook;
use App\Models\ReservedBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReaderController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'query' => ['nullable', 'string', 'max:255']
        ]);

        $users = User::role('Lezer')
            ->withWhereHas('reader')
            ->with('subscription.subscriptionPlan')
            ->search($request->input('query'))
            ->paginate(10)
            ->withQueryString();

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

    public function show(User $user)
    {
        // Load reader info
        $user->load('reader');

        // Get fines
        $lentBooks = LentBook::whereUserId($user->id)
            ->whereNull('returned_at')
            ->get()
            ->map(function ($lentBook) {
                // Difference between lent_until and today
                $diff = $lentBook->days_overdue;
                // Difference * fine amount
                $lentBook->fine = $diff > 0 ? $diff * 0.50 : 0.00;

                return $lentBook;
            });
        $fines = $lentBooks->sum('fine');

        // Lent books
        $lentBooks = LentBook::whereUserId($user->id)->with('book')
            ->whereNull('returned_at')
            ->orderByDesc('lent_at')
            ->paginate(10, ['*'], 'lent-books');

        // Reserved books
        $reservedBooks = ReservedBook::whereUserId($user->id)->with('book')
            ->latest()
            ->paginate(10, ['*'], 'reserverd-books');

        return view('pages.dashboard.readers.show', compact('user', 'fines', 'lentBooks', 'reservedBooks'));
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
