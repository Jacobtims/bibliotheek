<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create()->each(function ($user) {
            $user->assignRole('Personeel');
            Employee::factory()->create(['user_id' => $user->id]);
        });
    }
}
