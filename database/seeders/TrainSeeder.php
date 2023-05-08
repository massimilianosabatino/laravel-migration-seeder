<?php

namespace Database\Seeders;

use App\Models\Train;
use Carbon\Carbon as CarbonCarbon;
use DateInterval;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
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

        
        for($i = 0; $i < 10; $i++){
            $time_random = Carbon::createFromFormat('H:i', fake()->time('H:i'));
            $arrival_time = $time_random->copy()->addHours(fake()->numberBetween(1, 23));
            
            DB::table('trains')->insert([
                'vendor' => fake()->randomElement(['Trenitalia', 'Italo', 'Trenord', 'Cotrap']),
                'departure' => fake()->city(),
                'arrival' => fake()->city(),
                'departure_time' => $time_random,
                'arrival_time' => $arrival_time,
                'departure_date' => fake()->date(),
                'train_code' => fake()->randomNumber(4, true),
                'car' => fake()->randomDigitNotNull(),
                'on_time' => fake()->numberBetween(0, 1),
                'cancelled' => fake()->numberBetween(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
