@extends('site/layout')

@section('title', 'Carrinho') <!-- Título dinâmico da página -->

@section('conteudo')

    @if ($mensagem = Session::get('sucesso'))
        
        @component('components.alerta', [
            'cor' => 'success',
            'icone' => 'bi-check-circle-fill',
            'mensagem' => $mensagem,
        ])
        @endcomponent

    @endif

    @if ($mensagem = Session::get('aviso'))

        @component('components.alerta', [
            'cor' => 'warning',
            'icone' => 'bi-exclamation-triangle-fill',
            'mensagem' => $mensagem,
        ])
        @endcomponent

    @endif

      @if ($items->count() == 0) 
      
        <div class="alert alert-warning alert-dismissible fade show mx-5" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <strong>Seu carrinho está vazio!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      @else

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">Imagem</th>
                    <th scope="col" style="width: 30%;">Nome</th>
                    <th scope="col" style="width: 10%;">Preço</th>
                    <th scope="col" style="width: 10%;">Quantidade</th>
                    <th scope="col" style="width: 20%;">Total</th>
                    <th scope="col" style="width: 10%;">Atualizar</th>
                    <th scope="col" style="width: 10%;">Excluir</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                    <tr class=''>
                        <th scope="row"> <img class="img-fluid" src="{{ $item->options->image }}" alt="img"> </th>
                        <td style="vertical-align: middle;">{{ $item->name }}</td>
                        <td style="vertical-align: middle;">{{ Number::currency($item->price, in: 'BRL') }}</td>

                        {{-- Atualizar --}}
                        <form action="{{ route('site.atualizarCarrinho') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <td style="vertical-align: middle;"> <input class="form-control text-center" name="qty" type="number" value={{ $item->qty }} min="1"></td>
                            <td style="vertical-align: middle;">{{ Number::currency($item->price * $item->qty, in: 'brl') }}</td>
                            <td style="vertical-align: middle;"> 

                                    <input type='hidden' name='rowId' value='{{ $item->rowId }}'/>
                                    <button class="btn text-light fs-1"> <i class="bi bi-arrow-clockwise"></i> </button>

                            </td>
                        </form>

                        {{-- Deletar --}}
                        <td style="vertical-align: middle;"> 
                            <form action="{{ route('site.removerCarrinho') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type='hidden' name='rowId' value='{{ $item->rowId }}'/>
                                <button class="btn text-light fs-1"> <i class="bi bi-x"></i> </button> 
                            </form>
                        </td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>

        <h5 class="m-4">Valor total: {{ Number::currency(\Cart::total(), in: 'BRL') }}</h5>

        <div class="container my-4">
            <a href="{{ route('site.index') }}" class="btn btn-outline-light fs-4"> <i class="bi bi-arrow-left-circle"></i> Continuar comprando </a>
            <a href="{{ route('site.limparCarrinho') }}" class="btn btn-outline-light fs-4 mx-3"> <i class="bi bi-x-circle"></i> Limpar carrinho </a>
            <a href="#" class="btn btn-outline-light fs-4"> <i class="bi bi-arrow-right-circle"></i> Finalizar pedido </a>
        </div>

      @endif


@endsection