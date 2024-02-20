<?php

namespace App\Support\Traits;

use Illuminate\Support\Str;

/**
 * Trait ModelName
 *
 * @package App\Support\Traits
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
trait ModelName
{
    /**
     * Get the name of the model
     *
     * @param string $case (options: 'camel/kebab/snake/studly/title')
     * @return string
     */
    public static function getName(string $case = 'studly'): string
    {
        $name = class_basename(get_called_class());

        return match ($case) {
            'camel' => Str::camel($name),
            'kebab' => Str::kebab($name),
            'snake' => Str::snake($name),
            'studly' => Str::studly($name),
            'text' => strtolower(Str::title($name)),
            'title' => Str::title($name),
            default => $name,
        };
    }

    /**
     * Get the plural name of the model
     *
     * @param string $case (options: 'camel/kebeb/snake/studly/title')
     * @return string
     */
    public static function getPluralName(string $case = 'kebab'): string
    {
        return Str::plural(self::getName($case));
    }
}
