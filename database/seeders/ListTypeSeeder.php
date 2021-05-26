<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ListTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_types = [
            ['id' => 1, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        $list_type_translations = [
            ['id' => 1, 'locale' => 'oz', 'list_type_id' => 1, 'title' => 'Yangiliklar'],
            ['id' => 2, 'locale' => 'ru', 'list_type_id' => 1, 'title' => 'Янгиликлар'],
            ['id' => 3, 'locale' => 'en', 'list_type_id' => 1, 'title' => 'News'],
            ['id' => 4, 'locale' => 'oz', 'list_type_id' => 2, 'title' => 'Foydali'],
            ['id' => 5, 'locale' => 'ru', 'list_type_id' => 2, 'title' => 'Полезные'],
            ['id' => 6, 'locale' => 'en', 'list_type_id' => 2, 'title' => 'Usefuls'],
            ['id' => 7, 'locale' => 'oz', 'list_type_id' => 3, 'title' => 'Dasturlar'],
            ['id' => 8, 'locale' => 'ru', 'list_type_id' => 3, 'title' => 'Программы'],
            ['id' => 9, 'locale' => 'en', 'list_type_id' => 3, 'title' => 'Programs'],
            ['id' => 10, 'locale' => 'oz', 'list_type_id' => 4, 'title' => 'Vakansiyalar'],
            ['id' => 11, 'locale' => 'ru', 'list_type_id' => 4, 'title' => 'Вакансии'],
            ['id' => 12, 'locale' => 'en', 'list_type_id' => 4, 'title' => 'Vacancies'],
            ['id' => 13, 'locale' => 'oz', 'list_type_id' => 5, 'title' => 'Fayllar'],
            ['id' => 14, 'locale' => 'ru', 'list_type_id' => 5, 'title' => 'Файлы'],
            ['id' => 15, 'locale' => 'en', 'list_type_id' => 5, 'title' => 'Files'],
            ['id' => 16, 'locale' => 'oz', 'list_type_id' => 6, 'title' => 'Sahifalar'],
            ['id' => 17, 'locale' => 'ru', 'list_type_id' => 6, 'title' => 'Страницы'],
            ['id' => 18, 'locale' => 'en', 'list_type_id' => 6, 'title' => 'Pages'],
        ];

        DB::table('list_types')->insert($list_types);
        DB::table('list_type_translations')->insert($list_type_translations);

    }
}
