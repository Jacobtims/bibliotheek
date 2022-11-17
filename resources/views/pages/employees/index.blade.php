<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 lg:py-8">
            <div class="flex items-center justify-between mb-7">
                <h1 class="text-2xl font-semibold">
                    <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                    Personeel gegevens
                </h1>
                <a href="{{ route('employees.create') }}">
                    <x-buttons.green-button>
                        Nieuw personeelslid
                    </x-buttons.green-button>
                </a>
            </div>

            <table class="table-auto w-full">
                <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                <tr>
                    <th class="py-3 pl-5">Naam</th>
                    <th class="py-3">E-mailadres</th>
                    <th class="py-3">Aangenomen op</th>
                    <th class="py-3 pr-5"></th>
                </tr>
                </thead>
                <tbody class="font-medium">
                @foreach($users as $user)
                    <tr class="even:bg-table-row">
                        <td class="py-4 pl-5 font-semibold">{{ $user->name }}</td>
                        <td class="py-4">{{ $user->email }}</td>
                        <td class="py-4">{{ \Carbon\Carbon::parse($user->employee->hired_at)->translatedFormat('d F Y') }}</td>
                        <td class="py-4 pr-5">
                            <div class="flex items-center justify-end space-x-1">
                                <a href="{{ route('employees.edit', $user->id) }}">
                                    <span class="material-symbols-outlined">edit_square</span>
                                </a>
                                <form action="{{ route('employees.destroy', $user->id) }}" method="POST" class="inline-flex">
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

            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </x-card>
    </div>
</x-app-layout>
