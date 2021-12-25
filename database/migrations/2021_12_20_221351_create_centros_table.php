<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->id();

            $table->string('nombre',45)->notNull();
            $table->string('calle',45)->notNull();
            $table->string('numExt',20)->notNull();
            $table->string('numInt',20);
            $table->string('col',45)->notNull();
            $table->string('estado')->notNull();
            $table->string('ciudad')->notNull();
            $table->string('cp')->notNull();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centros');
    }
}
