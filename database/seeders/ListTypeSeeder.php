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
        ];

        $list_type_translations = [
            ['id' => 1, 'locale' => 'oz', 'list_type_id' => 1, 'title' => 'Yangiliklar'],
            ['id' => 2, 'locale' => 'ru', 'list_type_id' => 1, 'title' => 'Янгиликлар'],
            ['id' => 3, 'locale' => 'en', 'list_type_id' => 1, 'title' => 'News'],
            ['id' => 4, 'locale' => 'oz', 'list_type_id' => 2, 'title' => 'Foydali'],
            ['id' => 5, 'locale' => 'ru', 'list_type_id' => 2, 'title' => 'Полезные'],
            ['id' => 6, 'locale' => 'en', 'list_type_id' => 2, 'title' => 'Usefuls'],
        ];

        DB::table('list_types')->insert($list_types);
        DB::table('list_type_translations')->insert($list_type_translations);

    }
}
