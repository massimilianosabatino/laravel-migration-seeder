<?php

namespace Database\Seeders;

use App\Functions\Helpers;
use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainCsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_stream = __DIR__.'/csv/trains.csv';

        $getRecords = Helpers::getCSV($file_stream);

        // dd($departure_time_split);
        foreach ($getRecords as $record) {
            $new_train = new Train();
            $new_train->vendor = $record['company'];
            $new_train->departure = $record['departure_station'];
            $new_train->arrival = $record['arrival_station'];

            $departure_time_split = explode(' ', $record['departure_time']);
            $departureTime = $departure_time_split[1];
            $departureData = $departure_time_split[0];
            $new_train->departure_time = $departureTime;
            $new_train->departure_date = $departureData;

            $arrival_time_split = explode(' ', $record['arrival_time']);
            $arrivalTime = $arrival_time_split[1];
            $new_train->arrival_time = $arrivalTime;
            
            $new_train->train_code = $record['train_code'];
            $new_train->car = $record['wagons_number'];
            $new_train->on_time = $record['on_time'];
            $new_train->cancelled = $record['cancelled'];
            $new_train->save();
        }
    }
}
