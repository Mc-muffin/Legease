<?php

use Illuminate\Database\Seeder;

class SignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('signers')->insert([
            ['name' => 'En curso', 'description' => 'No Aplica'],
            ['name' => 'Alvaro Tirado', 'description' => 'Juez Primero del Circuito'],
        ]);
    }
}
