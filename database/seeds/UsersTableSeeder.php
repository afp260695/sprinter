<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Developer 1',
            'username' => 'dev1',
            'password' => bcrypt('dev1'),
            'role' => 'dev'
        ]);

        DB::table('users')->insert([
            'name' => 'Developer 2',
            'username' => 'dev2',
            'password' => bcrypt('dev2'),
            'role' => 'dev'
        ]);

        DB::table('users')->insert([
            'name' => 'Scrum Master 1',
            'username' => 'sm1',
            'password' => bcrypt('sm1'),
            'role' => 'sm'
        ]);


        DB::table('users')->insert([
            'name' => 'Scrum Master 2',
            'username' => 'sm2',
            'password' => bcrypt('sm2'),
            'role' => 'sm'
        ]);


        DB::table('users')->insert([
            'name' => 'Product Owner',
            'username' => 'po',
            'password' => bcrypt('po'),
            'role' => 'po'
        ]);
    }
}
