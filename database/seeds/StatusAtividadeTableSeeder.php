<?php

use Illuminate\Database\Seeder;

class StatusAtividadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\DuoSytem\Model\StatusAtividade::class, 4)->create();

    }
}
