<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <x-card class="w-full sm:max-w-md">
            <form method="POST" action="{{ route('subscriptions.purchase') }}">
                @csrf
                <div>
                    <x-input-label for="subscription" value="Abonnement"/>
                    <x-select id="subscription" class="block mt-1 w-full" type="text" name="subscription" required>
                        <option disabled selected>Selecteer een abonnement</option>
                        @foreach($subscriptions as $subscription)
                            <option value="{{ $subscription->code }}">
                                {{ $subscription->name }}
                                (&euro;{{ $subscription->price }} / per jaar)
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('subscription')" class="mt-2"/>
                </div>

                <div class="flex items-center justify-end mt-8">
                    <x-buttons.primary-button>
                        Koop abonnement
                    </x-buttons.primary-button>
                </div>
            </form>
        </x-card>
    </div>
</x-guest-layout>
