<?php

if (!function_exists("is_array_json")) {
    function is_array_json(array $array): bool {
        $keys = array_keys($array); // Extrayendo claves 
        
        if (count($keys) == 0) { 
            return false; // Array no tiene definidas
        } 

        foreach ($keys as $key) {
            if (!is_int($key)) {
                return true; 
            } // Array contiene claves definidas
        }

        return false; // Array es indexado, array tradicional
    }
}