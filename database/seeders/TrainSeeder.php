<?php

namespace Database\Seeders;

use App\Models\Train;
use DateInterval;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trains')->insert([
            'vendor' => fake()->randomElement(['Trenitalia', 'Italo', 'Trenord', 'Cotrap']),
            'departure' => fake()->city(),
            'arrival' => fake()->city(),
            'departure_time' => fake()->time('H:i'),
            'arrival_time' => fake()->time('H:i'),
            'departure_date' => fake()->date(),
            'train_code' => fake()->randomNumber(5, true),
            'car' => fake()->randomDigitNotNull(),
            'on_time' => fake()->numberBetween(0, 1),
            'cancelled' => fake()->numberBetween(0, 1),
        ]);

    }
}
