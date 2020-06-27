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

if (!function_exists("uuidv4")) {
    function uuidv4() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),

                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),

                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,

                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,

                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
            );
    }
}