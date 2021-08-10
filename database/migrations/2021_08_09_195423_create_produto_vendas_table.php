<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_vendas', function (Blueprint $table) {
            $table->id();            
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onDelete('cascade');  
            $table->string("quantidade");
            $table->decimal('valor_total', 8, 2);
            $table->decimal('valor_imposto', 8, 2);
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
        Schema::dropIfExists('produto_vendas');
    }
}
