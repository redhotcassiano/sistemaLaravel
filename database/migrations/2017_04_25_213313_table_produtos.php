<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('Produtos', function (Blueprint $table) {
             $table->increments('id');
             $table->string('nome')->uniqid();
             $table->string('descricao');
             $table->string('status');
             $table->decimal('preco');             
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
          Schema::dropIfExists('Produtos');
     }
}
