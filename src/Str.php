<?php

namespace Xofttion\Kernel;

use Xofttion\Kernel\Str\CamelCase;

class Str
{

    // Atributos de la clase Str

    /**
     *
     * @var CamelCase
     */
    private static $camelcase;

    // Constructor de la clase Str

    private function __construct()
    {
        
    }

    // Métodos de la clase Str

    /**
     * 
     * @return CamelCase
     */
    public static function getCamelCase(): CamelCase
    {
        if (is_null(self::$camelcase)) {
            self::$camelcase = new CamelCase();
        }

        return self::$camelcase;
    }
}
