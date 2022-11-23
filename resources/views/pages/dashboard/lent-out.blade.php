<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 lg:py-8">
            <h1 class="text-2xl font-semibold mb-7">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                Geleende boeken
            </h1>
            <!-- All lent books -->
            <x-responsive-table>
                <table class="table-auto w-full">
                    <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                    <tr>
                        <th class="py-3 pl-5">Boek</th>
                        <th class="py-3 px-5"></th>
                        <th class="py-3 px-5">Uitgeleend op</th>
                        <th class="py-3 px-5">Uitgeleend tot</th>
                        <th class="py-3 px-5"></th>
                        <th class="py-3 pr-5"></th>
                    </tr>
                    </thead>
                    <tbody class="font-medium">
                    @forelse($lentBooks as $lentBook)
                        <tr class="even:bg-table-row align-top">
                            <td class="py-4 pl-5 w-32">
                                <a href="{{ route('books.show', $lentBook->book->id) }}">
                                    <img src="{{ $lentBook->book->image }}" class="w-20"/>
                                </a>
                            </td>
                            <td class="py-4 px-5">
                                <a href="{{ route('books.show', $lentBook->book->id) }}">
                                    <h1 class="text-lg font-semibold">{{ $lentBook->book->title }}</h1>
                                    <h2 class="text-light">{{ $lentBook->book->author->name }}</h2>
                                </a>
                            </td>
                            <td class="py-4 px-5 whitespace-nowrap">
                                <p class="text-basis mb-1">
                                    {{ \Carbon\Carbon::parse($lentBook->lent_at)->translatedFormat('d F Y') }}
                                </p>
                            </td>
                            <td class="py-4 px-5 whitespace-nowrap">
                                <p class="font-semibold {{ $lentBook->days_overdue > 0 ? 'text-red' : '' }}">
                                    {{ \Carbon\Carbon::parse($lentBook->lent_until)->translatedFormat('d F Y') }}
                                </p>
                                <p class="text-sm text-gray">
                                    ({{ $lentBook->times_extended }}x verlengd)
                                </p>
                            </td>
                            <td class="py-4 px-5 text-red">
                                {{ $lentBook->days_overdue > 0 ? ($lentBook->days_overdue . ' dag(en) te laat') : '' }}
                            </td>
                            <td class="py-4 pr-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <form action="{{ route('dashboard.books.extend', $lentBook->book_id) }}"
                                          method="POST"
                                          class="inline-flex">
                                        @csrf
                                        <x-buttons.primary-button :disabled="$lentBook->days_overdue > 0">
                                            Verlengen
                                        </x-buttons.primary-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-4 pl-5" colspan="5">Je hebt geen boeken geleend</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </x-responsive-table>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $lentBooks->links() }}
            </div>
        </x-card>
    </div>
</x-app-layout>
