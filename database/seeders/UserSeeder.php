<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'username' => 'khurshidyakubov', 'first_name' => 'XURSHID', 'last_name' => 'YAKUBOV', 'email' => 'xurshid.yakubov.98@gmail.com', 'role' => 'superadmin', 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('users')->insert($users);
    }
}
