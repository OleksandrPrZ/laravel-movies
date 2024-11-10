<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'slug'];
    public $translatable = ['name'];

    protected static function boot(): void
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->isDirty('slug') || !$model->exists) {
                $name = $model->getTranslation('name', 'en') ?? $model->getTranslation('name', 'ua');
                $slug = $model->slug ?: Str::slug($name);
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
