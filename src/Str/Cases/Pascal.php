<?php

namespace Xofttion\Kernel\Str\Cases;

class Pascal
{
    public static function toSnake(string $strPascal): string
    {
        return static::replaceUppers($strPascal, '_');
    }

    public static function toCamel(string $strPascal): string
    {
        return lcfirst($strPascal);
    }

    public static function toKebab(string $strPascal): string
    {
        return static::replaceUppers($strPascal, '-');
    }

    private static function replaceUppers(string $strPascal, string $divider): string
    {
        $pattern = '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!';

        preg_match_all($pattern, $strPascal, $matches);

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
