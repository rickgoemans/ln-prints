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

class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /** {@inheritdoc} */
    protected $fillable = [
        'nl_name',
        'en_name',
        'nl_description',
        'en_description',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaCollections::Images->value);
    }

    /**
     * @throws InvalidManipulation
     */
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
            get: fn(mixed $value, array $attributes): ?string => app()->getLocale() == 'en'
                ? $attributes['en_name']
                : $attributes['nl_name'],
        );
    }
}
