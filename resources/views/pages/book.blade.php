<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto">
        <x-card class="h-max sm:px-6 lg:px-8 py-6 lg:py-8">
            <div class="flex flex-col md:flex-row gap-6 mb-8 md:mb-12">
                <div>
                    <img src="{{ $book->image }}" style="width: 256px;"
                         onerror="this.onerror = null; this.src = '/storage/images/no-image.png'"/>
                </div>
                <div class="py-4">
                    <h1 class="text-3xl font-semibold mb-3">{{ $book->title }}</h1>

                    <table class="table-auto text-left mb-8">
                        <tbody class="align-top">
                        <tr>
                            <th class="py-2 pr-4">Auteur</th>
                            <td class="py-2">{{ $book->author->name }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4">Genre</th>
                            <td class="py-2">{{ $book->genre->name }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4">Inhoud</th>
                            <td class="py-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>
                                Aliquam tincidunt et purus consequat vehicula. Integer tempus nunc eu scelerisque
                                malesuada.
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @if(!$book->isReservedBy(auth()->user()))
                        <form action="{{ route('books.reserve', $book->id) }}" method="POST">
                            @csrf
                            <x-buttons.primary-button>
                                Reserveer
                            </x-buttons.primary-button>
                        </form>
                    @else
                        <form action="{{ route('books.cancel-reservation', $book->id) }}" method="POST">
                            @csrf
                            <x-buttons.gray-button>
                                Annuleer reservering
                            </x-buttons.gray-button>
                        </form>
                    @endif
                </div>
            </div>

            <div>
                <h1 class="font-semibold text-2xl mb-3">Exemplaren</h1>
                <table class="table-auto w-full">
                    <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                    <tr>
                        <th class="py-3 pl-5">ISBN</th>
                        <th class="py-3">Status</th>
                        <th class="py-3 pr-5">Vestiging</th>
                    </tr>
                    </thead>
                    <tbody class="font-medium">
                    @foreach($copies as $copy)
                        <tr class="even:bg-table-row align-top">
                            <td class="py-4 pl-5">
                                {{ $copy->isbn }}
                            </td>
                            <td class="py-4">
                                {!! $copy->status !!}
                            </td>
                            <td class="py-4 pr-5">
                                Beeckberghen
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </x-card>
    </div>
</x-app-layout>
