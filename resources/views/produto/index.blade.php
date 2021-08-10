@extends('layout.site')

@section('conteudo')  

            @include('alertas.index')   
            
            @include('produto.formulario')   
            
            @include('produto.lista')

@endsection
 