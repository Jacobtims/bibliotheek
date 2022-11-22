<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscription_plans')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Basis',
                    'price' => 5.00,
                    'books' => 5
                ],
                [
                    'id' => 2,
                    'name' => 'Standaard',
                    'price' => 10.00,
                    'books' => 10
                ],
                [
                    'id' => 3,
                    'name' => 'Premium',
                    'price' => 15.00,
                    'books' => 15
                ]
            ]
        );
    }
}
