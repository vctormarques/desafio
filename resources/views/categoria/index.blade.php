@extends('layout.site')

@section('conteudo')  

            @include('alertas.index')   
            
            @include('categoria.formulario')   
            
            @include('categoria.lista')   

@endsection