<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->string('cod_detalle_compra')->unique();
            $table->bigInteger('idcompra')->unsigned();
            $table->foreign('idcompra')->references('id')->on('compras');
            $table->bigInteger('idproductos')->unsigned();
            $table->foreign('idproductos')->references('id')->on('productos');
            $table->integer('cantidad');
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
