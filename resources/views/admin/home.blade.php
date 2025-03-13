@extends('admin/dashboard')

@section('title', 'Dashboard') <!-- Título dinâmico da página -->

@section('conteudo')

    @foreach ($cards as $card)
    
        @component('components.dashboardCard', [
            'titulo' => $card['titulo'],
            'icone' => $card['icone'],
            'qty' => $card['qty'],
        ])

        @endcomponent

    @endforeach
        
   
@endsection