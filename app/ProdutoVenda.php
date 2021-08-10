<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoVenda extends Model
{
    protected $fillable = ['produto_id', 'quantidade', 'valor_total', 'valor_imposto', 'vendas_id'];

    function venda() {
        return $this->belongsTo('App\Venda');
    }
}
