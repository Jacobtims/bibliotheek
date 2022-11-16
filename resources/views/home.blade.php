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
                <x-buttons.primary-button class="px-7 py-2.5">
                    Word lid van de bibliotheek
                </x-buttons.primary-button>
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
    <section class="max-w-7xl mx-auto px-4 py-5 mb-12 lg:mb-28" x-data="{ selected: 1 }">
        <h2 class="font-bold text-4xl mb-8 md:mb-14">Nieuwe boeken</h2>

        <div class="flex justify-between gap-6 lg:gap-12">
            <div>
                <img src="{{ asset('storage/images/ontsloten-verleden.png') }}"/>
            </div>
            <div>
                <img src="{{ asset('storage/images/alleen-maar-zee.png') }}"/>
            </div>
            <div>
                <img src="{{ asset('storage/images/voor-een-verloren-soldaat.png') }}"/>
            </div>
            <div>
                <img src="{{ asset('storage/images/een-schitterend-plan.png') }}"/>
            </div>
        </div>

        <!-- Navigator -->
        <div class="flex justify-center gap-3 mt-8 lg:mt-12">
            <button class="w-4 h-4 bg-primary rounded-full" :class="selected === 1 ? 'bg-primary-dark' : ''" @click="selected = 1"/>
            <button class="w-4 h-4 bg-primary rounded-full" :class="selected === 2 ? 'bg-primary-dark' : ''" @click="selected = 2"/>
            <button class="w-4 h-4 bg-primary rounded-full" :class="selected === 3 ? 'bg-primary-dark' : ''" @click="selected = 3"/>
        </div>
    </section>
</x-app-layout>
