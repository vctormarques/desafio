<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produto;
use App\Categoria;

class ProdutosController extends Controller
{

    public function index(){
        $categorias = Categoria::all();  
        
        $lista =  DB::table('produtos')
        ->join('categorias', 'categorias.id', '=', 'produtos.categoria_id')
        ->select('produtos.*', 'categorias.nome AS nomeCategoria', 'categorias.imposto AS imposto')
        ->get();
        return view('produto.index', ['produtos' => $lista, 'categoria' => $categorias]);
    }

    public function store(Request $request){
        
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'valor' => 'required|between:0,99.99',
            'categoria' => 'required|integer',
        ], [
            'required' => 'O campo :attribute é obrigatório',
            'integer' => 'O campo :attribute tem que ser um número',
        ]);

        Produto::create([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'categoria_id' => $request->categoria
        ]);
        
        
        return redirect()
           ->action('ProdutosController@index');
    }

}
