<div class="card">
    <h5 class="card-header">Cadastrar Categorias</h5>
    <div class="card-body">
        <form class="row g-3" method="post" action="">
            @csrf
            <div class="col-auto">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" id="imposto" name="imposto" placeholder="Imposto">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success mb-3">Cadastrar</button>
            </div>
        </form>
    </div>
</div>