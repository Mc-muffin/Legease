<?php

use Illuminate\Database\Seeder;

class OrganizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizes')->insert([
            ['id' => 'NN',    'name' => 'No Aplica'],
            ['id' => 'TCHQ',  'name' => 'Juzgado Primero'],
            ['id' => 'BTC',   'name' => 'Juzgado superior'],
        ]);
    }
}
