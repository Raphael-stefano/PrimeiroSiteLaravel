<div class="card text-center" style="width: 18rem;">
    <img src="{{ $imagem ?? '...' }}" class="card-img-top" alt="...">
    <div class="card-body overflow-auto">

        <h5 class="card-title"
            id="titulo{{ $index ?? '' }}" 
            data-full-text="{{ $titulo }}" 
            data-truncated-text="{{ Str::limit($titulo, 20, '...') }}" 
            onclick="toggleText(this)"
        >
            {{ $titulo ? Str::limit($titulo, 20, '...') : 'Título' }}
        </h5>

        <p 
            class="card-text" 
            id="texto{{ $index ?? '' }}" 
            data-full-text="{{ $texto }}" 
            data-truncated-text="{{ Str::limit($texto, 100, '...') }}" 
            onclick="toggleText(this)"
        >
            {{ Str::limit($texto, 100, '...') }}
        </p>

        @if (isset($validation) AND isset($model))
            @can($validation, $model)    
                <a href="{{ $link ?? '#' }}" class="btn btn-danger">Comprar {{ $preco ? Number::currency($preco, in: 'BRL') : "" }}</a>
            @endcan
        @else
            <a href="{{ $link ?? '#' }}" class="btn btn-danger">Comprar {{ $preco ? Number::currency($preco, in: 'BRL') : "" }}</a>
        @endif
        
    </div>
</div>

<script>
    function toggleText(element) {
        // Verificar qual texto está atualmente sendo exibido
        if (element.innerHTML === element.dataset.truncatedText) {
            // Expandir para o texto completo
            element.innerHTML = element.dataset.fullText;
        } else {
            // Voltar ao texto truncado
            element.innerHTML = element.dataset.truncatedText;
        }
    }
</script>
