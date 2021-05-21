<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        DB::table('menu_categories')->insert([
            'en' => [
                'title' => 'Top menu'
            ],
            'oz' => [
                'title' => 'Top menu'
            ],
            'uz' => [
                'title' => 'Топ меню'
            ],
            'ru' => [
                'title' => 'Верхний меню'
            ],
            'status' => 1,
        ]);

        DB::table('menu_categories')->insert([
            'en' => [
                'title' => 'Header'
            ],
            'oz' => [
                'title' => 'Header'
            ],
            'uz' => [
                'title' => 'Header'
            ],
            'ru' => [
                'title' => 'Нижний меню'
            ],
            'status' => 1,
        ]);
    }
}
