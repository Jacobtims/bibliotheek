<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'isbn' => '9789085434634',
            'title' => 'Noodweer',
            'image' => 'https://media.s-bol.com/097BvlMK5E97/550x807.jpg',
            'content' => 'Het is noodweer. Kai (16) fietst zo snel mogelijk naar huis, maar ziet een scooter over het hoofd. Daarna wordt alles zwart voor zijn ogen. De schade is groot en de bestuurder van de scooter laat het er niet bij zitten. Kai krijgt de schuld en er volgen bedreigingen. Zelfs op school voelt Kai zich niet meer veilig. Kai durft niemand in vertrouwen te nemen, en zijn vader en moeder zijn druk met zijn opa die vergeetachtig wordt. Zelfs als zijn ouders ontdekken dat er van alles fout gaat, durft Kai niet de waarheid te vertellen. Is hij nu slachtoffer of zelf schuldig? Ondertussen gaat het steeds slechter met zijn opa.',
            'author_id' => Author::firstOrCreate(['name' => 'Hans Mijnders'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Kinderboek'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789043923088',
            'title' => 'De Zoete Zusjes vieren kerst',
            'image' => 'https://media.s-bol.com/kOgBWxVKvz1E/32rkVzp/852x1200.jpg',
            'content' => 'Het is bijna Kerstmis en de Zoete Zusjes Saar en Janna kunnen niet wachten. Dit is het leukste kerstboek om voor te lezen vanaf 4 jaar of om zelf te lezen vanaf 7 jaar.',
            'author_id' => Author::firstOrCreate(['name' => 'Hanneke de Zoete'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Kinderboek'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789048865673',
            'title' => 'Nabeschouwing',
            'image' => 'https://media.s-bol.com/O950Zw0rmQpQ/NL9JlD/535x840.jpg',
            'content' => 'Samen zijn ze 150 jaar. Een mooi moment voor de grootste nabeschouwing van allemaal: die op hun eigen leven. Mart Smeets en Kees Jansma - twee iconen van de Nederlandse sportjournalistiek op televisie - samen blikken ze terug op hun leven. In ontmoetingen en brieven spreken ze over zichzelf, elkaar, over ouder worden, over de glorie van de sport, de gekte van de media en de kracht van muziek, over verleden en toekomst, over vriendschap,familie, voetbal, wielrennen, basketbal, televisie en alles wat ze verder bezig houdt.',
            'author_id' => Author::firstOrCreate(['name' => 'Kees Jansma'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Sport & Outdoor'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789056479183',
            'title' => 'Nijntje en sinterklaas',
            'image' => 'https://media.s-bol.com/xzLnErGNBGPq/o72JZA/1186x1200.jpg',
            'content' => 'Dat is een mooi cadeau: een dubbeldik omdraaiboek van nijntje met daarin twee sinterklaasboeken! In \'nijntje zet haar schoen\' lees je over wat er allemaal gaat gebeuren: van de aankomst van sinterklaas tot een cadeautje in je schoen vinden. In \'nijntje zingt voor sinterklaas\' staan bekende sinterklaasliedjes die nijntje en haar vriendjes zingen: van \'zie ginds komt de stoomboot\' tot \'dag sinterklaasje\'. Zing je mee?',
            'author_id' => Author::firstOrCreate(['name' => 'Dick Bruna'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Kinderboek'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789402711837',
            'title' => 'Het Isisgeheim',
            'image' => 'https://www.bookspot.nl/images/active/carrousel/fullsize/9789402711837_front.jpg',
            'content' => 'Vechten, vluchten, verstijven... Wat doe jij?Wanneer het Leidse Rijksmuseum van Oudheden zich opmaakt voor een grootse tentoonstelling over Egypte, doet conservator Arianna een wel heel bijzondere ontdekking in een gouden beeldje van de godin Isis; de Egyptische moedergodin blijkt al eeuwenlang een groot geheim met zich mee te dragen.',
            'author_id' => Author::firstOrCreate(['name' => 'Jeroen Windmeijer'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Nederlands'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789402711837',
            'title' => 'Het schaarse licht',
            'image' => 'https://www.bookspot.nl/images/active/carrousel/fullsize/9789493169838_front.jpg',
            'content' => 'Hier staan we, het trio dat ontkomen is, dat de sprong naar het heden heeft gemaakt, wij, de overlevenden, die proberen plaatsvervangend verder te leven voor al diegenen die dat niet was vergund en die op deze foto’s eeuwig jong zullen blijven.',
            'author_id' => Author::firstOrCreate(['name' => 'Nino Haratischwili'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Fictie'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789400514508',
            'title' => 'Gletsjer',
            'image' => 'https://www.bookspot.nl/images/active/carrousel/fullsize/9789400514508_front.jpg',
            'content' => 'Maaike en haar zus Judith zijn samen op skivakantie in Duitsland. Vroeger gingen ze jaarlijks naar het gebied Garmisch-Partenkirchen, maar door Judiths politieke carri?re zijn zulke tripjes onmogelijk geworden. Wat begint als een weekje optimale zussentijd, verandert in een regelrechte ramp wanneer Judith verongelukt. Maar was het daadwerkelijk een noodlottig ongeluk? Maaike gelooft er niks van en gaat op onderzoek uit.',
            'author_id' => Author::firstOrCreate(['name' => 'Suzanne Vermeer'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Misdaad'])->id,
            'purchased_at' => today(),
        ]);
    }
}
