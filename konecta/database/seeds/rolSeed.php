<?php

use Illuminate\Database\Seeder;
use App\Model\rol;

class rolSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rol::create(
            [
                'nombre'=>'administrador'
            ]
        );

        rol::create(
            [
                'nombre'=>'vendedor'
            ]
        );

    }
}
