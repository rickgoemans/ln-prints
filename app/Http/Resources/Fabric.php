<?php

namespace App\Http\Resources;

use App\Models\Fabric as FabricModel;

/** @property-read FabricModel $resource */
class Fabric extends JsonResource
{
    /** {@inheritdoc} */
    public function toArray($request): array
    {
        return [
            ...$this->baseToArray(FabricModel::class),
            'article_number'             => $this->resource->article_number,
            'name'                       => $this->resource->name,
            'composition'                => $this->resource->composition,
            'usable_width'               => $this->resource->usable_width,
            'weight'                     => $this->resource->weight,
            'nl_description'             => $this->resource->nl_description,
            'en_description'             => $this->resource->en_description,
            'two_way_stretch'            => $this->resource->two_way_stretch,
            'pilling_resistant'          => $this->resource->pilling_resistant,
            'wrinkle_free_and_easy_care' => $this->resource->wrinkle_free_and_easy_care,
            'quick_dry'                  => $this->resource->quick_dry,
            'breathable'                 => $this->resource->breathable,
            'moisture_management'        => $this->resource->moisture_management,
            'muscle_control'             => $this->resource->muscle_control,
            'uv_protection'              => $this->resource->uv_protection,
            'recycle_yarn'               => $this->resource->recycled_yarn,
            'active'                     => $this->resource->active,
        ];
    }
}
