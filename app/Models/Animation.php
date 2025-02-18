<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Animation extends Model
{
    use HasFactory, HasTags, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'description',
        'category_id',
        'author_id',
        'source',
        'source_url',
    ];

    protected $casts = [
        'status' => PostStatus::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
