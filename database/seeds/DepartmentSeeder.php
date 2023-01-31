<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['id' => 'BGDA', 'name' => 'Rama A', 'tel' => '0123456600'],
            ['id' => 'BGDB', 'name' => 'Rama B', 'tel' => '0123456600'],
            ['id' => 'BGDC', 'name' => 'Rama C', 'tel' => '0123456600'],
        ]);
    }
}