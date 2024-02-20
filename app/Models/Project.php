<?php

namespace App\Models;

use App\Support\Enums\MediaCollections;
use App\Support\Enums\MediaConversions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Project
 *
 * @package App\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'nl_name',
        'en_name',
        'nl_description',
        'en_description',
    ];

    /* ACCESSORS & MUTATORS */
    public function getTitleAttribute(): ?string
    {
        return app()->getLocale() == 'en'
            ? $this->en_name
            : $this->nl_name;
    }

    /* MEDIA */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaCollections::IMAGES);
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion(MediaConversions::THUMBNAIL)
            ->width(480)
            ->height(480)
            ->sharpen(10);
    }
}
