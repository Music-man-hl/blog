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
      DB::table('users')->insert([
          'name' => 'yo调调',
          'email' => '756623526@qq.com',
          'password' => bcrypt('123456'),
      ]);
    }
}
