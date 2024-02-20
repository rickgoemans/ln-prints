<?php

namespace App\Nova;

use App\Models\User as UserModel;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use KABBOUCHI\NovaImpersonate\Impersonate;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;

/**
 * Class User
 *
 * @package App\Nova
 * @property-read UserModel $resource
 */
class User extends Resource
{
    public static $model = UserModel::class;

    /**
     * @inheritdoc
     */
    public static $search = [
        'id',
        'name',
        'email',
    ];

    public static $searchRelations = [
        'roles'       => [
            'name',
        ],
        'permissions' => [
            'name',
        ],
    ];

    /**
     * @inheritdoc
     */
    public static $with = [
        'roles',
        'permissions',
    ];

    /**
     * @inheritdoc
     */
    public function title(): string
    {
        return "{$this->resource->name}";
    }

    /**
     * @inheritdoc
     */
    public function subtitle(): string
    {
        return "Role(s): " . implode(', ', $this->resource->roles->pluck('name')->toArray());
    }

    /**
     * @inheritdoc
     */
    public static function group(): string
    {
        return __('nova-permission-tool::navigation.sidebar-label');
    }

    /**
     * @inheritdoc
     */
    public function fields(Request $request)
    {
        return [
            ID::make()
                ->sortable(),

            Gravatar::make()
                ->maxWidth(50),

            Text::make(__('Name'), 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('Email'), 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make(__('Password'), 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            Impersonate::make($this)
                ->withMeta([
                    'redirect_to' => config('nova.path'),
                ]),

            (new Tabs(__('Relations'), [
                MorphMany::make(__('Activities'), 'activities', Activity::class),
                MorphToMany::make(__('Roles'), 'roles', Role::class),
                MorphToMany::make(__('Permissions'), 'permissions', Permission::class),
            ]))
                ->defaultSearch()
                ->withToolbar(),
        ];
    }
}
