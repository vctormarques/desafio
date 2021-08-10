<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVendasIdToProdutoVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produto_vendas', function (Blueprint $table) {
            $table->integer('vendas_id')->unsigned();
            $table->foreign('vendas_id')
            ->references('id')
            ->on('vendas')
            ->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto_vendas', function (Blueprint $table) {
            $table->dropColumn('vendas_id');
        });
    }
}
