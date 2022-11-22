<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto">
        <x-card class="max-w-2xl sm:px-6 lg:px-8 py-6 lg:py-8">
            <h1 class="text-2xl font-semibold mb-7">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                Boek inleveren
            </h1>

            <form method="POST" action="{{ route('dashboard.return-book') }}">
                @csrf
                <div class="mt-4">
                    <x-input-label for="reader" value="Lezer"/>
                    <x-select id="reader" class="block mt-1 w-full" type="text" name="user_id" required>
                        <option disabled selected>Selecteer een lezer ID</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? "selected" : "" }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('user_id')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="book" value="Boek"/>
                    <x-select id="book" class="block mt-1 w-full" type="text" name="book_id" required>
                        <option disabled selected>Selecteer een boek</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}">
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('book_id')" class="mt-2"/>
                </div>

                <div class="mt-8">
                    <x-buttons.green-button>
                        Boek inleveren
                    </x-buttons.green-button>
                </div>
            </form>
        </x-card>
    </div>
</x-app-layout>
