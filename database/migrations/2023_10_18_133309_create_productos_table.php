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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('cod_productos')->unique();
            $table->bigInteger('idcategoria')->unsigned();
            $table->foreign('idcategoria')->references('id')->on('categorias');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('stock');
            $table->decimal('precio_compra');
            $table->decimal('precio_venta');
            
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
