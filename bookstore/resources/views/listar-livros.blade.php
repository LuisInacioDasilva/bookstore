<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #f0f0f0;
        }

        .category-container {
            margin-top: 50px;
        }

        .category-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .carousel {
            overflow: hidden;
        }

        .carousel .carousel-item {
            width: 300px;
            /* Ajuste conforme necessário */
        }

        .carousel img {
            width: 100%;
            height: auto;
        }

        .carousel-category {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    @include('includes.header')

    <!-- Conteúdo das Categorias -->
    <div class="container category-container">
        <div class="category-category">
            <h4 class="category-title">Ficção</h4>
            <div class="carousel">
                <!-- Adicione os livros da categoria de ficção dinamicamente aqui -->
                <a class="carousel-item" href="#one!"><img src="livro1.jpg"></a>
                <a class="carousel-item" href="#two!"><img src="livro2.jpg"></a>
                <!-- Adicione mais itens conforme necessário -->
            </div>
        </div>

        <div class="category-category">
            <h4 class="category-title">Não Ficção</h4>
            <div class="carousel">
                <!-- Adicione os livros da categoria de não ficção dinamicamente aqui -->
                <a class="carousel-item" href="#three!"><img src="livro3.jpg"></a>
                <a class="carousel-item" href="#four!"><img src="livro4.jpg"></a>
                <!-- Adicione mais itens conforme necessário -->
            </div>
        </div>

        <!-- Adicione mais categorias conforme necessário -->

    </div>

    <!-- Rodapé -->
    <div id="footer" class="footer" style="position: fixed; bottom: 0; width: 100%;">
        @include('includes.footer')
    </div>

    <!-- Botão de alternância do modo noturno (ícone de lua/sol) -->
    @include('includes.button-mode')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicialize os carrosséis
            var carousels = document.querySelectorAll('.carousel');
            M.Carousel.init(carousels, {
                fullWidth: true,
                indicators: true,
                duration: 200,
            });

            // Adicione o efeito de fade aos itens do carrossel
            var carouselItems = document.querySelectorAll('.carousel .carousel-item');
            carouselItems.forEach(function(item) {
                item.style.opacity = 0;
            });

            var fadeIn = function(el) {
                var opacity = 0;

                var fade = function() {
                    el.style.opacity = opacity;
                    opacity += 0.05;

                    if (opacity < 1) {
                        requestAnimationFrame(fade);
                    }
                };

                fade();
            };

            var carouselInstances = M.Carousel.getInstance(carousels[0]);
            carouselInstances.next();

            carouselInstances.$el.find('.carousel-item').each(function(index, el) {
                fadeIn(el);
            });
        });
    </script>
</body>

</html>
