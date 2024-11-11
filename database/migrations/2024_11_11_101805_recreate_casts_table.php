<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('casts');

        Schema::create('casts', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->json('name');
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        Schema::create('cast_movie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->foreignId('cast_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cast_movie');
        Schema::dropIfExists('casts');
    }
};
