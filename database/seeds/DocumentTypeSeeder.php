<?php

use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            ['id' => 'BC', 'name' => 'Informe'],
            ['id' => 'CV', 'name' => 'Petición'],
            ['id' => 'HD', 'name' => 'Orden'],
            ['id' => 'KH', 'name' => 'Prueba'],
        ]);
    }
}
