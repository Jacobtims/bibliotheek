<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;

class UserSeeder extends Seeder
{
    protected Generator $faker;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    public function run()
    {
        // Create admin user
        $admin = User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@test.com',
         ]);
        $admin->assignRole('Admin');

        // Create personeel user
        $personeel = User::factory()->create([
            'name' => 'Personeel',
            'email' => 'personeel@test.com',
        ]);
        $personeel->assignRole('Personeel');
        $personeel->employee()->create([
            'hired_at' => today(),
        ]);

        // Create lezer user
        $lezer = User::factory()->create([
            'name' => 'Lezer',
            'email' => 'lezer@test.com',
        ]);
        $lezer->assignRole('Lezer');
        $lezer->reader()->create([
            'address' => $this->faker->streetAddress(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => 'Nederland',
            'phone' => $this->faker->phoneNumber()
        ]);
    }
}
