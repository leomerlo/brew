<?php

use Illuminate\Database\Seeder;

class FieldRecords extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('field_record')->insert([
          'field_id' => 1,
          'record_id' => 1
      ]);

      DB::table('field_record')->insert([
          'field_id' => 2,
          'record_id' => 1
      ]);

      DB::table('field_record')->insert([
          'field_id' => 3,
          'record_id' => 1
      ]);

      DB::table('field_record')->insert([
          'field_id' => 4,
          'record_id' => 1
      ]);

      DB::table('field_record')->insert([
          'field_id' => 5,
          'record_id' => 1
      ]);

      DB::table('field_record')->insert([
          'field_id' => 6,
          'record_id' => 1
      ]);

      DB::table('field_record')->insert([
          'field_id' => 7,
          'record_id' => 1
      ]);

      DB::table('field_record')->insert([
          'field_id' => 8,
          'record_id' => 1
      ]);
    }
}
