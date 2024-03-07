<?php

namespace App\Nova;

use App\Models\Fabric as FabricModel;
use App\Support\Enums\MediaCollections;
use App\Support\Enums\MediaConversions;
use BayAreaWebPro\NovaFieldCkEditor\CkEditor;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

/** @property-read FabricModel $resource */
class Fabric extends Resource
{
    public static $model = FabricModel::class;

    /** {@inheritdoc} */
    public static $search = [
        'id',
        'article_number',
        'name',
    ];

    /** {@inheritdoc} */
    public static $with = [
        'media',
    ];

    /** {@inheritdoc} */
    public static function group(): string
    {
        return __('LN Prints');
    }

    /** {@inheritdoc} */
    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->sortable(),

            Text::make(__('Article number'), 'article_number')
                ->sortable()
                ->rules('required')
                ->creationRules('unique:fabrics,article_number')
                ->updateRules('unique:fabrics,article_number,{{resourceId}}'),

            Text::make(__('Name'), 'name')
                ->sortable()
                ->rules('required'),

            Text::make(__('Composition'), 'composition')
                ->sortable()
                ->rules('required'),

            Number::make(__('Usable width'), 'usable_width')
                ->sortable()
                ->rules('required', 'integer'),

            Number::make(__('Weight'), 'weight')
                ->sortable()
                ->rules('required', 'numeric'),

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

            Boolean::make(__('fabrics.tooltips.two_way_stretch'), 'two_way_stretch')
                ->hideFromIndex()
                ->rules('boolean'),

            Boolean::make(__(__('fabrics.tooltips.pilling_resistant')), 'pilling_resistant')
                ->hideFromIndex()
                ->rules('boolean'),

            Boolean::make(__('fabrics.tooltips.wrinkle_free_and_easy_care'), 'wrinkle_free_and_easy_care')
                ->hideFromIndex()
                ->rules('boolean'),

            Boolean::make(__('fabrics.tooltips.quick_dry'), 'quick_dry')
                ->hideFromIndex()
                ->rules('boolean'),

            Boolean::make(__('fabrics.tooltips.breathable'), 'breathable')
                ->hideFromIndex()
                ->rules('boolean'),

            Boolean::make(__('fabrics.tooltips.moisture_management'), 'moisture_management')
                ->hideFromIndex()
                ->rules('boolean'),

            Boolean::make(__('fabrics.tooltips.muscle_control'), 'muscle_control')
                ->hideFromIndex()
                ->rules('boolean'),

            Boolean::make(__('fabrics.tooltips.uv_protection'), 'uv_protection')
                ->hideFromIndex()
                ->rules('boolean'),

            Boolean::make(__('fabrics.tooltips.recycled_yarn'), 'recycled_yarn')
                ->hideFromIndex()
                ->rules('boolean'),

            Boolean::make(__('Active'), 'active')
                ->rules('boolean'),

            Images::make(__('Images'), MediaCollections::Images->value)
                ->singleImageRules([
                    'image',
                    Rule::dimensions()
                        ->minWidth(480)
                        ->minHeight(320)
                        ->maxWidth(3840)
                        ->maxHeight(2160),
                ])
                ->conversionOnIndexView(MediaConversions::Thumbnail->value)
                ->fullSize()
                ->rules('required'),
            (new Tabs(__('Relations'), [
                MorphMany::make(__('Activities'), 'activities', Activity::class),
            ]))->withToolbar(),
        ];
    }
}
