<?php

namespace Xofttion\Kernel\Str\Cases;

class Kebab
{
    // Métodos estáticos de la clase Kebab

    public static function toSnake(string $strKebab): string
    {
        return str_replace(['-'], '_', $strKebab);
    }

    public static function toCamel(string $strKebab): string
    {
        $result = static::toPascal($strKebab);

        return lcfirst($result);
    }

    public static function toPascal(string $strKebab): string
    {
        $result = str_replace(['-'], ' ', $strKebab);

        return str_replace(' ', '', ucwords($result));
    }
}
