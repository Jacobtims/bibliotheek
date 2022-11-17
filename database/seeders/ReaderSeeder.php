<?php

namespace Database\Seeders;

use App\Models\Reader;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create()->each(function ($user) {
            $user->assignRole('Lezer');
            Reader::factory()->create(['user_id' => $user->id]);
        });
    }
}
