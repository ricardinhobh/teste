<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>INDEX ORDER</title>
        <script type="application/javascript"  src="{{ url(mix('js/app.js')) }}"></script>
        <script type="application/javascript"  src="{{ url(mix('js/articleOrder.js')) }}"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Fonts -->
    </head>

    <body>
        <div class="container">
            <div class="col-sm-6">
                <select id="selectOrder" class="custom-select">
                    <option selected> Selecione uma ordem</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}">{{ $order->id ." - ".$order->orderCode." - ".$order->orderDate }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="container" id="showOrder">

        </div>
    </body>
</html>


