<?php

namespace App\Support\Traits;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity as SpatieLogsActivity;

/**
 * Trait LogsActivity
 *
 * @package App\Support\Traits
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
trait LogsActivity
{
    use SpatieLogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->dontSubmitEmptyLogs();
    }

    /**
     * Get the log name to use for activities
     *
     * @param string $eventName
     * @return string
     */
    public function getLogNameToUse(string $eventName = ''): string
    {
        return self::getPluralName('kebab');
    }

    /**
     * Get the description to use for activities
     *
     * @param string $eventName
     * @return string
     */
    public function getDescriptionForEvent(string $eventName): string
    {
        return ucfirst($eventName) . ' the ' . self::getName('text');
    }
}
