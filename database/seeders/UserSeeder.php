<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $c = new User();
        $c->name="Francisco";
        $c->apellido="Roldan";
        $c->email="fran@fran.com";
        $c->pais="España";
        $c->role_id=1;
        $c->password="1234";
        $c->save();
    }
}
