<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGananciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganancias', function (Blueprint $table) {
            $table->id();
            $table->double('ganaciaTotal');
            $table->foreignId('ventas_id')->constrained('ventas');
            $table->foreignId('egresos_id')->constrained('egresos');
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
        Schema::table('ganancias', function (Blueprint $table) {
            $table->dropForeign('ganancias_ventas_id_foreign');
        });
        Schema::table('ganancias', function (Blueprint $table) {
            $table->dropForeign('ganancias_egresos_id_foreign');
        });
        Schema::dropIfExists('ganancias');
    }
}
