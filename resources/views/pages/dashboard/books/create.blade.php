<x-app-layout>
    <div class="py-12">
        <x-card class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 lg:py-8">
            <h1 class="text-2xl font-semibold mb-7">
                <a href="{{ route('dashboard') }}" class="underline">Dashboard</a> /
                <a href="{{ route('dashboard.books.index') }}" class="underline">Boeken</a> /
                Nieuw boek
            </h1>

            <form method="POST" action="{{ route('dashboard.books.store') }}" class="w-full md:w-1/2">
                @csrf

                <div>
                    <x-input-label for="isbn" value="ISBN" />
                    <x-text-input id="isbn" class="block mt-1 w-full" type="text" name="isbn" placeholder="ISBN" :value="old('isbn')" required autofocus/>
                    <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="title" value="Titel" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" placeholder="Titel" :value="old('title')" required/>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="image" value="Afbeelding url" />
                    <x-text-input id="image" class="block mt-1 w-full" type="url" name="image" placeholder="Afbeelding url" :value="old('image')" required/>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="author" value="Auteur" />
                    <x-select id="author" class="block mt-1 w-full" type="text" name="author_id" required>
                        <option disabled {{ !old('author_id') ? "selected" : "" }}>Selecteer een auteur</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? "selected" : "" }}>{{ $author->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="genre" value="Genre" />
                    <x-select id="genre" class="block mt-1 w-full" type="text" name="genre_id" required>
                        <option disabled {{ !old('genre_id') ? "selected" : "" }}>Selecteer een genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? "selected" : "" }}>{{ $genre->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('genre_id')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="purchased_at" value="Gekocht op" />
                    <x-text-input id="purchased_at" class="block mt-1 w-full" type="date" name="purchased_at" placeholder="Gekocht op" :value="old('purchased_at')" required/>
                    <x-input-error :messages="$errors->get('purchased_at')" class="mt-2" />
                </div>

                <div class="mt-8">
                    <x-buttons.green-button>
                        Nieuw boek aanmaken
                    </x-buttons.green-button>
                </div>
            </form>
        </x-card>
    </div>
</x-app-layout>
