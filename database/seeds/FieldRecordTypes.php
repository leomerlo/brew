<?php

use Illuminate\Database\Seeder;

class FieldRecordTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('field_record_type')->insert([
          'field_id' => 9,
          'record_type_id' => 1
      ]);

      DB::table('field_record_type')->insert([
          'field_id' => 10,
          'record_type_id' => 1
      ]);
    }
}
