<?php

namespace Database\Seeders;

use App\Functions\Helpers;
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

        $getRecord = Helpers::getCSV($file_stream);
        
        dd($getRecord);
    }
}
