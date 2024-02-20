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
 * Class Fabric
 *
 * @package App\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class Fabric extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
    protected $attributes = [
        'active' => true,
    ];

    /**
     * @inheritdoc
     */
    public function getTitleAttribute(): ?string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getSubtitleAttribute(): ?string
    {
        return $this->article_number;
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
