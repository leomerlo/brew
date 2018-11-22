<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Leo',
          'email' => 'leo@test.com',
          'password' => Hash::make('123456'),
          'auth_level' => 0
      ]);  

      DB::table('users')->insert([
          'name' => 'Flor',
          'email' => 'flor@flor.com',
          'password' => Hash::make('123456'),
          'auth_level' => 1
      ]);  
    }
}
