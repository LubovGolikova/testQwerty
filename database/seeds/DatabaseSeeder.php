<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert(['name' => 'Админ']);
        DB::table('groups')->insert(['name' => 'Саппорт']);
        DB::table('groups')->insert(['name' => 'Гость']);

        DB::table('users')->insert([
            'login' => 'test',
            'password' => bcrypt('test'),
            'group_id'=>'1'
        ]);


    }
}
