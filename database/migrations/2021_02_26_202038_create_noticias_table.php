<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria');
            $table->unsignedBigInteger('user_id');
            $table->date('fecha');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('imagen');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('categoria')->references('id')->on('categorias');
            $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticia');
    }
}
