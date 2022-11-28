<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 flex flex-col md:flex-row gap-6">
        <!-- Icon cards for actions -->
        <section class="md:w-2/3">
            <div class="grid md:grid-cols-2 gap-6">
                @role('Lezer')
                <!-- Geleende boeken -->
                <x-icon-card icon="library_books" title="Geleende boeken" :url="route('dashboard.books.lent-out')"/>
                <!-- Boetes -->
                <x-icon-card icon="payments" title="Boetes" :url="route('dashboard.fines.index')"/>
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
                <x-icon-card icon="notifications_active" title="Notificatie plaatsen"
                             :url="route('dashboard.notifications.index')"/>
                @endrole()
            </div>
        </section>
        <!-- Notifications -->
        <section class="md:w-1/3">
            <x-card>
                <h1 class="text-xl font-semibold mb-3">Notificaties</h1>

                <div class="space-y-4">
                    @forelse($notifications as $notification)
                        <div class="flex space-x-2 py-2 border-b border-gray-300">
                            <div class="w-4">
                                <div class="w-2.5 h-2.5 bg-blue-500 rounded-full mt-1"></div>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">{{ $notification->notification }}</p>
                                <small
                                    class="font-light">{{ \Carbon\Carbon::parse($notification->created_at)->translatedFormat('d F Y H:i') }}</small>
                            </div>
                        </div>
                    @empty
                        <div>Geen notificaties!</div>
                    @endforelse
                </div>
            </x-card>
        </section>
    </div>
</x-app-layout>
