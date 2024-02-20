<?php

namespace App\Http\Resources;

use App\Models\Model;
use App\Support\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Resources\Json\JsonResource as BaseJsonResource;
use Illuminate\Support\Carbon;

/**
 * Class JsonResource
 *
 * @package App\Http\Resources
 * @property-read Model $resource
 */
abstract class JsonResource extends BaseJsonResource
{
    /**
     * @param string $modelClass
     * @return array
     */
    public function baseToArray(string $modelClass): array
    {
        $data = [
            $this->resource->getKeyName() => $this->resource->getKey(),
            '_title'                      => $this->resource->title,
            '_subtitle'                   => $this->resource->subtitle,
        ];

        if ($this->resource->usesTimestamps()) {
            $data = array_merge($data, [
                'created_at' => $this->resource->created_at->toIso8601String(),
                'updated_at' => $this->resource->updated_at->toIso8601String(),
            ]);
        }

        $traits = class_uses($modelClass);
        if (in_array(SoftDeletes::class, array_keys($traits))) {
            $data = array_merge($data, [
                'deleted_at' => optional($this->resource->deleted_at, fn(Carbon $deletedAt) => $deletedAt->toIso8601String()),
            ]);
        }

        if (in_array(LogsActivity::class, array_keys($traits))) {
            $data = array_merge($data, [
                'activities' => Activity::collection($this->whenLoaded('activities')),
            ]);
        }

        return $data;
    }
}
