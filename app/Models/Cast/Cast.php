<?php

namespace App\Models\Cast;

use App\Models\Movie\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Cast extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['type', 'name', 'photo'];

    public const TYPES = [
        'director' => 'Режисер',
        'writer' => 'Сценарист',
        'actor' => 'Актор',
        'composer' => 'Композитор'
    ];

    public static function getTypeOptions(): array
    {
        return self::TYPES;
    }

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'cast_movie', 'cast_id', 'movie_id');
    }
}
