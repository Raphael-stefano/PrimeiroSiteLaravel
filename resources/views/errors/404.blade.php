<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-center">
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div>
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-3"><span class="text-danger">Oops!</span> Página não encontrada.</p>
            <p class="lead">A página que você está procurando não existe.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Voltar para a página inicial</a>
        </div>
    </div>
</body>
</html>
