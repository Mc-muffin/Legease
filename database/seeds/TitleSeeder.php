<?php

use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->insert([
            ['id' => 'GND',  'name' => 'Admin'],
            ['id' => 'GBD',  'name' => 'Especialista'],
            ['id' => 'GAD',  'name' => 'Fiscal'],
            ['id' => 'GCD',  'name' => 'Abogado'],
        ]);
    }
}
