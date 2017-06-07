<?php

use Illuminate\Database\Seeder;

class AtividadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\DuoSytem\Model\Atividade::class, 20)->create();
    }
}
