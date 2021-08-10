<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome', 'imposto'];

    public function categoria(){
        return $this->hasMany('App\Categoria');
    }
}
