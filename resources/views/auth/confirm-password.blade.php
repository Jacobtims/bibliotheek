<x-guest-layout>
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600">
            Dit is een beveiligd deel van de applicatie. Bevestig je wachtwoord voordat je verder gaat.
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" value="Wachtwoord" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-4">
                <x-buttons.primary-button>
                    Bevestig
                </x-buttons.primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
