<?php

namespace App\Nova;

use App\Models\Activity as ActivityModel;
use App\Nova\Fields\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Text;

/**
 * Class Activity
 *
 * @package App\Nova
 * @property-read ActivityModel $resource
 */
class Activity extends Resource
{
    public static $model = ActivityModel::class;

    /**
     * @inheritdoc
     */
    public static $displayInNavigation = false;

    /**
     * @inheritdoc
     */
    public static $search = [
        'id',
        'log_name',
        'description',
        'subject_id',
        'subject_type',
        'causer_id',
        'causer_type',
        'properties',
    ];

//    /**
//     * @inheritdoc
//     */
//    public function title(): string
//    {
//        return $this->resource->description;
//    }

    /**
     * @inheritdoc
     */
    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->sortable(),

            Text::make(__('Log name'), 'log_name')
                ->sortable(),

            Text::make(__('Description'), 'description')
                ->sortable()
                ->rules('required', 'string'),

            MorphTo::make(__('Subject'), 'subject')
                ->types([
                    User::class,
                ])
                ->searchable()
                ->withSubtitles(),

            Text::make(__('Event'), 'event')
                ->sortable(),

            MorphTo::make(__('Causer'), 'causer')
                ->types([
                    User::class,
                ])
                ->searchable()
                ->withSubtitles(),

            Text::make(__('Batch UUID'), 'batch_uuid')
                ->sortable(),

            KeyValue::make(__('Properties'), function () {
                $properties = $this->resource->properties;

                $activities = [];
                foreach ($properties['attributes'] as $key => $value) {
                    if (Str::contains($this->resource->description, 'Updated')) {
                        $activities[$key] = $properties['old'][$key] . ' => ' . $value;
                    } else {
                        $activities[$key] = $value;
                    }
                }

                return $activities;
            })
                ->onlyOnDetail()
                ->stacked(),

            DateTime::make(__('Created at'), 'created_at')
                ->exceptOnForms(),
        ];
    }
}
