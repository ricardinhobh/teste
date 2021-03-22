<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CREATE NEW ORDER</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Fonts -->



    </head>
    <body>
        <div class="container">
            <h3>CRIAR NOVO PEDIDO</h3>
            <h3>LISTA DE PRODUTOS</h3>
            <div class="container-fluid">
                {{ $products }}

            </div>
            <form>
                <div class="form-group">

                </div>
            </form>

        </div>
    </body>
</html>
