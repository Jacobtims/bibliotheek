<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 lg:py-8">
            <h1 class="text-2xl font-semibold mb-7">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                <a href="{{ route('dashboard.notifications.index') }}" class="underline">Notificaties</a> /
                Edit
            </h1>

            <form method="POST" action="{{ route('dashboard.notifications.update', $notification->id) }}"
                  class="w-full md:w-1/2">
                @csrf @method('PUT')
                <div>
                    <x-input-label for="role" value="Rol"/>
                    <x-select id="role" class="block mt-1 w-full" type="text" name="role_id" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id', $notification->role_id) == $role->id ? "selected" : "" }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('rol_id')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="notification" value="Notificatie"/>
                    <x-text-area id="notification" class="block mt-1 w-full" rows="6" name="notification"
                                 placeholder="Notificatie" :value="old('notification', $notification->notification)" required/>
                    <x-input-error :messages="$errors->get('notification')" class="mt-2"/>
                </div>

                <div class="mt-8">
                    <x-buttons.green-button>
                        Notificatie aanpassen
                    </x-buttons.green-button>
                </div>
            </form>
        </x-card>
    </div>
</x-app-layout>
