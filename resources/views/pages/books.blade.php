<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto grid grid-cols-3 gap-6">
        <!-- Filters -->
        <x-card class="col-span-3 md:col-span-1 h-max sm:px-6 lg:px-8 py-6 lg:py-8">
            <form action="{{ route('books.index') }}" method="GET">
                <div>
                    <h2 class="text-xl font-medium mb-1.5">Zoekopdracht</h2>
                    <x-text-input type="text" class="block w-full" name="search" placeholder="Zoek voor een boek"
                                  value="{{ request('search') }}"/>
                </div>

                <div class="mt-5">
                    <h2 class="text-xl font-medium mb-1.5">Auteur</h2>
                    <x-select class="block w-full" name="author_id">
                        <option selected value="">Selecteer een auteur</option>
                        @foreach($authors as $author)
                            <option
                                value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mt-5">
                    <h2 class="text-xl font-medium mb-1.5">Genre</h2>
                    <x-select class="block w-full" name="genre_id">
                        <option selected value="">Selecteer een genre</option>
                        @foreach($genres as $genre)
                            <option
                                value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </x-select>
                </div>

{{--                <div class="mt-5 space-y-1">--}}
{{--                    <h2 class="text-xl font-medium !mb-1.5">Beschikbaarheid</h2>--}}
{{--                    <div class="flex items-center space-x-2">--}}
{{--                        <x-checkbox id="available" name="availability[]" value="available"/>--}}
{{--                        <label for="available">Beschikbaar</label>--}}
{{--                    </div>--}}
{{--                    <div class="flex items-center space-x-2">--}}
{{--                        <x-checkbox id="reserved" name="availability[]" value="reserved"/>--}}
{{--                        <label for="reserved">Gereserveerd</label>--}}
{{--                    </div>--}}
{{--                    <div class="flex items-center space-x-2">--}}
{{--                        <x-checkbox id="lent" name="availability[]" value="lent"/>--}}
{{--                        <label for="lent">Uitgeleend</label>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="flex w-full items-center justify-start md:justify-end">
                    <x-buttons.primary-button class="!mt-8">
                        Filter
                    </x-buttons.primary-button>
                </div>
            </form>
        </x-card>

        <!-- All the books -->
        <x-card class="col-span-3 md:col-span-2 sm:px-6 lg:px-8 py-6 lg:py-8">
            <table class="table-auto w-full">
                <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                <tr>
                    <th class="py-3 pl-5">Book</th>
                    <th class="py-3"></th>
                    <th class="py-3 pr-5">Status</th>
                </tr>
                </thead>
                <tbody class="font-medium">
                @forelse($books as $book)
                    <tr class="even:bg-table-row align-top">
                        <td class="py-4 pl-5">
                            <a href="{{ route('books.show', $book->id) }}">
                                <img src="{{ $book->image }}" class="w-20"
                                     onerror="this.onerror = null; this.src = '/storage/images/no-image.png'"/>
                            </a>
                        </td>
                        <td class="py-4">
                            <a href="{{ route('books.show', $book->id) }}">
                                <h1 class="text-lg font-semibold">{{ $book->title }}</h1>
                                <h2 class="text-light">{{ $book->author->name }}</h2>
                            </a>
                        </td>
                        <td class="py-4 pr-5">
                            {!! $book->coloredStatus !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-4 pl-5" colspan="2">Geen boeken gevonden</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="mt-6">
                {{ $books->links() }}
            </div>
        </x-card>
    </div>
</x-app-layout>
