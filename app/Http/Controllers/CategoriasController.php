<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriasController extends Controller
{


    public function index(){
        $lista = Categoria::all();        
        return view('categoria.index', ['categoria' => $lista]);
    }

    public function store(Request $request){
        
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'imposto' => 'required|between:0,99.99',
        ], [
            'required' => 'O campo :attribute é obrigatório',
            'integer' => 'O campo :attribute tem que ser um número',
        ]);

        Categoria::create([
            'nome' => $request->nome,
            'imposto' => $request->imposto,
        ]);
        
        
        return redirect()
           ->action('CategoriasController@index');
    }

}
