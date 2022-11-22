<x-guest-layout>
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600">
            Bedankt voor het aanmelden! Zou je, voordat je aan de slag gaat,
            je e-mailadres kunnen verifiëren door op de link te klikken die we je zojuist per e-mail hebben gestuurd?
            Als je de e-mail niet hebt ontvangen, sturen we je graag een andere.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Er is een nieuwe verificatielink verzonden naar het e-mailadres dat u tijdens de registratie hebt opgegeven.
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-buttons.primary-button>
                        Verificatie e-mail opnieuw verzenden
                    </x-buttons.primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Uitloggen
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
