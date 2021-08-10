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
                            <td>{{ $item->valor_total }}</td>
                            <td>{{ $item->valor_imposto }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else 
<div class="card">
    <div class="card-body">
        <h6> Venda sem item</h6>
    </div>
</div>
@endif