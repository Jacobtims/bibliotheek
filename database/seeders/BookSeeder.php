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
            'isbn' => '9783458319726',
            'title' => 'De negerhut van Oom Tom',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/UncleTomsCabinCover.jpg/800px-UncleTomsCabinCover.jpg',
            'author_id' => Author::firstOrCreate(['name' => 'Harriet Beecher Stowe'])->id,
            'genre_id' => Genre::firstOrCreate(['name' => 'Roman'])->id,
            'purchased_at' => today(),
        ]);
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
    }
}
