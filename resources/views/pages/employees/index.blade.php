<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold mb-7">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                Personeel gegevens
            </h1>

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
                        <td class="py-4 pr-5">{{ \Carbon\Carbon::parse($user->employee->hired_at)->translatedFormat('d F Y') }}</td>
                        <td>
                            <button>
                                <span class="material-symbols-outlined">edit_square</span>
                            </button>
                            <button>
                                <span class="material-symbols-outlined">delete</span>
                            </button>
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
