<?php

namespace App\Models;

use App\Enums\Rating;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'rating',
        'icon',
    ];
    protected $casts = [
        'rating' => Rating::class,
    ];
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('logo_' . $model->id);
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function setRatingAttribute($value)
    {
        $this->attributes['Rating'] = $value ?? 1;
    }
    public function getRatingIntAttribute()
    {
        return (int) $this->Rating->value;
    }
    public function getPercentageAttribute()
    {
        return ($this->RatingInt / 10) * 100;
    }
}
