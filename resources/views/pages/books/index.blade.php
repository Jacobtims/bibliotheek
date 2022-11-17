<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold mb-7">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                Boeken
            </h1>

            <table class="table-auto w-full">
                <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                <tr>
                    <th class="py-3 pl-5">ISBN</th>
                    <th class="py-3">Titel</th>
                    <th class="py-3">Auteur</th>
                    <th class="py-3">Genre</th>
                    <th class="py-3 pr-5"></th>
                </tr>
                </thead>
                <tbody class="font-medium">
                @foreach($books as $book)
                    <tr class="even:bg-table-row">
                        <td class="py-4 pl-5 font-semibold">{{ $book->isbn }}</td>
                        <td class="py-4">{{ $book->title }}</td>
                        <td class="py-4">{{ $book->author->name }}</td>
                        <td class="py-4">{{ $book->genre->name }}</td>
                        <td class="py-4 pr-5">
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
                {{ $books->links() }}
            </div>
        </x-card>
    </div>
</x-app-layout>
