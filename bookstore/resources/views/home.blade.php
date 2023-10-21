<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Livraria Online</title>
    <!-- Inclua a biblioteca Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Inclua a biblioteca AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Inclua a biblioteca FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* Estilos gerais */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            /* Fundo mais claro */
            color: #333;
            /* Cor de texto mais escura */
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        /* Modo Noturno */
        body.dark-mode {
            background-color: #333;
            /* Fundo escuro */
            color: #fff;
            /* Texto branco */
        }


        /* Estilo para os títulos das seções */
        .section-title {
            font-size: 36px;
            font-weight: bold;
            color: #009688;
            /* Cor verde esmeralda para os títulos das seções */
        }

        /* Estilo para os cards de livros */
        .book-card {
            background-color: #fff;
            /* Cor de fundo branca para os cards */
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        /* Modo Noturno - Altere a cor de fundo dos cards */
        body.dark-mode .book-card {
            background-color: #444;
            /* Cor de fundo cinza escuro no modo noturno */
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .book-card img {
            max-width: 100%;
            border-radius: 10px;
        }

        .book-card p {
            margin-bottom: 10px;
            text-align: left;
        }

        /* Estilo para o texto "Sobre Nós" */
        .about-text {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: justify;
            border: 2px solid #009688;
            /* Cor verde esmeralda para a borda */
            color: #333;
            margin: 30px 20px;
            animation: fadeIn 2s;
        }


        /* Estilos responsivos */
        @media (max-width: 992px) {


            .book-card {
                padding: 10px;
            }

            .section-title {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    @include('includes.header')

    <!-- Seção de apresentação -->
    <section id="presentation" class="center-align py-5" data-aos="fade-up">
        <h2 class="flow-text">Bem-vindo à Minha Livraria Online!</h2>
        <p class="flow-text">Explore nossa coleção de livros e mergulhe em aventuras literárias incríveis. Encontre o
            próximo livro que irá cativar sua imaginação.</p>
    </section>

    <!-- Seção de livros em destaque -->
    <section id="books" class="py-5">
        <div class="container">
            <h2 class="center-align section-title">Livros em Destaque</h2>

            <!-- Catálogo de Livros em Destaque -->
            <div class="row" {{ shuffle($dados) }}>
                @foreach ($dados as $item)
                    @if (!empty($item->titulo))
                        <!-- Verifique se o título não está vazio -->
                        <div class="col s12 m4">
                            <div class="book-card" data-aos="fade-up">
                                <a href="http://127.0.0.1:8000/busca-livro/{{ $item->id_livro }}">
                                    <!-- Adicione um link para a página de detalhes do livro -->
                                    <img src="{{ $item->imagem }}" width="250px" height="315px"
                                        alt="{{ $item->titulo }}">
                                    <h5>{{ $item->titulo }}</h5>
                                </a>
                                <p>Autor:
                                    {{ mb_substr($item->autores, 0, 20) }}{{ strlen($item->autores) > 20 ? '...' : '' }}
                                </p>
                                <p>Descrição: {{ $item->descricao }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    @include('includes.footer')

    <!-- Botão de alternância do modo noturno (ícone de lua/sol) -->
    @include('includes.button-mode')

</body>

</html>
