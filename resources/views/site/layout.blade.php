<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Produtos')</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Css local -->
        <link rel='stylesheet' href="{{ asset('css/app.css') }}" />

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
    
    <body data-bs-theme="dark" class="p-0 m-0">
        
        <!-- <div class='h-100 w-100 d-flex p-0 m-0'>

            <div class='w-25 min-h-100 p-0 m-0'>
                @component('components/sidebar')
                    @slot('titulo') Site Sidebar @endslot
                    @slot('texto') Site Sidebar Text @endslot
                @endcomponent
            </div>

            <div class='w-75 h-100 p-0 m-0'>
                @yield('conteudo')
            </div> -->

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Sair da conta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Tem certeza de que deseja sair da sua conta?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="{{ route('login.sair') }}" class="btn btn-outline-success">Sair</a>
                  </div>
                </div>
              </div>
            </div>

            <header class="navbar navbar-expand-lg bg-body-tertiary mb-3 p-4">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Curso Laravel</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.carrinho') }}">Carrinho ({{ \Cart::content()->count() }})</a>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Categorias
                        </a>
                        <ul class="dropdown-menu">
                          @foreach ($categorias as $categoria)
                            <li><a class="dropdown-item" href="{{ route('site.categoria', $categoria->id_categoria) }}">{{ $categoria->nome }}</a></li>
                          @endforeach  
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>

                    </ul>
                    @if (Auth::user())
                      <div class="dropdown">
                        <a class="btn btn-outline-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->nome }}
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a></li>
                          <!-- <li><a class="dropdown-item" href="{{ route('login.sair') }}">Sair</a></li> -->

                          <!-- Button trigger modal -->
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Sair
                          </button>

                        </ul>
                      </div>
                    @else
                      <a class="btn btn-outline-success px-3 d-flex align-items-center" href="{{ route('login.formulario') }}">
                        <span class="me-1">Entrar</span> <i class="bi bi-box-arrow-in-right fs-5"></i>
                      </a>
                    @endif
                  </div>
                </div>
            </header>

            @if ($mensagem = Session::get('logout'))
                @component('components.alerta', [
                    'cor' => 'warning',
                    'icone' => 'bi-exclamation-triangle-fill',
                    'mensagem' => $mensagem,
                ])
                @endcomponent
            @endif

            @yield('conteudo')

        </div>


        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>
