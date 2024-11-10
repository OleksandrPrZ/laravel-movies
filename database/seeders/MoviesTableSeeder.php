<?php

namespace Database\Seeders;

use App\Models\Movie\Movie;
use App\Models\Tag\Tag;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TagsTableSeeder::class);

        $movies = [
            [
                'status' => true,
                'title' => [
                    'ua' => 'Темний Лицар',
                    'en' => 'The Dark Knight'
                ],
                'description' => [
                    'ua' => 'Бетмен повинен зіткнутися з найнебезпечнішим злочинцем Ґотема – Джокером.',
                    'en' => 'Batman faces the Joker, Gotham\'s most dangerous criminal.'
                ],
                'youtube_trailer_id' => 'EXeTwQWrcwY',
                'release_year' => 2008,
                'poster' => null,
                'screenshots' => [],
                'tags' => [1, 2],
            ],
            [
                'status' => true,
                'title' => [
                    'ua' => 'Інтерстеллар',
                    'en' => 'Interstellar'
                ],
                'description' => [
                    'ua' => 'Група дослідників здійснює подорож крізь кротову нору для порятунку людства.',
                    'en' => 'A group of explorers travels through a wormhole in space to ensure humanity\'s survival.'
                ],
                'youtube_trailer_id' => 'zSWdZVtXT7E',
                'release_year' => 2014,
                'poster' => null,
                'screenshots' => [],
                'tags' => [2, 3],
            ],
            [
                'status' => true,
                'title' => [
                    'ua' => 'Матриця',
                    'en' => 'The Matrix'
                ],
                'description' => [
                    'ua' => 'Комп\'ютерний хакер відкриває таємницю про справжню природу реальності.',
                    'en' => 'A computer hacker learns about the true nature of reality.'
                ],
                'youtube_trailer_id' => 'vKQi3bBA1y8',
                'release_year' => 1999,
                'poster' => null,
                'screenshots' => [],
                'tags' => [1, 3],
            ],
            [
                'status' => true,
                'title' => [
                    'ua' => 'Початок',
                    'en' => 'Inception'
                ],
                'description' => [
                    'ua' => 'Крадій, що викрадає таємниці з підсвідомості, отримує завдання вселити ідею в чужий розум.',
                    'en' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea.'
                ],
                'youtube_trailer_id' => '8hP9D6kZseM',
                'release_year' => 2010,
                'poster' => null,
                'screenshots' => [],
                'tags' => [2, 4],
            ],
            [
                'status' => true,
                'title' => [
                    'ua' => 'Титанік',
                    'en' => 'Titanic'
                ],
                'description' => [
                    'ua' => 'Молода пара з різних соціальних станів закохується на борту «Титаніка».',
                    'en' => 'A young couple from different social backgrounds fall in love aboard the ill-fated RMS Titanic.'
                ],
                'youtube_trailer_id' => '2e-eXJ6HgkQ',
                'release_year' => 1997,
                'poster' => null,
                'screenshots' => [],
                'tags' => [4, 5],
            ],
            [
                'status' => true,
                'title' => [
                    'ua' => 'Зелена миля',
                    'en' => 'The Green Mile'
                ],
                'description' => [
                    'ua' => 'Охоронці смертників помічають чудодійні здібності в одного із засуджених.',
                    'en' => 'Death row guards at a penitentiary, in the 1930s, notice the supernatural powers of an inmate.'
                ],
                'youtube_trailer_id' => 'Ki4haFrqSrw',
                'release_year' => 1999,
                'poster' => null,
                'screenshots' => [],
                'tags' => [2, 5],
            ],
            [
                'status' => true,
                'title' => [
                    'ua' => 'Форрест Ґамп',
                    'en' => 'Forrest Gump'
                ],
                'description' => [
                    'ua' => 'Простий чоловік із добрим серцем переживає незвичайні пригоди.',
                    'en' => 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and more through the perspective of an Alabama man with a low IQ.'
                ],
                'youtube_trailer_id' => 'uPIEn0M8su0',
                'release_year' => 1994,
                'poster' => null,
                'screenshots' => [],
                'tags' => [3, 5],
            ],
            [
                'status' => true,
                'title' => [
                    'ua' => 'Володар кілець: Повернення короля',
                    'en' => 'The Lord of the Rings: The Return of the King'
                ],
                'description' => [
                    'ua' => 'Фродо та Сем, із допомогою Голлума, прямують до Вогненної Гори, щоб знищити Перстень.',
                    'en' => 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.'
                ],
                'youtube_trailer_id' => 'r5X-hFf6Bwo',
                'release_year' => 2003,
                'poster' => null,
                'screenshots' => [],
                'tags' => [1, 3],
            ],
            [
                'status' => true,
                'title' => [
                    'ua' => 'Шоушенк: Втеча',
                    'en' => 'The Shawshank Redemption'
                ],
                'description' => [
                    'ua' => 'Невинний чоловік засуджений до довічного ув\'язнення у в\'язниці.',
                    'en' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'
                ],
                'youtube_trailer_id' => 'NmzuHjWmXOc',
                'release_year' => 1994,
                'poster' => null,
                'screenshots' => [],
                'tags' => [2, 4],
            ],
            [
                'status' => true,
                'title' => [
                    'ua' => 'Леон',
                    'en' => 'Leon: The Professional'
                ],
                'description' => [
                    'ua' => 'Кілер бере під опіку маленьку дівчинку після того, як її родину вбивають.',
                    'en' => 'Mathilda, a 12-year-old girl, is reluctantly taken in by Leon, a professional assassin, after her family is murdered.'
                ],
                'youtube_trailer_id' => 'DcsirofJrlM',
                'release_year' => 1994,
                'poster' => null,
                'screenshots' => [],
                'tags' => [1, 5],
            ],
        ];

        foreach ($movies as $movieData) {
            $tagIds = $movieData['tags'];
            unset($movieData['tags']);

            $movie = Movie::create($movieData);
            $movie->tags()->attach($tagIds);
        }
    }
}
