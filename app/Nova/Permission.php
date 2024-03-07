<?php

namespace App\Nova;

use App\Models\Permission as PermissionModel;
use App\Models\User as UserModel;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\MorphMany;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Vyuldashev\NovaPermission\Permission as SpatieNovaPermission;

/** @property-read PermissionModel $resource */
class Permission extends SpatieNovaPermission
{
    public static $model = PermissionModel::class;

    /** {@inheritdoc} */
    public static $with = [
        'roles',
    ];

    /** {@inheritdoc} */
    public static function availableForNavigation(Request $request): bool
    {
        /** @var UserModel|null $user */
        $user = $request->user();

        return $user
            && $user->can('View permissions');
    }

    /** {@inheritdoc} */
    public function fields(Request $request): array
    {
        return [
            ...parent::fields($request),
            (new Tabs(__('Relations'), [
                MorphMany::make(__('Activities'), 'activities', Activity::class),
            ]))
                ->defaultSearch()
                ->withToolbar(),
        ];
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
