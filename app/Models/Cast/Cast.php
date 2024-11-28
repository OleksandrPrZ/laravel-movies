<?php

namespace App\Models\Cast;

use App\Enums\CastType;
use App\Models\Movie\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Cast extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['type', 'name', 'photo'];

    /**
     * @return array
     */
    public static function getTypeOptions(): array
    {
        return CastType::options();
    }

    /**
     * @return BelongsToMany
     */
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'cast_movie', 'cast_id', 'movie_id');
    }
}
