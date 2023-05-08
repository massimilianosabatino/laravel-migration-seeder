<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

class TrainTableIstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 10; $i++){
            $time_random = Carbon::createFromFormat('H:i', $faker->time('H:i'));
            $arrival_time = $time_random->copy()->addHours($faker->numberBetween(1, 23));
            $new_train = new Train();
            $new_train->vendor = $faker->randomElement(['Trenitalia', 'Italo', 'Trenord', 'Cotrap']);
            $new_train->departure = $faker->city();
            $new_train->arrival = $faker->city();
            $new_train->departure_time = $time_random;
            $new_train->arrival_time = $arrival_time;
            $new_train->departure_date = $faker->date();
            $new_train->train_code = $faker->randomNumber(4, true);
            $new_train->car = $faker->randomDigitNotNull();
            $new_train->on_time = $faker->numberBetween(0, 1);
            $new_train->cancelled = $faker->numberBetween(0, 1);
            $new_train->save();
        }
    }
}
