@extends('layout.site')

@section('conteudo')            
    <div class="my-2">
        <form action="{{ route('cadastrar-venda') }}" method="post">
            @csrf
            <button type="submit" name="button" class="btn btn-success">Registrar nova venda </button>
        </form> 
    </div>

    @include('venda.lista-venda')

@endsection
 
