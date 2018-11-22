<?php

use Illuminate\Database\Seeder;

class Fields extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('fields')->insert([
          'name' => 'bg-image',
          'type' => 6, 
          'label' => 'Imagen de fondo'
      ]);

			DB::table('fields')->insert([
          'name' => 'homepage-title',
          'type' => 2, 
          'label' => 'Titulo'
      ]);

      DB::table('fields')->insert([
          'name' => 'subtitulo',
          'type' => 2, 
          'label' => 'Subtitulo'
      ]);

      DB::table('fields')->insert([
          'name' => 'stories-titulo',
          'type' => 2, 
          'label' => 'Stories - Titulo'
      ]);

      DB::table('fields')->insert([
          'name' => 'stories-texto',
          'type' => 3, 
          'label' => 'Stories Texto'
      ]);

      DB::table('fields')->insert([
          'name' => 'stories-imagen',
          'type' => 6, 
          'label' => 'Stories Imagen'
      ]);

      DB::table('fields')->insert([
          'name' => 'stories-link-texto',
          'type' => 2, 
          'label' => 'Stories - Link texto'
      ]);

      DB::table('fields')->insert([
          'name' => 'stories-link-href',
          'type' => 2, 
          'label' => 'Stories - Link href'
      ]);

      DB::table('fields')->insert([
          'name' => 'image',
          'type' => 6, 
          'label' => 'Imagen'
      ]);

      DB::table('fields')->insert([
          'name' => 'cuerpo',
          'type' => 3, 
          'label' => 'Cuerpo'
      ]);
    }
}
