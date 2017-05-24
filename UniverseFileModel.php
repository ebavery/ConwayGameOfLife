<?php
/*
 * MODEL
 */
/**
 * UniverseFileModel takes the array result and writes it to a file for output.
 * It has one static method so that an object does not have to be constructed. 
 *
 * Author:  Elizabeth Avery
 * Date:    05/03/2017
 */
class UniverseFileModel {
    
    private static $filename = "results.txt";
            
    public static function writeFile($array){        

        $file = fopen(self::$filename, 'wb');
        foreach ($array as $row){
            foreach ($row as $column){
                fwrite($file, $column);
            }
            fwrite($file, "\n");
        }
        return self::$filename;
    }    
}
