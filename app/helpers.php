<?php


if (! function_exists('simplifyArray')) {
    function simplifyArray($array){

        $simplifiedArray = [];

        foreach ($array as $key => $value) {
            // $value = preg_replace('/[^a-zA-Z0-9]/s',' ',$value); //Remove Special Characters
            
            $value = preg_replace("/\s+/", "", $value); //Remove Spaces
            $value = strtolower($value); //Convert to lowercase

            array_push($simplifiedArray,$value);
        }

        return $simplifiedArray;
    }
}

if (! function_exists('simplifyAnswer')) {
    function simplifyAnswer($value){          
            $simplified = preg_replace("/\s+/", "", $value); //Remove Spaces
            $simplified = strtolower($simplified); //Convert to lowercase
        return $simplified;
    }
}


?>