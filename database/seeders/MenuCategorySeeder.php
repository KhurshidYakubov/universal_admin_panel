<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu_categories = [
            ['id' => 1, 'status' => 1,],
            ['id' => 2, 'status' => 1,],
        ];

        $menu_category_translations = [
            ['id' => 1, 'locale' => 'oz', 'title' => 'Топ меню', 'menu_category_id' => 1],
            ['id' => 2, 'locale' => 'ru', 'title' => 'Топ меню', 'menu_category_id' => 1],
            ['id' => 3, 'locale' => 'en', 'title' => 'Top menu', 'menu_category_id' => 1],
            ['id' => 4, 'locale' => 'oz', 'title' => 'Header', 'menu_category_id' => 2],
            ['id' => 5, 'locale' => 'ru', 'title' => 'Header', 'menu_category_id' => 2],
            ['id' => 6, 'locale' => 'en', 'title' => 'Header', 'menu_category_id' => 2],
        ];
        DB::table('menu_categories')->insert($menu_categories);

        DB::table('menu_category_translations')->insert($menu_category_translations);

    }
}
