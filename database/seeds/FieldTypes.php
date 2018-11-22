<?php

use Illuminate\Database\Seeder;

class FieldTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('field_types')->insert([
          'type' => 'select',
          'name' => 'Select'
      ]);

      DB::table('field_types')->insert([
          'type' => 'text',
          'name' => 'Text'
      ]);

      DB::table('field_types')->insert([
          'type' => 'textarea',
          'name' => 'Textarea'
      ]);

      DB::table('field_types')->insert([
          'type' => 'radio',
          'name' => 'Radio'
      ]);

      DB::table('field_types')->insert([
          'type' => 'checkbox',
          'name' => 'Checkbox'
      ]);

      DB::table('field_types')->insert([
          'type' => 'file',
          'name' => 'File'
      ]);

      DB::table('field_types')->insert([
          'type' => 'wysiwyg',
          'name' => 'Wysiwyg'
      ]);
    }
}
