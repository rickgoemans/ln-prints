<?php

namespace App\Support\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * Trait HasTitleAccessor
 *
 * @package App\Support\Traits
 * @mixin Model
 */
trait HasTitleAccessor
{
    public function getTitleAttribute(): int|string|null
    {
        return $this->getKey();
    }
}
