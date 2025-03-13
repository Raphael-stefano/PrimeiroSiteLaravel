<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Dashboard')</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="sidebars.css" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Css local -->
        <link rel='stylesheet' href="{{ asset('css/admin.css') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                text-align: center;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
        </style>

    </head>
    
    <body data-bs-theme="light" class="p-0 m-0 d-flex">

        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark text-start" style="width: 280px; min-height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-clipboard2-data-fill fs-2 mx-2"></i>
              <span class="fs-4">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li>
                <a href="{{ route('site.index') }}" class="nav-link">
                  Home
                </a>
              </li>
              <li class="nav-item">
                @if ($page == 'index')
                  <a href="{{ route('admin.index') }}" class="nav-link {{ 'active' }}" aria-current="page">
                @else
                  <a href="{{ route('admin.index') }}" class="nav-link text-white">
                @endif
                  Dashboard
                </a>
              </li>
              <li>
                @if ($page == 'produtos')
                  <a href="{{ route('admin.produtos') }}" class="nav-link {{ 'active' }}" aria-current="page">
                @else
                  <a href="{{ route('admin.produtos') }}" class="nav-link text-white">
                @endif
                  Produtos
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  Pedidos
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  Categorias
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  Usuários
                </a>
              </li>
            </ul>
        </div>

        <div style="width: calc(100% - 280px);">
          <h1> Bem-vindo, {{ $user->nome }} </h1>
          <hr>

          @if ($mensagem = Session::get('delete'))
              @component('components.alerta', [
                  'cor' => 'danger',
                  'icone' => /*'bi-check-circle-fill'*/ 'bi-exclamation-triangle-fill',
                  'mensagem' => $mensagem,
              ])
              @endcomponent
          @endif

          @if ($mensagem = Session::get('create'))
              @component('components.alerta', [
                  'cor' => 'success',
                  'icone' => 'bi-check-circle-fill', /*'bi-exclamation-triangle-fill'*/
                  'mensagem' => $mensagem,
              ])
              @endcomponent
          @endif

          @if ($mensagem = Session::get('update'))
              @component('components.alerta', [
                  'cor' => 'warning',
                  'icone' => 'bi-check-circle-fill', /*'bi-exclamation-triangle-fill'*/
                  'mensagem' => $mensagem,
              ])
              @endcomponent
          @endif

          <div class="p-4 d-flex flex-wrap justify-content-around">
            @yield('conteudo')
          </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>