<?php

use Brick\Money\Money;
use Illuminate\Support\Facades\File as FileFacade;
use Illuminate\Support\Facades\Route;
use Laravel\Nova\Fields\Country;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

if (!function_exists('crudPermissions')) {
    /**
     * Outputs all CRUD permissions based on a given permission name
     *
     * @param string $permissionName
     * @param bool $hasSoftDelete default false. when true also "Restore" and "Force delete" permissions are created
     * @return string[]
     */
    function crudPermissions(string $permissionName, bool $hasSoftDelete = false): array
    {
        $permissions = [
            "View {$permissionName}",
            "Create {$permissionName}",
            "Update {$permissionName}",
            "Delete {$permissionName}",
        ];
        $softDeletePermissions = [
            "Restore {$permissionName}",
            "Force delete {$permissionName}",
        ];
        return $hasSoftDelete ? array_merge($permissions, $softDeletePermissions) : $permissions;
    }
}

if (!function_exists('encodeImage')) {
    function encodeImage(string $path): string
    {
        $contents = FileFacade::get($path);
        $type = FileFacade::type($path);

        return "data:image/${type};base64," . base64_encode($contents);
    }
}

if (!function_exists('encodeMedia')) {
    /**
     * @param \Spatie\MediaLibrary\MediaCollections\Models\Media $media
     * @return string
     */
    function encodeMedia(Media $media): string
    {
        if ($media->getDiskDriverName() !== 's3') {
            return encodeImage($media->getPath());
        }

        $image = file_get_contents($media->getTemporaryUrl(now()->addSeconds(10)));
        return "data:image/{$media->getExtensionAttribute()};base64," . base64_encode($image);
    }
}

if (!function_exists('currencyFormat')) {
    /**
     * Format a currency
     *
     * @param float $value
     * @param int $decimals
     * @param bool $withIcon
     * @return string
     * @throws \Brick\Money\Exception\UnknownCurrencyException
     */
    function currencyFormat(float $value, int $decimals = 2, bool $withIcon = true): string
    {
        if ($withIcon) {
            return Money::of(round($value, 2), config('nova.currency'))
                ->formatTo('nl');
        } else {
            return number_format($value, $decimals, ',', '');
        }
    }
}

if (!function_exists('country')) {
    function country(string $alpha2CountryCode): string
    {
        $countryField = Country::make('Country');

        $matches = array_filter($countryField->meta()['options'], function (array $option) use ($alpha2CountryCode) {
            return $option['value'] === $alpha2CountryCode;
        });

        if (count($matches) > 0) {
            return array_pop($matches)['label'];
        }

        return $alpha2CountryCode;
    }
}

if (!function_exists('novaRoute')) {
    function novaRoute(string $resource, ?int $id = null, string $mode = 'detail'): string
    {
        $baseUrl = url(config('nova.path') . '/resources/' . $resource::uriKey());

        return match ($mode) {
            'detail' => "{$baseUrl}/{$id}",
            'create' => "{$baseUrl}/new",
            'edit' => "{$baseUrl}/{$id}/edit",
            default => $baseUrl,
        };
    }
}

if (!function_exists('headerImage')) {
    function headerImage(): ?string
    {
        return match (Route::currentRouteName()) {
            'fabrics' => asset('images/fabrics/header.jpg'),
            'sustainability' => asset('images/sustainability/header.jpg'),
            'process' => asset('images/process/header.jpg'),
            'projects' => asset('images/projects/header.jpg'),
            'about-us' => asset('images/about-us/header.jpg'),
            'contact.view' => asset('images/contact/header.jpg'),
            default => null,
        };
    }
}
