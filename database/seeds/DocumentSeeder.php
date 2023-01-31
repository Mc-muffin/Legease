<?php

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Document::class, 10)->create();
        factory(App\Entities\Attachment::class, 2)->create();
    }
}
