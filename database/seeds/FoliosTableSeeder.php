<?php

use Illuminate\Database\Seeder;

class FoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'pagos',
            'id_sucursal' => '1',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'aclaraciones',
            'id_sucursal' => '1',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'pagos',
            'id_sucursal' => '2',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'aclaraciones',
            'id_sucursal' => '2',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'pagos',
            'id_sucursal' => '3',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'aclaraciones',
            'id_sucursal' => '3',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'pagos',
            'id_sucursal' => '4',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'aclaraciones',
            'id_sucursal' => '4',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'pagos',
            'id_sucursal' => '5',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'aclaraciones',
            'id_sucursal' => '5',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'pagos',
            'id_sucursal' => '6',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'aclaraciones',
            'id_sucursal' => '6',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'pagos',
            'id_sucursal' => '7',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'aclaraciones',
            'id_sucursal' => '7',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'pagos',
            'id_sucursal' => '8',
        ]);
        DB::table('folios')->insert([
            'numero' => '1',
            'tipo' => 'aclaraciones',
            'id_sucursal' => '8',
        ]);
    }
}
