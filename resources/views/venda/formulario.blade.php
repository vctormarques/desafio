<div class="card">
    <h5 class="card-header">Inserir Item</h5>
    <div class="card-body">
        <form class="row g-3" method="post" action="nova-venda/item">
            <input type="hidden" name="idVenda" id="idVenda" value="{{ app('request')->input('vendas') }}">
            @csrf
            <div class="col-md-4">
                <select name="produto" id="produto" class="form-control">
                    <option value="">Selecione o produto...</option>
                    @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success mb-3">Adicionar</button>
            </div>
        </form>
    </div>
</div>



