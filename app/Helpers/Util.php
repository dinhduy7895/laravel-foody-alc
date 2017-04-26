<?php
namespace App\Helpers;

class Util {
    
        public static function getImage( $folderName, $imageName){
            $url = '/img/'.$folderName.'/'.$imageName;
            return $url;
            
        }
}
