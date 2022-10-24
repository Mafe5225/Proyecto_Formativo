<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->double('ventas'); 
            $table->date('fecha');
            $table->foreignId('clientes_id')->constrained('clientes');
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
        Schema::create('ventas', function (Blueprint $table) {
            $table->dropForeign('ventas_proyecto_id_foreign');
        });
        Schema::dropIfExists('ventas');
    }
}
