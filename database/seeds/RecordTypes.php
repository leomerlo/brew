<?php

use Illuminate\Database\Seeder;

class RecordTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('record_types')->insert([
          'type' => 'Post',
          'slug' => 'post'
      ]);

      DB::table('record_types')->insert([
          'type' => 'Page',
          'slug' => 'page'
      ]);
    }
}
