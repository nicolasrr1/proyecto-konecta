<?php

use Illuminate\Database\Seeder;
use App\Model\User;
class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password' => Hash::make('admin'),
                'rol_id'=> 1
            ]
        );


    }
}
