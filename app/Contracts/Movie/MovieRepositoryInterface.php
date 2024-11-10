<?php
namespace App\Contracts\Movie;

use App\Models\Movie\Movie;

interface MovieRepositoryInterface
{
    public function paginate($perPage = 10);
    public function find($id);
    public function findBySlug(string $slug): ?Movie;
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
