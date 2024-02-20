<?php

namespace App\Http\Resources;

use App\Models\Activity as ActivityModel;

/**
 * Class Activity
 *
 * @package App\Http\Resources
 * @property-read ActivityModel $resource
 */
class Activity extends JsonResource
{
    /**
     * @inheritdoc
     */
    public function toArray($request): array
    {
        return array_merge($this->baseToArray(ActivityModel::class), [
            'log_name'     => $this->resource->log_name,
            'description'  => $this->resource->description,
            'subject_id'   => $this->resource->subject_id,
            'subject_type' => $this->resource->subject_type,
            'causer_id'    => $this->resource->causer_id,
            'causer_type'  => $this->resource->causer_type,
            'properties'   => $this->resource->properties,
        ]);
    }
}
