<?php

use Illuminate\Database\Seeder;

class Records extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('records')->insert([
          'title' => 'Homepage',
          'slug' => 'homepage',
          'user' => 1,
          'record_type' => 2,
          'show_on_menu' => 1
      ]);	

      DB::table('records')->insert([
          'title' => 'Primer Post',
          'slug' => 'primer-post',
          'user' => 1,
          'record_type' => 1
      ]);
    }
}
