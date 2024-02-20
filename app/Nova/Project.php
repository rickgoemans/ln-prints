<?php

namespace App\Nova;

use App\Models\Project as ProjectModel;
use App\Support\Enums\MediaCollections;
use App\Support\Enums\MediaConversions;
use BayAreaWebPro\NovaFieldCkEditor\CkEditor;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Text;

/**
 * Class Project
 *
 * @package App\Nova
 * @property-read ProjectModel $resource
 */
class Project extends Resource
{
    public static $model = ProjectModel::class;

    /**
     * @inheritdoc
     */
    public static $title = 'name';

    /**
     * @inheritdoc
     */
    public static $search = [
        'id',
        'nl_name',
        'en_name',
    ];

    /**
     * @inheritdoc
     */
    public static $with = [
        'media',
    ];

    /**
     * @inheritdoc
     */
    public static function group(): string
    {
        return __('LN Prints');
    }

    /**
     * @inheritdoc
     */
    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->sortable(),

            Text::make(__('NL Name'), 'nl_name')
                ->sortable()
                ->rules('required'),

            Text::make(__('EN Name'), 'en_name')
                ->sortable()
                ->rules('required'),

            CkEditor::make(__('NL Description'), 'nl_description')
                ->mediaBrowser()
                ->linkBrowser()
                ->hideFromIndex()
                ->stacked()
                ->rules('required'),

            CkEditor::make(__('EN Description'), 'en_description')
                ->mediaBrowser()
                ->linkBrowser()
                ->hideFromIndex()
                ->stacked()
                ->rules('required'),

            Images::make(__('Images'), MediaCollections::IMAGES)
                ->singleImageRules([
                    'image',
                    Rule::dimensions()
                        ->minWidth(480)
                        ->minHeight(320)
                        ->maxWidth(3840)
                        ->maxHeight(2160),
                ])
                ->conversionOnIndexView(MediaConversions::THUMBNAIL)
                ->fullSize()
                ->rules('required'),
            (new Tabs(__('Relations'), [
                MorphMany::make(__('Activities'), 'activities', Activity::class),
            ]))
                ->defaultSearch()
                ->withToolbar(),
        ];
    }
}
