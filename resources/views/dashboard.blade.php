<x-app-layout>
    <div class="py-12">
        <div class="grid grid-cols-4 gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @role('Lezer')
                <!-- Geleende boeken -->
                <x-icon-card icon="library_books" title="Geleende boeken" :url="route('dashboard')"/>
                <!-- Boetes -->
                <x-icon-card icon="payments" title="Boetes" :url="route('dashboard')"/>
            @endrole()
            @role('Personeel')
                <!-- Boek uitlenen -->
                <x-icon-card icon="library_books" title="Boek uitlenen" :url="route('dashboard')"/>
                <!-- Boek verlengen -->
                <x-icon-card icon="input" title="Boek verlengen" :url="route('dashboard')"/>
                <!-- Boek verlengen -->
                <x-icon-card icon="input" title="Boek verlengen" :url="route('dashboard')"/>
                <!-- Klant gegevens -->
                <x-icon-card icon="group" title="Klant gegevens" :url="route('dashboard')"/>
            @endrole()
            @role('Admin')
                <!-- Personeel gegevens -->
                <x-icon-card icon="group" title="Personeel gegevens" :url="route('employees.index')"/>
                <!-- Boeken -->
                <x-icon-card icon="menu_book" title="Boeken" :url="route('dashboard')"/>
                <!-- Rollen en rechten -->
                <x-icon-card icon="manage_accounts" title="Rollen en rechten" :url="route('dashboard')"/>
            @endrole()
        </div>
    </div>
</x-app-layout>
