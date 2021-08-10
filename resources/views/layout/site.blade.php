<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Desafio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .card{
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @include('layout.menu')

            @yield('conteudo')
        </div>

        <script src="https://use.fontawesome.com/4299b7b486.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
        
        <script>
            $('#imposto').mask('##0.00', {reverse: true});
            $('#valor').mask('##0.00', {reverse: true});

            $(function(){

                var valor_recibo = 0;
                $(".valor-total").each(function() {
                var num = parseFloat($(this).text().replace(',', '.'));
                valor_recibo += num;
                });
                $('.resultado-total').html(valor_recibo.toString().replace('.', ','));

                var valorImposto = 0;
                $(".valor-imposto").each(function() {
                var num = parseFloat($(this).text().replace(',', '.'));
                valorImposto += num;
                });
                $('.resultado-total-imposto').html(valorImposto.toString().replace('.', ','));

            });
        </script>
    </body>
</html>