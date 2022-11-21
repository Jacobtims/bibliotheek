<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $users = User::role('Personeel')->withWhereHas('employee')->paginate(10);

        return view('pages.dashboard.employees.index', compact('users'));
    }

    public function create()
    {
        return view('pages.dashboard.employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->employee()->create(['hired_at' => $request->hired_at]);
        $user->assignRole('Personeel');

        return redirect()->route('dashboard.employees.index')->with('success', 'Personeelslid succesvol aangemaakt!');
    }

    public function edit(User $user)
    {
        $user->load('employee');

        return view('pages.dashboard.employees.edit', compact('user'));
    }

    public function update(UpdateEmployeeRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));
        $user->employee()->update(['hired_at' => $request->hired_at]);

        // Only update password if set
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('dashboard.employees.index')->with('success', 'Personeelslid succesvol aangepast!');
    }

    public function destroy(User $user)
    {
        $user->employee()->delete();
        $user->delete();

        return back()->with('success', 'Personeelslid succesvol verwijderd!');
    }
}
