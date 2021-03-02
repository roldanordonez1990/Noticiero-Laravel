<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Categoria();
        $c->nombre="Deportes";
        $c->save();

        $c = new Categoria();
        $c->nombre="Actualidad";
        $c->save();

        $c = new Categoria();
        $c->nombre="Ciencia";
        $c->save();
    }
}
