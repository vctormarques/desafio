<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Venda;
use App\ProdutoVenda;
use Illuminate\Support\Facades\DB;

class VendasController extends Controller
{
    public function index(){
        $vendasAbertas = Venda::all()->where('status', 'A');  
        $vendasFechadas = Venda::all()->where('status', 'F');  
        return view('venda.vendas', ['vendasAbertas' => $vendasAbertas, 'vendasFechadas' => $vendasFechadas]);
    }


    public function create(){
        $venda = Venda::create();
        $produtos = Produto::all(); 
        return redirect()->route('nova-venda', [ 'vendas' => $venda]); 
    }
    
    public function abrirVenda(Request $request){
        $lista = DB::table('produto_vendas')
        ->join('produtos', 'produtos.id', '=', 'produto_vendas.produto_id')
        ->select('produtos.nome AS nomeProduto', 'produto_vendas.*')
        ->where('produto_vendas.vendas_id', '=', $request->vendas)
        ->get();
        return view('venda.abrir-venda', ['lista_item' => $lista]);
    }
    
    public function novaVenda(Request $request){
        $produtos = Produto::all(); 
        $lista = DB::table('produto_vendas')
        ->join('produtos', 'produtos.id', '=', 'produto_vendas.produto_id')
        ->select('produtos.nome AS nomeProduto', 'produto_vendas.*')
        ->where('produto_vendas.vendas_id', '=', $request->vendas)
        ->get();
        return view('venda.nova-venda', ['produtos' => $produtos, 'lista_item' => $lista]);
    }


    public function store(Request $request){
        
        $validated = $request->validate([
            'produto' => 'integer',
            'quantidade' => 'integer',
        ], [
            'required' => 'O campo :attribute é obrigatório',
            'integer' => 'O campo :attribute tem que ser um número',
        ]);

            $sql =  DB::table('produtos')
            ->join('categorias', 'categorias.id', '=', 'produtos.categoria_id')
            ->select('produtos.*', 'categorias.nome AS nomeCategoria', 'categorias.imposto AS imposto')
            ->where('produtos.id', '=',  $request->produto)
            ->first();
            $valorTotal = $request->quantidade * $sql->valor;
            $valorImposto = $valorTotal + ($valorTotal * ($sql->imposto / 100 ));

            ProdutoVenda::create([
                'produto_id' => $request->produto,
                'quantidade' => $request->quantidade,
                'valor_total' => $valorTotal,
                'valor_imposto' => $valorImposto,
                'vendas_id' => $request->idVenda,
            ]);

            $lista = DB::table('produto_vendas')
            ->join('produtos', 'produtos.id', '=', 'produto_vendas.produto_id')
            ->select('produtos.nome AS nomeProduto', 'produto_vendas.*')
            ->where('produto_vendas.vendas_id', '=', $request->idVenda)
            ->get();
            
            return redirect()
                ->action('VendasController@novaVenda', ['vendas' => $request->idVenda, 'lista_item' => $lista]); 
    }

    public function update(Request $request){
        $venda = Venda::findOrFail($request->idVenda);

        $venda->update([
            'status' => 'F'
        ]);

        return redirect()
        ->action('VendasController@index');
    }

}
