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
            'tipo' => 'tikets',
        ]);
    }
}
