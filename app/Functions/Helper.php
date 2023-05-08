<?php

namespace App\Functions\Helper;

class Helper
{
    private $row = 0;
    private $column = [];
    public static $csvData = [];

    public static function getCSV($fileName)
    {
        $file = __DIR__.'/'.$fileName;
        
        if (($handle = fopen($file, "r")) !== FALSE) {
    
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                
                $num = count($data);
                self::$row++;
                
                if(self::$row === 1){
                    array_push(self::$column, ...$data);
        
                } else {
        
                    $rowDataArray = [];
        
                    for ($i=0; $i < $num; $i++) {
        
                        $rowDataArray[self::$column[$i]] = $data[$i];
        
                    }
        
                    array_push(self::$csvData, $rowDataArray);
                }
            }
            fclose($handle);
        
        }
        return self::$csvData;
    }
}