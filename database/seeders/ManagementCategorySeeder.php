<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ManagementCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $management_categories = [
            ['id' => 1, 'status' => 1, 'creator_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        $management_category_translations = [
            ['id' => 1, 'locale' => 'oz', 'title' => 'Komanda', 'management_category_id' => 1],
            ['id' => 2, 'locale' => 'ru', 'title' => 'Команда', 'management_category_id' => 1],
            ['id' => 3, 'locale' => 'en', 'title' => 'Team', 'management_category_id' => 1],
        ];

        DB::table('manage_cats')->insert($management_categories);
        DB::table('manage_cat_translations')->insert($management_category_translations);
    }
}
