<?php

namespace App\Nova;

use App\Models\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource as NovaResource;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Titasgailius\SearchRelations\SearchesRelations;

/** @property-read Model $resource */
abstract class Resource extends NovaResource
{
    use SearchesRelations;

    /** {@inheritdoc} */
    public static $tableStyle = 'tight';

    /** {@inheritdoc} */
    public static $showColumnBorders = true;

    /** {@inheritdoc} */
    public static function label(): string
    {
        return __(Str::of(self::baseLabel())
            ->plural()
            ->__toString());
    }

    /** {@inheritdoc} */
    public static function singularLabel(): string
    {
        return __(self::baseLabel()->__toString());
    }

    /**
     * @inheritdoc
     * @param static $resource
     */
    public static function redirectAfterCreate(NovaRequest $request, $resource): string
    {
        return self::redirect($request, $resource);
    }

    /**
     * @inheritdoc
     * @param static $resource
     */
    public static function redirectAfterUpdate(NovaRequest $request, $resource): string
    {
        return self::redirect($request, $resource);
    }

    /**
     * @param NovaRequest $request
     * @param static $resource
     * @return string
     */
    private static function redirect(NovaRequest $request, $resource): string
    {
        $viaResource = $request->input('viaResource');
        $viaResourceId = $request->input('viaResourceId');

        if (!$viaResource || !$viaResourceId) {
            return parent::redirectAfterCreate($request, $resource);
        }

        $viaRelationship = $request->input('viaRelationship');

        $tab = Str::of(__(Str::of($viaRelationship)
            ->snake()
            ->replace('_', ' ')
            ->ucfirst()
            ->__toString()))
            ->lower()
            ->kebab();

        return "/resources/{$viaResource}/{$viaResourceId}?tab={$tab}";
    }

    private static function baseLabel(): Stringable
    {
        return Str::of(class_basename(get_called_class()))
            ->snake(' ')
            ->ucfirst();
    }

    /** {@inheritdoc} */
    public function title(): string
    {
        return $this->resource->title ?? '';
    }

    /** {@inheritdoc} */
    public function subtitle(): string
    {
        return $this->resource->subtitle ?? '';
    }

    /** {@inheritdoc} */
    public function actions(Request $request): array
    {
        return [
            ...parent::actions($request),
            (new DownloadExcel)
                ->withHeadings()
                ->allFields(),
        ];
    }
}
