<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->string('poster')->nullable();
            $table->json('screenshots')->nullable();
            $table->string('youtube_trailer_id')->nullable();
            $table->year('release_year')->nullable();
            $table->json('cast')->nullable();
            $table->datetime('viewing_start_date')->nullable();
            $table->datetime('viewing_end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
}
