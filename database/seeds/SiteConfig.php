<?php

use Illuminate\Database\Seeder;

class siteConfig extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('config')->insert([
          'name' => 'homepage',
          'label' => 'Pantalla principal',
          'value' => "1"
      ]);

      DB::table('config')->insert([
          'name' => 'mostrar_login_out_web',
          'label' => 'Mostrar login/out en web',
          'value' => "1"
      ]);
    }
}
