<x-app-layout>
    <div class="max-w-7xl mx-auto py-12">
        <x-card class="max-w-2xl sm:px-6 lg:px-8 py-6 lg:py-8">
            <h1 class="text-2xl font-semibold mb-7">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                Boetes
            </h1>

            <table class="font-semibold">
                <tbody>
                <tr>
                    <td class="py-1 pr-5">Totale boetes</td>
                    <td class="py-1 pl-5">€ {{ number_format((float)$fines, 2, ',', '') }}</td>
                </tr>
                <tr>
                    <td class="py-1 pr-5">Openstaande boete</td>
                    <td class="py-1 pl-5 text-red">€ {{ number_format((float)$fines, 2, ',', '') }}</td>
                </tr>
                </tbody>
            </table>
        </x-card>
    </div>
</x-app-layout>
