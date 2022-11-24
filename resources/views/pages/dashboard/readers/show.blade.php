<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 grid grid-cols-2 gap-6">
        <!-- Breadcrumb -->
        <x-card class="col-span-2">
            <h1 class="text-2xl font-semibold">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                <a href="{{ route('dashboard.readers.index') }}" class="underline">Lezer gegevens</a> /
                {{ $user->name }}
            </h1>
        </x-card>

        <!-- Personal information -->
        <x-card class="col-span-2 md:col-span-1">
            <h2 class="text-2xl font-semibold">Persoonlijke informatie</h2>
            <x-responsive-table>
                <table class="table-auto w-full">
                    <tbody class="text-left align-top">
                    <tr>
                        <th class="py-2 pr-5">Naam</th>
                        <td class="py-2 pl-5">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="py-2 pr-5">E-mailadres</th>
                        <td class="py-2 pl-5">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="py-2 pr-5">Adres</th>
                        <td class="py-2 pl-5">
                            <p>{{ $user->reader->address }}</p>
                            <p>{{ $user->reader->postal_code }} {{ $user->reader->city }}</p>
                            <p>{{ $user->reader->state }} {{ $user->reader->country }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 pr-5">Telefoonnummer</th>
                        <td class="py-2 pl-5">{{ $user->reader->phone }}</td>
                    </tr>
                    </tbody>
                </table>
            </x-responsive-table>
        </x-card>

        <!-- Fines -->
        <x-card class="col-span-2 md:col-span-1">
            <h2 class="text-2xl font-semibold">Boetes</h2>
            <x-responsive-table>
                <table class="w-full font-semibold">
                    <tbody>
                    <tr>
                        <td class="py-2 pr-5">Totale boetes</td>
                        <td class="py-2 pl-5">€ {{ number_format((float)$fines, 2, ',', '') }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 pr-5">Openstaande boete</td>
                        <td class="py-2 pl-5 text-red">€ {{ number_format((float)$fines, 2, ',', '') }}</td>
                    </tr>
                    </tbody>
                </table>
            </x-responsive-table>
        </x-card>

        <!-- All lent books -->
        <x-card class="col-span-2">
            <h2 class="text-2xl font-semibold mb-3">Uitgeleende boeken</h2>

            <x-responsive-table>
                <table class="table-auto w-full">
                    <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                    <tr>
                        <th class="py-3 pl-5">Boek</th>
                        <th class="py-3 px-5"></th>
                        <th class="py-3 px-5">Uitgeleend op</th>
                        <th class="py-3 px-5">Uitgeleend tot</th>
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
                            <td class="py-4 pr-5 text-red">
                                {{ $lentBook->days_overdue > 0 ? ($lentBook->days_overdue . ' dag(en) te laat') : '' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-4 pl-5" colspan="5">Heeft geen boeken uitgeleend</td>
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

        <!-- All reserved books -->
        <x-card class="col-span-2">
            <h2 class="text-2xl font-semibold mb-3">Gereserveerde boeken</h2>

            <x-responsive-table>
                <table class="table-auto w-full">
                    <thead class="text-left text-sm text-gray font-semibold uppercase bg-table-row">
                    <tr>
                        <th class="py-3 pl-5">Boek</th>
                        <th class="py-3 px-5"></th>
                        <th class="py-3 pr-5">Gereserveerd op</th>
                    </tr>
                    </thead>
                    <tbody class="font-medium">
                    @forelse($reservedBooks as $reservedBook)
                        <tr class="even:bg-table-row align-top">
                            <td class="py-4 pl-5 w-32">
                                <a href="{{ route('books.show', $reservedBook->book->id) }}">
                                    <img src="{{ $reservedBook->book->image }}" class="w-20"/>
                                </a>
                            </td>
                            <td class="py-4 px-5">
                                <a href="{{ route('books.show', $reservedBook->book->id) }}">
                                    <h1 class="text-lg font-semibold">{{ $reservedBook->book->title }}</h1>
                                    <h2 class="text-light">{{ $reservedBook->book->author->name }}</h2>
                                </a>
                            </td>
                            <td class="py-4 pr-5 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($lentBook->created_at)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-4 pl-5" colspan="5">Heeft geen boeken gereserveerd</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </x-responsive-table>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $reservedBooks->links() }}
            </div>
        </x-card>
    </div>
</x-app-layout>
