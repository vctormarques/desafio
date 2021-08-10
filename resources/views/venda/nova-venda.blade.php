@extends('layout.site')

@section('conteudo')            
            
    @include('alertas.index')
    
    @include('venda.formulario')
    
    @include('venda.lista-item-venda')
            

@endsection
 
