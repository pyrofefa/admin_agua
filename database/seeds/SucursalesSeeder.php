<?php

use Illuminate\Database\Seeder;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sucursales')->insert([
            'id' => '1',
			'nombre' => 'Módulo Central',
            'direccion' => 'Blvd. Luis Encinas y Ave. Universidad',
            'horario' => 'Lunes a Viernes de 8:00 am a 15.30 hrs.',
        ]);
        DB::table('sucursales')->insert([
            'id' => '2',
			'nombre' => 'Módulo Centro',
            'direccion' => 'Colosio y Guerrero',
            'horario' => 'Lunes a Viernes de 8:00 am a 15.30 hrs.',
        ]);
        DB::table('sucursales')->insert([
            'id' => '3',
			'nombre' => 'Módulo Sahuaro',
            'direccion' => 'Plaza Ley Sahuaro',
            'horario' => 'Lunes a Viernes de 8:00 am a 15.30 hrs.',
        ]);
        DB::table('sucursales')->insert([
            'id' => '4',
			'nombre' => 'Módulo Nor-Oriente',
            'direccion' => 'Blvd. López Portillo',
            'horario' => 'Lunes a Viernes de 8:00 am a 15.30 hrs.',
        ]);
        DB::table('sucursales')->insert([
            'id' => '5',
			'nombre' => 'Módulo Tanque Kino',
            'direccion' => '12 de Octubre y Ley',
            'horario' => 'Lunes a Viernes de 8:00 am a 15.30 hrs.',
        ]);
        DB::table('sucursales')->insert([
            'id' => '6',
			'nombre' => 'Módulo Xólotl',
            'direccion' => 'Blvd. Xólotl y Chichen Itzá',
            'horario' => 'Lunes a Viernes de 8:00 am a 15.30 hrs.',
        ]);
        DB::table('sucursales')->insert([
            'id' => '7',
			'nombre' => 'Módulo Progreso',
            'direccion' => 'Blvd. Progreso, interior Soriana',
            'horario' => 'Lunes a Viernes de 8:00 am a 15.30 hrs.',
        ]);
        DB::table('sucursales')->insert([
            'id' => '8',
			'nombre' => 'Módulo Pabellón Reforma',
            'direccion' => 'Av. de la Cultura y Calle Reforma',
            'horario' => 'Lunes a Viernes de 8:00 am a 15.30 hrs.',
        ]);
    }
}
