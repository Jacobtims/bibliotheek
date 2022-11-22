<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-5xl">
            <h1 class="text-2xl font-medium text-center mb-10">Kies een abonnement om boeken te kunnen lenen</h1>

            <div class="flex items-center gap-6">
                <!-- Basis subscription -->
                <x-card class="w-full">
                    <!-- Subscription title & price -->
                    <div class="border-b border-gray-300 pb-4 flex space-x-4">
                        <div class="bg-orange-300 w-16 h-16 rounded-lg"></div>
                        <div>
                            <h1 class="text-2xl font-semibold mb-1">Basis</h1>
                            <h2>
                                <span class="text-base font-normal text-gray align-top">€</span>
                                <span class="text-2xl font-bold">5</span>
                                <span class="text-sm font-normal text-gray">/ maand</span>
                            </h2>
                        </div>
                    </div>
                    <!-- Subscription features -->
                    <div class="mt-4">
                        <p class="inline-flex gap-1">
                            <span class="material-symbols-outlined text-gray">done</span>
                            <strong>5 boeken</strong> lenen
                        </p>
                    </div>
                    <!-- Choose plan button -->
                    <form action="{{ route('subscriptions.purchase', 1) }}" method="POST" class="flex justify-end mt-4">
                        @csrf
                        <x-buttons.primary-button>
                            Kies dit abonnement
                        </x-buttons.primary-button>
                    </form>
                </x-card>

                <!-- Standaard subscription -->
                <x-card class="w-full">
                    <div class="flex justify-end">
                        <button class="px-4 py-1 bg-blue-700 text-white text-sm rounded-full">Populair</button>
                    </div>
                    <!-- Subscription title & price -->
                    <div class="border-b border-gray-300 pb-4 flex space-x-4">
                        <div class="bg-emerald-300 w-16 h-16 rounded-lg"></div>
                        <div>
                            <h1 class="text-2xl font-semibold mb-1">Standaard</h1>
                            <h2>
                                <span class="text-base font-normal text-gray align-top">€</span>
                                <span class="text-2xl font-bold">10</span>
                                <span class="text-sm font-normal text-gray">/ maand</span>
                            </h2>
                        </div>
                    </div>
                    <!-- Subscription features -->
                    <div class="mt-4">
                        <p class="inline-flex gap-1">
                            <span class="material-symbols-outlined text-gray">done</span>
                            <strong>10 boeken</strong> lenen
                        </p>
                    </div>
                    <!-- Choose plan button -->
                    <form action="{{ route('subscriptions.purchase', 2) }}" method="POST" class="flex justify-end mt-4">
                        @csrf
                        <x-buttons.primary-button>
                            Kies dit abonnement
                        </x-buttons.primary-button>
                    </form>
                </x-card>

                <!-- Premium subscription -->
                <x-card class="w-full">
                    <!-- Subscription title & price -->
                    <div class="border-b border-gray-300 pb-4 flex space-x-4">
                        <div class="bg-indigo-300 w-16 h-16 rounded-lg"></div>
                        <div>
                            <h1 class="text-2xl font-semibold mb-1">Premium</h1>
                            <h2>
                                <span class="text-base font-normal text-gray align-top">€</span>
                                <span class="text-2xl font-bold">15</span>
                                <span class="text-sm font-normal text-gray">/ maand</span>
                            </h2>
                        </div>
                    </div>
                    <!-- Subscription features -->
                    <div class="mt-4">
                        <p class="inline-flex gap-1">
                            <span class="material-symbols-outlined text-gray">done</span>
                            <strong>15 boeken</strong> lenen
                        </p>
                    </div>
                    <!-- Choose plan button -->
                    <form action="{{ route('subscriptions.purchase', 3) }}" method="POST" class="flex justify-end mt-4">
                        @csrf
                        <x-buttons.primary-button>
                            Kies dit abonnement
                        </x-buttons.primary-button>
                    </form>
                </x-card>
            </div>
        </div>
    </div>
</x-guest-layout>
