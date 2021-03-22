<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <script type="application/javascript"  src="{{ url(mix('js/app.js')) }}"></script>
        <script type="application/javascript"  src="{{ url(mix('js/articleOrder.js')) }}"></script>
        <title>CREATE NEW ORDER</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Fonts -->




    </head>
    <body>
        <div class="container">
            <h3>CRIAR NOVO PEDIDO</h3>
            <h3>LISTA DE PRODUTOS</h3>
            <div class="container-fluid">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="card" style="width: 18%; height:10% ;">
                        <div class="card-body">
                            <h5 class="card-title" >{{ $product->articleName }}</h5>
                            <input hidden value="{{ $product->articleName }}" id="articleName{{ $product->id }}">
                            <p class="card-text">Article description</p>
                            <p class="card-text">Preço Unitario: R${{ $product->unitPrice }}</p>
                            <input hidden value="{{ $product->unitPrice }}" id="articleunitPrice{{ $product->id }}">
                            <p class="card-text">Estoque: {{ $product->amount }}</p>
                            <input hidden value="{{ $product->amount }}" id="articleamount{{ $product->id }}">
                            <button class="btn btn-sm btn-success" value="{{ $product->id }}" id="addArticle">Adicionar Item</button>
                            <button class="btn btn-danger btn-sm">Remover Item</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container">
                <h3> LISTA DE COMPRAS</h3>
                <form>
                    <div class="form-group">
                        <table id="articles" class="table table-striped table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ITEM</th>
                                    <th>QUANT.</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>
