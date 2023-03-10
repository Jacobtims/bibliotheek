<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 lg:py-8">
            <div class="flex items-center justify-between mb-7">
                <h1 class="text-2xl font-semibold">
                    <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                    Boeken
                </h1>
                <a href="{{ route('dashboard.books.create') }}" class="whitespace-nowrap">
                    <x-buttons.green-button>
                        Nieuw boek
                    </x-buttons.green-button>
                </a>
            </div>

            <x-responsive-table>
                <table class="table-auto w-full">
                    <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                    <tr>
                        <th class="py-3 pl-5">ISBN</th>
                        <th class="py-3 px-5">Titel</th>
                        <th class="py-3 px-5">Auteur</th>
                        <th class="py-3 px-5">Genre</th>
                        <th class="py-3 pr-5"></th>
                    </tr>
                    </thead>
                    <tbody class="font-medium">
                    @foreach($books as $book)
                        <tr class="even:bg-table-row">
                            <td class="py-4 pl-5 font-semibold">{{ $book->isbn }}</td>
                            <td class="py-4 px-5">{{ $book->title }}</td>
                            <td class="py-4 px-5">{{ $book->author->name }}</td>
                            <td class="py-4 px-5">{{ $book->genre->name }}</td>
                            <td class="py-4 pr-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <a href="{{ route('dashboard.books.edit', $book->id) }}">
                                        <span class="material-symbols-outlined">edit_square</span>
                                    </a>
                                    <form action="{{ route('dashboard.books.destroy', $book->id) }}" method="POST" class="inline-flex">
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
                {{ $books->links() }}
            </div>
        </x-card>
    </div>
</x-app-layout>
