<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};

class Post extends Model implements HasMedia
{
    use HasFactory, HasTags, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'scope',
        'status',
        'content',
        'category_id',
        'author_id',
        'source',
        'source_url',
    ];

    protected $casts = [
        'status' => PostStatus::class,
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('collections')
            ->useFallbackUrl('/svg/color.no_image');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->keepOriginalImageFormat()
            ->width(350)
            ->height(350);
    }

    public function scopeCountByCategory($query, $categoryName)
    {
        return $query->whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->count();
    }

    public function scopeCountBySource($query, $source)
    {
        return $query->where('source', $source)->count();
    }

    public function scopeCountByStatus($query, $status)
    {
        return $query->where('status', $status->value)->count();
    }

    public function scopeInScope($query, $scope)
    {
        return $query->where('scope', $scope->value);
    }

    public function scopeRelated($query, $category = null)
    {
        $query = $query
            ->with(['category', 'author'])
            ->where('status', PostStatus::PUBLISH)
            ->orderBy('views', 'desc');

        if ($category) {
            return $query->where('category_id', $category);
        }

        return $query;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
