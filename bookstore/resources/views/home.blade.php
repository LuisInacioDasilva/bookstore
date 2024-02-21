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
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>

<body>
    <!-- Cabeçalho -->
    @include('includes.header')

    <!-- Seção de apresentação -->
    <section id="presentation" class="center-align py-5" data-aos="fade-up">
        <div class="container">
            <h2 class="flow-text">Bem-vindo à Minha Livraria Online!</h2>
            <p class="flow-text">Explore nossa coleção de livros e mergulhe em aventuras literárias incríveis. Encontre o próximo livro que irá cativar sua imaginação.</p>
        </div>
    </section>

    <!-- Seção de livros em destaque -->
    <section id="books" class="py-5">
        <div class="container">
            <h2 class="center-align section-title">Livros em Destaque</h2>

            <!-- Catálogo de Livros em Destaque -->
            <div class="row">
                @php
                    $count = 0;
                @endphp
                @foreach ($dados as $item)
                    @if (!empty($item->titulo))
                        <!-- Verifique se o título não está vazio -->
                        <div class="col s12 m4">
                            <div class="book-card" data-aos="fade-up">
                                <a href="http://127.0.0.1:8000/busca-livro/{{ $item->id_livro }}">
                                    <!-- Adicione um link para a página de detalhes do livro -->
                                    <img src="{{ $item->imagem }}" class="responsive-img" alt="{{ $item->titulo }}">
                                    <h5>{{ $item->titulo }}</h5>
                                </a>
                                <p>Autor: {{ mb_substr($item->autores, 0, 20) }}{{ strlen($item->autores) > 20 ? '...' : '' }}</p>
                                <p>Descrição: {{ $item->descricao }}</p>
                            </div>
                        </div>
                        @php
                            $count++;
                            if ($count % 3 == 0) {
                                echo '</div><div class="row">';
                            }
                        @endphp
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
