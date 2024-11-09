<?php

namespace App\Models\Movie;

use App\Models\Cast\Cast;
use App\Models\Tag\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
    use HasTranslations;

    protected $fillable = [
        'status',
        'title',
        'description',
        'poster',
        'screenshots',
        'youtube_trailer_id',
        'release_year',
        'cast'
    ];

    protected $casts = [
        'screenshots' => 'array',
        'cast' => 'array',
    ];

    public $translatable = ['title', 'description', 'cast'];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'movie_tag', 'movie_id', 'tag_id');
    }
    public function casts(): HasMany
    {
        return $this->hasMany(Cast::class, 'cast_id');
    }
}
