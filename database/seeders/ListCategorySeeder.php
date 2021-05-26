<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ListCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_categories = [
            ['id' => 1, 'type_id' => 1, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'type_id' => 2, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'type_id' => 2, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'type_id' => 3, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'type_id' => 4, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'type_id' => 5, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'type_id' => 6, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        $list_category_translations = [
            ['id' => 1, 'locale' => 'oz', 'title' => 'Yangiliklar', 'list_category_id' => 1],
            ['id' => 2, 'locale' => 'ru', 'title' => 'Янгиликлар', 'list_category_id' => 1],
            ['id' => 3, 'locale' => 'en', 'title' => 'News', 'list_category_id' => 1],
            ['id' => 4, 'locale' => 'oz', 'title' => 'Statistika', 'list_category_id' => 2],
            ['id' => 5, 'locale' => 'ru', 'title' => 'Статистика', 'list_category_id' => 2],
            ['id' => 6, 'locale' => 'en', 'title' => 'Statistics', 'list_category_id' => 2],
            ['id' => 7, 'locale' => 'oz', 'title' => 'Havolalar', 'list_category_id' => 3],
            ['id' => 8, 'locale' => 'ru', 'title' => 'ССылки', 'list_category_id' => 3],
            ['id' => 9, 'locale' => 'en', 'title' => 'Links', 'list_category_id' => 3],
            ['id' => 10, 'locale' => 'oz', 'title' => 'Bakalavr', 'list_category_id' => 4],
            ['id' => 11, 'locale' => 'ru', 'title' => 'Бакалавр', 'list_category_id' => 4],
            ['id' => 12, 'locale' => 'en', 'title' => 'Bachelor', 'list_category_id' => 4],
            ['id' => 13, 'locale' => 'oz', 'title' => 'Vakansiyalar', 'list_category_id' => 5],
            ['id' => 14, 'locale' => 'ru', 'title' => 'Вакансии', 'list_category_id' => 5],
            ['id' => 15, 'locale' => 'en', 'title' => 'Vacancies', 'list_category_id' => 5],
            ['id' => 16, 'locale' => 'oz', 'title' => 'Fayllar', 'list_category_id' => 6],
            ['id' => 17, 'locale' => 'ru', 'title' => 'Файлы', 'list_category_id' => 6],
            ['id' => 18, 'locale' => 'en', 'title' => 'Files', 'list_category_id' => 6],
            ['id' => 19, 'locale' => 'oz', 'title' => 'Sahifalar', 'list_category_id' => 7],
            ['id' => 20, 'locale' => 'ru', 'title' => 'Страницы', 'list_category_id' => 7],
            ['id' => 21, 'locale' => 'en', 'title' => 'Pages', 'list_category_id' => 7],
        ];

        DB::table('list_categories')->insert($list_categories);
        DB::table('list_category_translations')->insert($list_category_translations);
    }
}
