<?php

namespace App\Models\Cast;

use App\Models\Movie\Movie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cast extends Model
{
    use HasFactory;
    protected $fillable = ['movie_id', 'type', 'name', 'photo'];

    protected $casts = [
        'name' => 'array',
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
