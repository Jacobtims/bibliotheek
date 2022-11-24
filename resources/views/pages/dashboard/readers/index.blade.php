<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 lg:py-8">
            <!-- Breadcrumb -->
            <div class="mb-5">
                <h1 class="text-2xl font-semibold">
                    <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                    Lezer gegevens
                </h1>
            </div>

            <!-- Search field & create button -->
            <div class="mb-4 flex flex-col sm:flex-row gap-4 justify-between">
                <form class="flex space-x-2" action="{{ route('dashboard.readers.index') }}" method="GET">
                    <x-text-input type="search" name="query" class="block w-96"
                                  placeholder="Zoek op naam of e-mailadres"
                                  value="{{ request('query') }}"/>
                    <x-buttons.primary-button class="inline-flex justify-center items-center">
                        <span class="material-symbols-outlined -mx-2">search</span>
                    </x-buttons.primary-button>
                </form>

                <a href="{{ route('dashboard.readers.create') }}" class="whitespace-nowrap">
                    <x-buttons.green-button>
                        Nieuwe lezer
                    </x-buttons.green-button>
                </a>
            </div>

            <!-- All readers -->
            <x-responsive-table>
                <table class="table-auto w-full">
                    <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                    <tr>
                        <th class="py-3 pl-5">Naam</th>
                        <th class="py-3 px-5">E-mailadres</th>
                        <th class="py-3 px-5">Abonnement</th>
                        <th class="py-3 pr-5"></th>
                    </tr>
                    </thead>
                    <tbody class="font-medium">
                    @foreach($users as $user)
                        <tr class="even:bg-table-row">
                            <td class="py-4 pl-5 font-semibold">{{ $user->name }}</td>
                            <td class="py-4 px-5">{{ $user->email }}</td>
                            <td class="py-4 px-5">{{ $user->subscription ? $user->subscription->subscriptionPlan->name : 'Geen' }}</td>
                            <td class="py-4 pr-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <a href="{{ route('dashboard.readers.show', $user->id) }}">
                                        <span class="material-symbols-outlined mt-1.5 -mb-1">visibility</span>
                                    </a>
                                    <a href="{{ route('dashboard.readers.edit', $user->id) }}">
                                        <span class="material-symbols-outlined">edit_square</span>
                                    </a>
                                    <form action="{{ route('dashboard.readers.destroy', $user->id) }}" method="POST"
                                          class="inline-flex">
                                        @csrf @method('DELETE')
                                        <button>
                                            <span class="material-symbols-outlined mt-1">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-responsive-table>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </x-card>
    </div>
</x-app-layout>
