<?php

namespace App\Models\Movie;

use App\Models\Cast\Cast;
use App\Models\Tag\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
    use HasTranslations;

    protected $fillable = ['status', 'title', 'description', 'youtube_trailer_id', 'release_year', 'screenshots', 'poster', 'slug'];

    protected $casts = [
        'screenshots' => 'array',
        'cast' => 'array',
    ];

    public $translatable = ['title', 'description', 'cast'];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'movie_tag', 'movie_id', 'tag_id');
    }
    public function casts(): BelongsToMany
    {
        return $this->belongsToMany(Cast::class);
    }
    protected static function boot(): void
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->isDirty('slug') || !$model->exists) {
                $title = $model->getTranslation('title', 'en');
                $slug = $model->slug ?: Str::slug($title);
                $model->slug = $model->generateUniqueSlug($slug, $model->id);
            }
        });
    }

    protected function generateUniqueSlug(string $slug, int|null $id = null): string
    {
        $originalSlug = Str::slug($slug);
        $counter = 1;

        while (self::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
