@extends('site/layout')

@section('title', 'Login') <!-- Título dinâmico da página -->

@section('conteudo')

    @if ($mensagem = Session::get('erro'))
        @component('components.alerta', [
            'cor' => 'danger',
            'icone' => 'bi-exclamation-triangle-fill',
            'mensagem' => $mensagem,
        ])
        @endcomponent
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @component('components.alerta', [
                'cor' => 'danger',
                'icone' => 'bi-exclamation-triangle-fill',
                'mensagem' => $error,
            ])
            @endcomponent
        @endforeach
    @endif

    <form class='p-5 d-flex flex-column align-items-center' action="{{ route('login.auth') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3 w-50 text-start">
            <label for="email" class="form-label px-3">Email: </label>
            <input class="form-control" type="mail" name="email" id="email">
        </div>

        <div class="mb-3 w-50 text-start">
            <label for="password" class="form-label px-3"">Senha: </label>
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <div class="mb-3 w-50 text-start d-flex flex-row">
            <input type="checkbox" class="form-check-input me-3" id="remember" name="remember">
            <label class="form-check-label" for="remember">Lembrar deste usuário</label>
        </div>

        <button type="submit" class="btn btn-outline-light"> Entrar </button>

    </form>

@endsection