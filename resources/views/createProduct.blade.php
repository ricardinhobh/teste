<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CREATE NEW PRODUCT</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Fonts -->



    </head>
    <body>
        <div class="form-group">

            <h3>Criar novo Produto</h3>
            <form method="POST" action="">
                @csrf
                <div class="form-inline">
                    <label for="articleName" class="col-2">Nome do Produto:</label>
                    <input class="form-control" name="articleName" type="text">
                </div>
                <div class="form-inline">
                    <label class="col-2">Preço do Produto:</label>
                    <input class="form-control" name="unitPrice" type="number">
                </div>
                <div class="form-inline">
                    <label class="col-2">Quantidade:</label>
                    <input class="form-control" name="amount" type="number">
                </div>
                <div class="form-inline">
                    <button class="btn-sm btn-success" type="submit">SALVAR</button>
                </div>
            </form>
        </div>
        <div class="container">
            @foreach ($products as $product)
                <li>{{ $product->name }}</li>

            @endforeach

        </div>
        <div class="container">
            <button type="button" class="btn btn-primary" onclick="newOrder()">Criar Novo Pedido</button>
        </div>
    </body>
    <script>
        function newOrder(){
            window.location.href ='./order';
        }
    </script>
</html>
