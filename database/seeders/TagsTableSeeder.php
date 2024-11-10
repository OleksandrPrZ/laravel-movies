<?php

namespace Database\Seeders;

use App\Models\Tag\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $tags = [
            ['name' => ['ua' => 'Драма', 'en' => 'Drama']],
            ['name' => ['ua' => 'Комедія', 'en' => 'Comedy']],
            ['name' => ['ua' => 'Трилер', 'en' => 'Thriller']],
            ['name' => ['ua' => 'Бойовик', 'en' => 'Action']],
            ['name' => ['ua' => 'Фантастика', 'en' => 'Science Fiction']],
            ['name' => ['ua' => 'Жахи', 'en' => 'Horror']],
            ['name' => ['ua' => 'Анімація', 'en' => 'Animation']],
            ['name' => ['ua' => 'Мелодрама', 'en' => 'Romance']],
            ['name' => ['ua' => 'Фентезі', 'en' => 'Fantasy']],
            ['name' => ['ua' => 'Документальний', 'en' => 'Documentary']],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
