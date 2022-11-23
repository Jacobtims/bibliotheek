<x-app-layout>
    <!-- Hero section -->
    <section class="max-w-7xl mx-auto px-4 py-5 my-12 lg:my-28">
        <div class="relative">
            <div class="space-y-6 md:space-y-11">
                <h1 class="font-semibold text-4xl md:text-5xl">Ontwikkeling voor iedereen</h1>
                <p class="text-lg md:text-xl leading-9">
                    De bieb is een plek waar jij jezelf kunt ontwikkelen en waar<br class="hidden md:block"/>
                    iedereen welkom is. Lezen, leren, ontmoeten óf op zoek naar<br class="hidden md:block"/>
                    inspiratie en antwoorden. Het kan en mag allemaal.<br/>
                    En als lid kun je nóg meer!
                </p>
                <a href="{{ route('register') }}" class="block">
                    <x-buttons.primary-button class="px-7 py-2.5">
                        Word lid van de bibliotheek
                    </x-buttons.primary-button>
                </a>
            </div>

            <div class="hidden lg:block w-1/2 absolute top-0 right-0 -z-10">
                <img src="{{ asset('/storage/images/boeken-lezen.png') }}" alt="" class="w-full">
            </div>
        </div>
    </section>

    <!-- Speciaal voor section -->
    <section class="bg-primary py-10 mb-12 lg:mb-28">
        <div class="max-w-7xl mx-auto px-4 py-5">
            <h2 class="text-white font-bold text-4xl mb-8">Speciaal voor</h2>

            <div class="flex flex-col md:flex-row justify-between gap-x-4 gap-y-8 lg:gap-10">
                <x-card class="w-full md:w-1/3">
                    <img src="{{ asset('storage/images/kind.png') }}" class="mb-3"/>
                    <h3 class="text-primary font-semibold text-2xl">Kinderen</h3>
                </x-card>
                <x-card class="w-full md:w-1/3">
                    <img src="{{ asset('storage/images/jongere.png') }}" class="mb-3"/>
                    <h3 class="text-primary font-semibold text-2xl">Jongeren</h3>
                </x-card>
                <x-card class="w-full md:w-1/3">
                    <img src="{{ asset('storage/images/volwassene.png') }}" class="mb-3"/>
                    <h3 class="text-primary font-semibold text-2xl">Volwassenen</h3>
                </x-card>
            </div>
        </div>
    </section>

    <!-- Alle boeken section -->
    <section class="max-w-7xl mx-auto px-4 py-5 mb-12 lg:mb-28">
        <h2 class="font-bold text-4xl mb-8 md:mb-14">Nieuwe boeken</h2>

        <div class="flex flex-col md:flex-row justify-between gap-6 lg:gap-12">
            @foreach($books as $book)
                <div class="w-4/5 md:w-1/4 shadow-md md:hover:scale-110 transition duration-300 ease-in-out">
                    <a href="{{ route('books.show', $book->id) }}">
                        <img src="{{ $book->image }}" class="h-full w-full object-fill"/>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
