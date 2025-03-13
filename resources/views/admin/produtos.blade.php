@extends('admin/dashboard')

@section('title', 'Dashboard') <!-- Título dinâmico da página -->

@section('conteudo')

    <!-- Ativa o modal de criaçao -->
    <div class='container text-start mb-3'>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
            Cadastrar
        </button>
    </div>

    <table class="table text-start table-striped">
        <thead>
        <tr>
            <th style="width: 7%;" scope="col"></th>
            <th style="width: 5%;" scope="col">ID</th>
            <th style="width: 48%;" scope="col">Produto</th>
            <th style="width: 10%;" scope="col">Preço</th>
            <th style="width: 20%;" scope="col">Categoria</th>
            <th style="width: 5%;" scope="col"><i class="bi bi-pencil fs-5"></i></th>
            <th style="width: 5%;" scope="col"><i class="bi bi-trash fs-5"></i></th>
        </tr>
        </thead>
        <tbody>
        
            @foreach ($produtos as $produto)
                <tr scope="row">
                    <td style="vertical-align: middle"> <img style="height: 50px;" src="{{ url("storage/{$produto->imagem}") }}" alt="..." class="img-fluid"> </td>
                    <td style="vertical-align: middle"> {{ $produto->id_produto }} </td>
                    <td style="vertical-align: middle"> {{ $produto->nome }} </td>
                    <td style="vertical-align: middle"> {{ Number::currency($produto->preco, in: 'brl') }} </td>
                    <td style="vertical-align: middle"> {{ $produto->categoria->nome }} </td>
                    <td style="vertical-align: middle"> 

                        <!-- Ativa o modal de ediçao -->
                        <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#update{{ $produto->id_produto }}">
                            <i class="bi bi-pencil-fill text-warning"></i>
                        </button>

                        <!-- Modal Edicao -->
                        @include('admin.modals.update', ['id' => $produto->id_produto])

                    </td>

                    <td style="vertical-align: middle"> 

                        <!-- Ativa o modal de exclusao -->
                        <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#delete{{ $produto->id_produto }}">
                            <i class="bi bi-trash-fill text-danger"></i>
                        </button> 

                        <!-- Modal Exclusao -->
                        @include('admin.modals.delete', ['id' => $produto->id_produto])

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class='w-100 d-flex justify-content-center p-3'>
        <div>
            {{ $produtos->links() }}
        </div>
    </div>

  
    <!-- Modal Criacao -->
    @include('admin.modals.create')


@endsection