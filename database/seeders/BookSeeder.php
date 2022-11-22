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
            'author_id' => Author::firstOrCreate(['name' => 'Hans Mijnders'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Kinderboek'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789043923088',
            'title' => 'De Zoete Zusjes vieren kerst',
            'image' => 'https://media.s-bol.com/kOgBWxVKvz1E/32rkVzp/852x1200.jpg',
            'author_id' => Author::firstOrCreate(['name' => 'Hanneke de Zoete'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Kinderboek'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789048865673',
            'title' => 'Nabeschouwing',
            'image' => 'https://media.s-bol.com/O950Zw0rmQpQ/NL9JlD/535x840.jpg',
            'author_id' => Author::firstOrCreate(['name' => 'Kees Jansma'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Sport & Outdoor'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789056479183',
            'title' => 'Nijntje en sinterklaas',
            'image' => 'https://media.s-bol.com/xzLnErGNBGPq/o72JZA/1186x1200.jpg',
            'author_id' => Author::firstOrCreate(['name' => 'Dick Bruna'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Kinderboek'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789402711837',
            'title' => 'Het Isisgeheim',
            'image' => 'https://www.bookspot.nl/images/active/carrousel/fullsize/9789402711837_front.jpg',
            'author_id' => Author::firstOrCreate(['name' => 'Jeroen Windmeijer'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Nederlands'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789402711837',
            'title' => 'Het schaarse licht',
            'image' => 'https://www.bookspot.nl/images/active/carrousel/fullsize/9789493169838_front.jpg',
            'author_id' => Author::firstOrCreate(['name' => 'Nino Haratischwili'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Fictie'])->id,
            'purchased_at' => today(),
        ]);
        Book::create([
            'isbn' => '9789400514508',
            'title' => 'Gletsjer',
            'image' => 'https://www.bookspot.nl/images/active/carrousel/fullsize/9789400514508_front.jpg',
            'author_id' => Author::firstOrCreate(['name' => 'Suzanne Vermeer'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Misdaad'])->id,
            'purchased_at' => today(),
        ]);
    }
}
