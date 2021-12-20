<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->id();

            $table->double('cuota')->notNull();
            $table->string('nombre',45)->notNull();
            $table->string('apellido_paterno',45)->notNull();
            $table->string('apellido_materno',45)->notNull();
            $table->string('calle')->notNull();
            $table->string('num_int');
            $table->string('num_ext')->notNull();
            $table->string('ciudad')->notNull();
            $table->string('estado')->notNull();
            $table->string('cp',5)->notNull();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socios');
    }
}
