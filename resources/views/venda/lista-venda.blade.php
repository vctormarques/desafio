@if($vendasAbertas->count() != 0)
    <div class="card">
        <h5 class="card-header bg-secondary text-white">Vendas abertas</h5>
        <div class="card-body "> 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Abrir</th>
                        <th>Id</th>
                        <th>Data Inicial</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendasAbertas as $venda)
                        <tr>
                            <td>
                                <a href="nova-venda?vendas={{ $venda->id }}" class="btn btn-sm btn-default"> <i class="fa fa-folder-open"></i> </a>
                            </td>
                            <td>{{ $venda->id }}</td>
                            <td>{{ $venda->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else 
<div class="card">
    <div class="card-body">
        <h5> Não existe nenhuma venda aberta</h5>
    </div>
</div>
@endif
@if($vendasFechadas->count() != 0)
    <div class="card">
        <h5 class="card-header bg-secondary text-white">Vendas já finalizadas</h5>
        <div class="card-body "> 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Abrir</th>
                        <th>Id</th>
                        <th>Data Inicial</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendasFechadas as $venda)
                        <tr>
                            <td>
                                <a href="abrir-venda?vendas={{ $venda->id }}" class="btn btn-sm btn-default"> <i class="fa fa-folder-open"></i> </a>
                            </td>
                            <td>{{ $venda->id }}</td>
                            <td>{{ $venda->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif