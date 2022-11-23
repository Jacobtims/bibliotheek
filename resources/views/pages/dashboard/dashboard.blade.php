<x-app-layout>
    <div class="py-12">
        <div class="grid grid-cols-4 gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @role('Lezer')
                <!-- Geleende boeken -->
                <x-icon-card icon="library_books" title="Geleende boeken" :url="route('dashboard.books.lent-out')"/>
                <!-- Boetes -->
                <x-icon-card icon="payments" title="Boetes" :url="route('dashboard')"/>
            @endrole()
            @role('Personeel')
                <!-- Boek uitlenen -->
                <x-icon-card icon="library_books" title="Boek uitlenen" :url="route('dashboard.lend-out')"/>
                <!-- Boek verlengen -->
                <x-icon-card icon="input" title="Boek verlengen" :url="route('dashboard.extend')"/>
                <!-- Boek inleveren -->
                <x-icon-card icon="settings_backup_restore" title="Boek inleveren" :url="route('dashboard.return')"/>
                <!-- Klant gegevens -->
                <x-icon-card icon="group" title="Lezer gegevens" :url="route('dashboard.readers.index')"/>
            @endrole()
            @role('Admin')
                <!-- Personeel gegevens -->
                <x-icon-card icon="group" title="Personeel gegevens" :url="route('dashboard.employees.index')"/>
                <!-- Boeken -->
                <x-icon-card icon="menu_book" title="Boeken" :url="route('dashboard.books.index')"/>
                <!-- Notifications -->
                <x-icon-card icon="notifications_active" title="Notificatie plaatsen" :url="route('dashboard.notifications.index')"/>
            @endrole()
        </div>
    </div>
</x-app-layout>
