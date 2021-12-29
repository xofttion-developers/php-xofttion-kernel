<?php

namespace Xofttion\Kernel\Str\Cases;

class Camel
{
    // Métodos estáticos de la clase Camel

    public static function toSnake(string $strCamel): string
    {
        return static::replaceUppers($strCamel, '_');
    }

    public static function toPascal(string $strCamel): string
    {
        return ucfirst($strCamel);
    }

    public static function toKebab(string $strCamel): string
    {
        return static::replaceUppers($strCamel, '-');
    }

    private static function replaceUppers(string $strCamel, string $divider): string
    {
        $pattern = '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!';

        preg_match_all($pattern, $strCamel, $matches);

        $result = $matches[0];

        foreach ($result as &$match) {
            $success = $match == strtoupper($match);

            if ($success) {
                $match = strtolower($match);
            } else {
                $match = lcfirst($match);
            }
        }

        return implode($divider, $result);
    }
}
