<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('role')->paginate(10);

        return view('pages.dashboard.notifications.index', compact('notifications'));
    }

    public function create()
    {
        $roles = Role::whereIn('name', ['Personeel', 'Lezer'])->get();

        return view('pages.dashboard.notifications.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
            'notification' => ['required', 'string', 'max:1000']
        ]);

        Notification::create($request->only(['role_id', 'notification']));

        return redirect()->route('dashboard.notifications.index')->with('success', 'Notificatie succesvol aangemaakt!');
    }

    public function edit(Notification $notification)
    {
        $roles = Role::whereIn('name', ['Personeel', 'Lezer'])->get();

        return view('pages.dashboard.notifications.edit', compact('roles', 'notification'));
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
            'notification' => ['required', 'string', 'max:1000']
        ]);

        $notification->update($request->only(['role_id', 'notification']));

        return redirect()->route('dashboard.notifications.index')->with('success', 'Notificatie succesvol aangepast!');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return back()->with('success', 'Notificatie succesvol verwijderd!');
    }
}
