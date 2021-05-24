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
        ];

        DB::table('list_categories')->insert($list_categories);
        DB::table('list_category_translations')->insert($list_category_translations);
    }
}
