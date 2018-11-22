<?php

use Illuminate\Database\Seeder;

class FieldValues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('field_values')->insert([
          'value' => '4pcHKQyIBBbmtxy70KNwTuDbGb1Id7kCbv03n5YK.jpeg',
          'field' => '1',
          'record' => '1'
      ]);

      DB::table('field_values')->insert([
          'value' => 'Buenos Aires',
          'field' => '2',
          'record' => '1'
      ]);

      DB::table('field_values')->insert([
          'value' => 'Una ciudad multicultural',
          'field' => '3',
          'record' => '1'
      ]);

      DB::table('field_values')->insert([
          'value' => 'Festival de las colectividades',
          'field' => '4',
          'record' => '1'
      ]);

      DB::table('field_values')->insert([
          'value' => 'El acto central será a las 15 h, con el desfile encabezado por medallistas de los Juegos Olímpicos de la juventud, seguido por más de 400 personas representante de las colectividades con sus trajes típicos y estandarte que partirán desde la estación saludable del parque hasta el pie del escenario donde las delegaciones se formarán y serán recibidas por grupos de percusión japoneses, brasileros y escoceses.  La orquesta infantojuvenil de la Ciudad interpretará canciones populares argentinas luego de entonar las estrofas del Himno Nacional Argentino a cargo del tenor Pol Gonzales del polifónico Nacional.',
          'field' => '5',
          'record' => '1'
      ]);

      DB::table('field_values')->insert([
          'value' => 'd2NNjagCaJgk3FgVEfym9vN9HUI2D7aSHzhb3Eqe.png',
          'field' => '6',
          'record' => '1'
      ]);

      DB::table('field_values')->insert([
          'value' => 'Lee la nota completa',
          'field' => '7',
          'record' => '1'
      ]);

      DB::table('field_values')->insert([
          'value' => '#',
          'field' => '8',
          'record' => '1'
      ]);
    }
}
