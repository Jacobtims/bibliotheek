<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@test.com',
         ]);
        $admin->assignRole('Admin');

        $personeel = User::factory()->create([
            'name' => 'Personeel',
            'email' => 'personeel@test.com',
        ]);
        $personeel->assignRole('Personeel');

        $lezer = User::factory()->create([
            'name' => 'Lezer',
            'email' => 'lezer@test.com',
        ]);
        $lezer->assignRole('Lezer');
    }
}
