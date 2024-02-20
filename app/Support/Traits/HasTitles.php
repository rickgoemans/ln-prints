<?php

namespace App\Support\Traits;

/**
 * Trait HasTitles
 *
 * @package App\Support\Traits
 * @author Provide Software <software@provide.nl>
 */
trait HasTitles
{
    /* ACCESSORS & MUTATORS */
    /**
     * Return the title of the model
     *
     * @return string|null
     */
    public function getTitleAttribute(): ?string
    {
        return "#{$this->getKey()}";
    }

    /**
     * Return the subtitle of the model
     *
     * @return string|null
     */
    public function getSubtitleAttribute(): ?string
    {
        return "#{$this->getKey()}";
    }
}
