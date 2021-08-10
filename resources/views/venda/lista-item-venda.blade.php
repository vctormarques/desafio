@if($lista_item->count() != 0)
    <div class="card">
        <h5 class="card-header bg-secondary text-white">Venda nº {{ app('request')->input('vendas') }}</h5>
        <div class="card-body "> 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor Total</th>
                        <th>Valor com Impostos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista_item as $item)
                        <tr>
                            <td>{{ $item->nomeProduto }}</td>
                            <td>{{ $item->quantidade }}</td>
                            <td>R$ <span class="valor-total">{{ $item->valor_total }}</span> </td>
                            <td>R$ <span class="valor-imposto">{{ $item->valor_imposto }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
   
                <thead>
                    <tr>    
                        <th></th>
                        <th></th>
                        <th>R$ <span class="resultado-total"> </span></th>
                        <th>R$ <span class="resultado-total-imposto"> </span> </th>
                    </tr>
                </thead>
            </table>
            <div>
                <form action="nova-venda/concluir" method="post">
                @csrf
                    <input type="hidden" name="idVenda" id="idVenda" value="{{ app('request')->input('vendas') }}">
                    <button class="btn btn-warning">Concluir Venda</button>
                </form>
            </div>
        </div>
    </div>
@else 
<div class="card">
    <div class="card-body">
        <h6> Venda sem item</h6>
    </div>
</div>
@endif