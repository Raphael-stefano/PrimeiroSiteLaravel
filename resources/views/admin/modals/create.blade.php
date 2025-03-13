<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Novo Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="" action="{{ route('admin.produto.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class='modal-body d-flex flex-wrap justify-content-around'>
                    <div style="width: 45%" class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>

                    <div style="width: 45%" class="mb-3">
                        <label class="form-label" for="preco">Preço</label>
                        <input type="number" class="form-control" id="preco" name="preco">
                    </div>

                    <div style="width: 95%" class="mb-3">
                        <label for="descricao" class="form-label">Descriçao</label>
                        <input type="text" class="form-control" id="descricao" name="descricao">
                    </div>

                    <select name="id_categoria" style="width: 95%" class="form-select mb-3" aria-label="Default select example">
                        <option selected disabled>Categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id_categoria }}"> {{ $categoria->nome }} </option>
                        @endforeach
                    </select>

                    <div style="width: 95%" class="mb-3">
                        <label for="imagem" class="form-label">Imagem de ícone</label>
                        <input type="file" class="form-control" id="imagem" name="imagem">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>

        </div>
    </div>
</div>