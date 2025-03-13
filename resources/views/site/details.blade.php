@extends('site/layout')

@section('title', 'Detalhes Produto') <!-- Título dinâmico da página -->

@section('conteudo')

    <div class='d-flex align-items-center my-5'>
        <div style="width: 35%" class="">
            <img src="{{ $produto->imagem ?? '...' }}" class="img-fluid" alt="...">
        </div>
        <div style='width: 65%' class="pt-5">
            <h2 class="">{{ $produto->nome ?? 'Título' }}</h2>
            <p class="">{{ $produto->descricao ?? 'Texto' }}</p>
            <div class=''>
                <small class="mx-3">Postado por: {{ $produto->user->nome ?? 'Usuário' }}</small>
                <small class="mx-3">categoria: {{ $produto->categoria->nome ?? 'Categoria' }}</small>
            </div>
            <form class='my-5 d-flex flex-column align-items-center' method="post" action="{{ route('site.addCarrinho') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $produto->id_produto }}">
                    <input type="hidden" name="nome" value="{{ $produto->nome }}">
                    <input type="hidden" name="preco" value="{{ $produto->preco }}">
                    <input type="number" name="quantidade" value="1" min="1" class="form-control mb-3 w-25">
                    <input type="hidden" name="imagem" value="{{ $produto->imagem }}">
                <button href="#" type="submit" class='btn btn-danger'>Comprar {{ Number::currency($produto->preco, in: 'BRL') }}</button> {{-- number_format($produto->preco, ",", ".") --}}
            </form>
        </div>
    </div>

    {{-- 
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">

            <div class="my-3 py-3">
                <h2 class="display-5">{{ $produto->nome ?? 'Título' }}</h2>
                <p class="lead">{{ $produto->descricao ?? 'Texto' }}</p>
            </div>

            <div class='my-3'>
                <button class='btn btn-danger'>Comprar</button>
            </div>

        <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 500px; height: 500px; border-radius: 21px 21px 0 0;">
            <img src="{{ $produto->imagem ?? '...' }}" class="img-fluid w-100 h-100" alt="...">
        </div>

        </div>
     --}}

@endsection