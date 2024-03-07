<?php

namespace App\Http\Resources;

use App\Models\Project as ProjectModel;

/** @property-read ProjectModel $resource */
class Project extends JsonResource
{
    /** {@inheritdoc} */
    public function toArray($request): array
    {
        return [
            ...$this->baseToArray(ProjectModel::class),
            'nl_name'        => $this->resource->nl_name,
            'en_name'        => $this->resource->en_name,
            'nl_description' => $this->resource->nl_description,
            'en_description' => $this->resource->en_description,
        ];
    }
}
