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
    public function run()
    {
        $tags = [
            ['name' => ['ua' => 'Тег 1', 'en' => 'Tag 1']],
            ['name' => ['ua' => 'Тег 2', 'en' => 'Tag 2']],
            ['name' => ['ua' => 'Тег 3', 'en' => 'Tag 3']],
            ['name' => ['ua' => 'Тег 4', 'en' => 'Tag 4']],
            ['name' => ['ua' => 'Тег 5', 'en' => 'Tag 5']],
            ['name' => ['ua' => 'Тег 6', 'en' => 'Tag 6']],
            ['name' => ['ua' => 'Тег 7', 'en' => 'Tag 7']],
            ['name' => ['ua' => 'Тег 8', 'en' => 'Tag 8']],
            ['name' => ['ua' => 'Тег 9', 'en' => 'Tag 9']],
            ['name' => ['ua' => 'Тег 10', 'en' => 'Tag 10']],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
