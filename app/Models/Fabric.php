<?php

namespace App\Models;

use App\Support\Enums\MediaCollections;
use App\Support\Enums\MediaConversions;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Fabric extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /** {@inheritdoc} */
    protected $fillable = [
        'article_number',
        'name',
        'composition',
        'usable_width',
        'weight',
        'nl_description',
        'en_description',
        'two_way_stretch',
        'pilling_resistant',
        'wrinkle_free_and_easy_care',
        'quick_dry',
        'breathable',
        'moisture_management',
        'muscle_control',
        'uv_protection',
        'recycle_yarn',
        'active',
    ];

    /** {@inheritdoc} */
    protected $attributes = [
        'active' => true,
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaCollections::Images->value);
    }

    /*** @throws InvalidManipulation */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion(MediaConversions::Thumbnail->value)
            ->width(480)
            ->height(480)
            ->sharpen(10);
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes): string => $attributes['name'],
        );
    }

    protected function subtitle(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes): string => $attributes['article_number'],
        );
    }
}
