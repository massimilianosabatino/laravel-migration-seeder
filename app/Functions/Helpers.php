<?php

namespace App\Functions;

class Helpers
{
    // private $row = 0;
    // private $column = [];
    public static $csvData = [];

    public static function getCSV($fileName): array
    {
        // $file = __DIR__.'/'.$fileName;
        $file = $fileName;
        $row = 0;
        $column = [];
        
        if (($handle = fopen($file, "r")) !== FALSE) {
    
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                
                $num = count($data);
                $row++;
                
                if($row === 1){
                    array_push($column, ...$data);
        
                } else {
        
                    $rowDataArray = [];
        
                    for ($i=0; $i < $num; $i++) {
        
                        $rowDataArray[$column[$i]] = $data[$i];
        
                    }
        
                    array_push(self::$csvData, $rowDataArray);
                }
            }
            fclose($handle);
        
        }
        return self::$csvData;
    }
}