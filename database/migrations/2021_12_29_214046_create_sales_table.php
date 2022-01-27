<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            
            //usuario
            $table->string('nombreusuario');
            //clientes
            $table->string('nombrecliente');
            //productos
            $table->string('nombreproducto')->unique();
            $table->string('cantidad');
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
        Schema::dropIfExists('sales');
    }
}
