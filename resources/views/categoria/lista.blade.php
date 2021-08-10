
@if($categoria->count() != 0)
<div class="card">
    <h5 class="card-header bg-secondary text-white">Categorias</h5>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>Nome</th>
                <th>Imposto</th>
            </thead>
            <tbody>
                @foreach ($categoria as $cat)
                    <tr>
                        <td>{{ $cat->nome }}</td>
                        <td>{{ $cat->imposto }} %</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endif