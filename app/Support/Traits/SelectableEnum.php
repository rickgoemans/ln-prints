<?php

namespace App\Support\Traits;

use ReflectionClass;

/**
 * Trait HasFroalaData
 *
 * @package App\Support\Traits
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
trait SelectableEnum
{
    public static function options(): array
    {
        $oClass = new ReflectionClass(__CLASS__);
        return array_values($oClass->getConstants());
    }

    public static function optionsForSelect(): array
    {
        return array_combine(
            self::options(),
            array_map(fn(string $value) => __(ucfirst($value)), self::options())
        );
    }

    public static function optionsForValidation(): string
    {
        return implode(',', self::options());
    }
}
