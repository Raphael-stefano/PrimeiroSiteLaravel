@extends('site/layout')

@section('title', 'Home') <!-- Título dinâmico da página -->

@section('conteudo')

    <h1>Bem-vindo à Home!</h1>

    <div class='d-flex flex-wrap w-100 justify-content-around align-items-center mt-5'>
        
        @foreach ($produtos as $produto)
            <div style="width: 33%" class='d-flex justify-content-center align-items-center my-3'>
                @component('components.productCard', [
                    'titulo' => $produto->nome,
                    'texto' => $produto->descricao,
                    'imagem' => $produto->imagem,
                    'link' => route('site.details', $produto->slug), //"produto/{$produto->slug}",
                    'preco' => $produto->preco,
                    'index' => $loop->index,
                    'validation' => 'verProduto',
                    'model' => $produto,
                ])
                @endcomponent
            </div>
        @endforeach

    </div>

    <div class='w-100 d-flex justify-content-center p-3'>
        <div>
            {{ $produtos->links() }}
        </div>
    </div>

        {{-- @component('components.productCard', [
            'titulo' => 'Produto 1',
            'texto' => 'Descrição do Produto 1',
        ])
        @endcomponent --}}
        
        {{-- Apenas para registrar outra forma válida de passar o componente --}}
        {{-- <x-productCard
            titulo="Produto 2"
            texto="Descrição do Produto 2"
        /> --}

    </div>

    {{-- Exemplo de comentário no Blade --}}

    {{-- @include('includes/mensagem', [
        'classe' => 'primary',
        'mensagem' => 'Bem-vindo à página inicial do site de aprendizado do Laravel'
    ])

    <h1>Testando Home</h1>
    <p>Projeto de {{ $nome }}</p> 

    @isset($idade)
        <p>{{ $idade >= 18 ? 'Maior' : 'Menor' }} de idade</p>
    @endisset --}}

    {{-- @empty($idade)
    <p>{{ $idade >= 18 ? 'Maior' : 'Menor' }} de idade</p>
    @endempty --}} {{-- O contrário de @empty --}}

    {{-- {!! $html !!}
    {{ $teste ?? 'Caso essa variável, nao exista, este será seu valor padrao' }} --}}

    {{-- @unless ($nivel < 3)  Unless é o inverso do @if --}}
    {{--    <br>
        <br>
        <a href='#' class='btn btn-outline-light'>Acessar Dashboard</a>
        <br>
    @endunless

    @auth
        <p>Há um usuário autenticado</p>
    @endauth

    @guest
        <p>Nao há nenhum usuário autenticado</p>
    @endguest

    <div class='d-flex align-items-center justify-content-around'>
        <div>
            <h2>Tabuada de 8</h2>
            @for ($i = 0; $i <= 10; $i++)
                <small>8 x {{$i}} = {{8 * $i}}</small>
                <br>
            @endfor
        </div>
        <div>
            @forelse ($frutas as $nome => $preco)
                <p>{{ ucfirst($nome) }}: R$ {{ number_format($preco, 2, ',', '.') }}</p>
            @empty
                <p>O array está vazio</p>  Retorno padrao caso o array esteja vazio 
            @endforelse
        </div>
    </div> --}}

    {{-- @php
        $i = 0
    @endphp

    @while ($i <= 10)
        <small>8 x {{$i}} = {{8 * $i}}</small>
        <br>
        @php $i++; @endphp
    @endwhile --}}

    {{-- @switch($type)
        @case(1)
            
            @break
        @case(2)
            
            @break
        @default
            
    @endswitch --}}

@endsection
