<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 lg:py-8">
            <h1 class="text-2xl font-semibold mb-7">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                <a href="{{ route('dashboard.employees.index') }}" class="underline">Personeel gegevens</a> /
                {{ $user->name }}
            </h1>

            <form method="POST" action="{{ route('dashboard.employees.update', $user->id) }}" class="w-full md:w-1/2">
                @csrf @method('PUT')

                <div>
                    <x-input-label for="name" value="Naam" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Naam" :value="old('name', $user->name)" required autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" value="E-mailadres" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" placeholder="E-mailadres" :value="old('email', $user->email)" required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" value="Wachtwoord" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Wachtwoord"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" value="Bevestig wachtwoord" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="Bevestig wachtwoord"/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="hired_at" value="Aangenomen op" />
                    <x-text-input id="hired_at" class="block mt-1 w-full" type="date" name="hired_at" placeholder="Aangenomen op" :value="old('hired_at', $user->employee->hired_at)" required/>
                    <x-input-error :messages="$errors->get('hired_at')" class="mt-2" />
                </div>

                <div class="mt-8">
                    <x-buttons.green-button>
                        Personeelslid aanpassen
                    </x-buttons.green-button>
                </div>
            </form>
        </x-card>
    </div>
</x-app-layout>
