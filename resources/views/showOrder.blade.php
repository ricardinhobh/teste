<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>INDEX ORDER</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Fonts -->
    </head>

    <body>
        <div class="container">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Codigo Pedido: </th>
                        <th>Id Pedido:</th>
                        <th>Data Pedido:</th>
                        <th>Valor Total Sem Desconto</th>
                        <th>Valor Total Com Desconto</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $order->orderCode }}</td>
                            <td> {{ $order->id }}</td>
                            <td> {{ $order->orderDate }}</td>
                            <td> R${{ $totalWithoutDiscount }}</td>
                            <td>R${{ $totalWithDiscount }}</td>
                        </tr>
                </tbody>
            </table>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Codigo Produto</th>
                        <th>Nome Produto</th>
                        <th>Quant.</th>
                        <th>Valor Sem Desconto</th>
                        <th>Valor Com Desconto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productsOrder as $productOrder)
                    <tr>
                        <td>{{ $productOrder->product_id }}</td>
                        @foreach ($articles as $article)
                            @if ($productOrder->product_id == $article->id )
                                <td> {{ $article->articleName }}</td>
                            @endif
                        @endforeach
                        <td> {{ $productOrder->amountProduct }}</td>
                        <td>R${{ $productOrder->totalWithoutDiscount }}</td>
                        <td>R${{ $productOrder->totalWithDiscount }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <div class="container">
            <button type="button" class="btn btn-primary" onclick="listOrder()">Lista de Pedidos</button>
        </div>
    </body>
    <script>
        function listOrder(){
            window.location.href = 'listOrder';
        }
    </script>
</html>


