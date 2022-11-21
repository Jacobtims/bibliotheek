<x-app-layout>
    <div class="max-w-7xl mx-auto py-12">
        <x-card class="max-w-2xl sm:px-6 lg:px-8 py-6 lg:py-8">
            <h1 class="text-2xl font-semibold mb-7">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                <a href="{{ route('dashboard.readers.index') }}" class="underline">Lezer gegevens</a> /
                {{ $user->name }}
            </h1>

            <form method="POST" action="{{ route('dashboard.readers.update', $user->id) }}">
                @csrf @method('PUT')
                <div>
                    <x-input-label for="name" value="Naam"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Naam"
                                  :value="old('name', $user->name)" required autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="address" value="Adres"/>
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" placeholder="Adres"
                                  :value="old('address', $user->reader->address)" required/>
                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                </div>

                <div class="mt-4 flex flex-col lg:flex-row gap-4">
                    <div class="w-full lg:w-1/3">
                        <x-input-label for="postal_code" value="Postcode"/>
                        <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code"
                                      placeholder="Postcode" :value="old('postal_code', $user->reader->postal_code)"
                                      required/>
                        <x-input-error :messages="$errors->get('postal_code')" class="mt-2"/>
                    </div>

                    <div class="w-full lg:w-2/3">
                        <x-input-label for="city" value="Woonplaats"/>
                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                      placeholder="Woonplaats" :value="old('city', $user->reader->city)" required/>
                        <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                    </div>
                </div>

                <div class="mt-4 flex flex-col lg:flex-row gap-4">
                    <div class="w-full lg:w-1/2">
                        <x-input-label for="state" value="Provincie"/>
                        <x-text-input id="state" class="block mt-1 w-full" type="text" name="state"
                                      placeholder="Provincie" :value="old('state', $user->reader->state)" required/>
                        <x-input-error :messages="$errors->get('state')" class="mt-2"/>
                    </div>

                    <div class="w-full lg:w-1/2">
                        <x-input-label for="country" value="Land"/>
                        <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                                      placeholder="Land" :value="old('country', $user->reader->country)" required/>
                        <x-input-error :messages="$errors->get('country')" class="mt-2"/>
                    </div>
                </div>

                <div class="mt-4">
                    <x-input-label for="email" value="E-mailadres"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                  placeholder="E-mailadres" :value="old('email', $user->email)" required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="phone" value="Telefoonnummer"/>
                    <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone"
                                  placeholder="Telefoonnummer" :value="old('phone', $user->reader->phone)" required/>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="password" value="Wachtwoord"/>
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                  placeholder="Wachtwoord"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" value="Bevestig wachtwoord"/>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                  name="password_confirmation" placeholder="Bevestig wachtwoord"/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>

                <div class="mt-8">
                    <x-buttons.green-button>
                        Lezer aanpassen
                    </x-buttons.green-button>
                </div>
            </form>
        </x-card>
    </div>
</x-app-layout>
