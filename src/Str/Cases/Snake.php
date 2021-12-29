<?php

namespace Xofttion\Kernel\Str\Cases;

class Snake
{
    // Métodos estáticos de la clase Snake

    public static function toCamel(string $strSnake): string
    {
        $result = static::toPascal($strSnake);

        return lcfirst($result);
    }

    public static function toPascal(string $strSnake): string
    {
        $result = str_replace(['_'], ' ', $strSnake);

        return str_replace(' ', '', ucwords($result));
    }

    public static function toKebab(string $strSnake): string
    {
        return str_replace(['_'], '-', $strSnake);
    }
}
