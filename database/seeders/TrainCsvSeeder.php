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

        $getRecord = Helpers::getCSV('csv/train.csv');
        
        dd($getRecord);
    }
}
