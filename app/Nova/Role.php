<?php

namespace App\Nova;

use App\Models\Role as RoleModel;
use App\Models\User as UserModel;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\MorphMany;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Vyuldashev\NovaPermission\Role as SpatieNovaRole;

/** @property-read RoleModel $resource */
class Role extends SpatieNovaRole
{
    public static $model = RoleModel::class;

    public static $searchRelations = [
        'permissions' => [
            'name',
        ],
        'users'       => [
            'name',
        ],
    ];

    /** {@inheritdoc} */
    public static $with = [
        'permissions',
        'users',
    ];

    /** {@inheritdoc} */
    public static function availableForNavigation(Request $request): bool
    {
        /** @var UserModel|null $user */
        $user = $request->user();

        return $user
            && $user->can('View roles');
    }

    /** {@inheritdoc} */
    public function title(): string
    {
        return $this->resource->title;
    }

    /** {@inheritdoc} */
    public function subtitle(): string
    {
        return __('Users') . " {$this->resource->users()->count()}  | " . __('Permissions') . " {$this->resource->permissions()->count()}";
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
