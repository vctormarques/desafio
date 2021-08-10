<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['status'];

    public function produto_venda(){
        return $this->hasMany('App\ProdutoVenda');
    }
}
