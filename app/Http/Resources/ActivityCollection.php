<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityCollection extends ResourceCollection
{
    /**
     * @inheritdoc
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
