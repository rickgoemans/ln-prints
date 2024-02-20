<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class UserCollection
 *
 * @package App\Http\Resources
 * @author Provide Software <software@provide.nl>
 */
class UserCollection extends ResourceCollection
{
    /**
     * @inheritdoc
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
