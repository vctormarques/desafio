
@if($produtos->count() != 0)
    <div class="card">
        <h5 class="card-header bg-secondary text-white">Produtos</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Categoria</th>
                    <th>Imposto</th>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>R$ {{ $produto->valor }}</td>
                            <td>{{ $produto->nomeCategoria }}</td>
                            <td>{{ $produto->imposto }} %</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endif