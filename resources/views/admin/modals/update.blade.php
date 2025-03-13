<div class="modal fade" id="update{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Produto "{{ $produto->nome }}"</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="" action="{{ route('admin.produto.update', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='modal-body d-flex flex-wrap justify-content-around'>
                    <div style="width: 45%" class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}">
                    </div>

                    <div style="width: 45%" class="mb-3">
                        <label class="form-label" for="preco">Preço</label>
                        <input type="number" class="form-control" id="preco" name="preco" value="{{ $produto->preco }}">
                    </div>

                    <div style="width: 95%" class="mb-3">
                        <label for="descricao" class="form-label">Descriçao</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $produto->descricao }}">
                    </div>

                    <select style="width: 95%" class="form-select mb-3" aria-label="Default select example">
                        @foreach ($categorias as $categoria)
                            <option 
                                value="{{ $categoria->id_categoria }}"
                                {{ $categoria->id_categoria == $produto->id_categoria ? 'selected' : '' }}>
                                 {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>

                    <div class="mb-3" style="width: 95%">
                        <label for="imagem" class="form-label">Imagem</label>
                        <input type="file" class="form-control" id="imagem" name="imagem" value="{{ url("storage/{$produto->imagem}") }}">
                        @if ($produto->imagem)
                            <p>Imagem atual: <img src="{{ url("storage/{$produto->imagem}") }}" alt="Imagem do produto" style="max-width: 100px;"></p>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Salvar alteraçoes</button>
                </div>
            </form>

        </div>
    </div>
</div>