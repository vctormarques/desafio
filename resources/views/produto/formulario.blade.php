
<div class="card">
    <h5 class="card-header">Cadastrar Produtos</h5>
    <div class="card-body">
        <form class="row g-3" method="post" action="">
            @csrf
            <div class="col-auto">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
            </div>
            <div class="col-auto">
                <select name="categoria" id="categoria" class="form-control">
                    <option value="">Selecione...</option>
                    @foreach ($categoria as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success mb-3">Cadastrar</button>
            </div>
        </form>
    </div>
</div>