<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 lg:py-8">
            <div class="flex items-center justify-between mb-7">
                <h1 class="text-2xl font-semibold">
                    <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                    Notificaties
                </h1>
                <a href="{{ route('dashboard.notifications.create') }}">
                    <x-buttons.green-button>
                        Nieuwe notificatie
                    </x-buttons.green-button>
                </a>
            </div>

            <x-responsive-table>
                <table class="table-auto w-full">
                    <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                    <tr>
                        <th class="py-3 pl-5">Voor rol</th>
                        <th class="py-3 px-5">Notificatie</th>
                        <th class="py-3 px-5">Verstuurd op</th>
                        <th class="py-3 pr-5"></th>
                    </tr>
                    </thead>
                    <tbody class="font-medium">
                    @foreach($notifications as $notification)
                        <tr class="even:bg-table-row">
                            <td class="py-4 pl-5 font-semibold">{{ $notification->role->name }}</td>
                            <td class="py-4 px-5">{{ $notification->notification }}</td>
                            <td class="py-4 px-5 whitespace-nowrap">{{ \Carbon\Carbon::parse($notification->created_at)->translatedFormat('d F Y') }}</td>
                            <td class="py-4 pr-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <a href="{{ route('dashboard.notifications.edit', $notification->id) }}">
                                        <span class="material-symbols-outlined">edit_square</span>
                                    </a>
                                    <form action="{{ route('dashboard.notifications.destroy', $notification->id) }}"
                                          method="POST" class="inline-flex">
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

            <div class="mt-6">
                {{ $notifications->links() }}
            </div>
        </x-card>
    </div>
</x-app-layout>
