<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    public function index() {

        // $trains = Train::all();
        $trains = Train::where('departure_date', '>=', Carbon::today() )->orderBy('departure_date')->get();
        
        //Change value for on_time
        $trains = $trains->map(function ($item, $key) use($trains){

            if ($item->on_time === 1) {
               
                    $item->on_time = 'Yes';
                } else {
                    $item->on_time = 'No';
                }
            return $item;
            
        });

        return view('index', compact('trains'));
    }
}
