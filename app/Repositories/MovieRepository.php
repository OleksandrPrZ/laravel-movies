<?php
namespace App\Repositories;

use App\Contracts\Movie\MovieRepositoryInterface;
use App\Models\Movie\Movie;
use Illuminate\Support\Facades\DB;

class MovieRepository implements MovieRepositoryInterface
{
    /**
     * Paginate the list of movies.
     */
    public function paginate($perPage = 10)
    {
        return Movie::paginate($perPage);
    }

    /**
     * Find a movie by ID.
     */
    public function find($id): ?Movie
    {
        return Movie::findOrFail($id);
    }

    /**
     * Create a new movie.
     */
    public function create(array $data): Movie
    {
        DB::beginTransaction();

        try {
            $movie = new Movie();
            $this->fillMovieData($movie, $data);
            $movie->save();

            if (isset($data['tags'])) {
                $movie->tags()->sync($data['tags']);
            }
            if (isset($data['casts'])) {
                $movie->casts()->sync($data['casts']);
            }
            DB::commit();
            return $movie;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Update an existing movie.
     */
    public function update($id, array $data): Movie
    {
        DB::beginTransaction();

        try {
            $movie = Movie::findOrFail($id);
            $this->fillMovieData($movie, $data);
            $movie->save();

            if (isset($data['tags'])) {
                $movie->tags()->sync($data['tags']);
            }

            if (isset($data['casts'])) {
                $movie->casts()->sync($data['casts']);
            }

            DB::commit();

            return $movie;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Delete a movie by ID.
     */
    public function delete($id): bool
    {
        $movie = $this->find($id);

        if ($movie) {
            DB::beginTransaction();

            try {
                if ($movie->poster) {
                    \Storage::disk('public')->delete($movie->poster);
                }

                $movie->tags()->detach();
                $movie->casts()->detach();
                $movie->delete();

                DB::commit();
                return true;

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }

        return false;
    }

    /**
     * Fill the Movie object with data from the given array.
     */
    private function fillMovieData(Movie $movie, array $data): void
    {
        $movie->status = $data['status'];
        $movie->setTranslation('title', 'ua', $data['title_ua']);
        $movie->setTranslation('title', 'en', $data['title_en']);
        $movie->setTranslation('description', 'ua', $data['description_ua']);
        $movie->setTranslation('description', 'en', $data['description_en']);
        $movie->youtube_trailer_id = $data['youtube_trailer_id'];
        $movie->release_year = $data['release_year'];
        $movie->viewing_start_date = $data['viewing_start_date'];
        $movie->viewing_end_date = $data['viewing_end_date'];
        $movie->screenshots = $data['screenshots'] ?? [];
        $movie->slug = $data['slug'];

        if (isset($data['poster'])) {
            if ($movie->poster) {
                \Storage::disk('public')->delete($movie->poster);
            }
            $movie->poster = $data['poster']->store('posters', 'public');
        }
    }

    public function findBySlug(string $slug): ?Movie
    {
        return Movie::where('slug', $slug)->firstOrFail();
    }
}
