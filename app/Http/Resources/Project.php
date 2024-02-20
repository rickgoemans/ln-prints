<?php

namespace App\Http\Resources;

use App\Models\Project as ProjectModel;

/**
 * Class Project
 *
 * @package App\Http\Resources
 * @property-read ProjectModel $resource
 */
class Project extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return array_merge($this->baseToArray(ProjectModel::class), [
            'nl_name'        => $this->resource->nl_name,
            'en_name'        => $this->resource->en_name,
            'nl_description' => $this->resource->nl_description,
            'en_description' => $this->resource->en_description,
        ]);
    }
}
