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
                            <input hidden value="{{ $product->unitPrice }}" id="articleUnitPrice{{ $product->id }}">
                            <p class="card-text">Estoque: {{ $product->amount }}</p>
                            <input hidden value="{{ $product->amount }}" id="articleamount{{ $product->id }}">
                            <button class="btn btn-sm btn-success" value="{{ $product->id }}" id="addArticle">Adicionar Item</button>
                            <button class="btn btn-danger btn-sm" value="{{ $product->id }}" id="removeArticle">Remover Item</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container">
                <h3> LISTA DE COMPRAS</h3>
                    <form method="POST" action="{{ url('order') }}">
                        @csrf

                            <div id="articlesOrder">
                                <div class="form-row">
                                    <div class="form-group col-sm-1">
                                        <label>#</label>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>ITEM</label>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label>QUANT.</label>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label>TOTAL</label>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label>TOTAL COM DESCONTO</label>
                                    </div>
                                </div>
                            </div>

                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </form>

            </div>
        </div>
    </body>

</html>
