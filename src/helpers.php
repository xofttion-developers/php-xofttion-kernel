<?php

if (!function_exists("is_defined")) {
    function is_defined($var): bool
    {
        return !is_null($var);
    }
}

if (!function_exists("array_is_empty")) {
    function array_is_empty(array $array): bool
    {
        return count($array) == 0;
    }
}

if (!function_exists("is_array_json")) {
    function is_array_json(array $array): bool
    {
        $keys = array_keys($array);

        if (count($keys) == 0) {
            return false;
        }

        foreach ($keys as $key) {
            if (!is_int($key)) {
                return true;
            }
        }

        return false; // Array tradicional
    }
}

if (!function_exists("uuidv4")) {
    function uuidv4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
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
