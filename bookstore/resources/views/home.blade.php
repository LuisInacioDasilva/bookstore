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

        /* Estilo para o cabeçalho */
        header .nav-wrapper {
            background-color: #009688;
            /* Cor de fundo verde esmeralda */
        }

        header .brand-logo {
            font-size: 28px;
            /* Tamanho do título maior */
            color: #fff;
            /* Cor branca para o texto do título */
        }

        header ul.right a {
            font-size: 18px;
            color: #fff;
        }

        header ul.right a:hover {
            background-color: #00796b;
            /* Cor mais escura ao passar o mouse */
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

        /* Estilo para o rodapé */
        footer {
            background-color: #009688;
            padding: 20px 0;
        }

        footer p {
            margin: 0;
            font-size: 18px;
            color: #fff;
            animation: fadeIn 2s;
        }

        /* Estilos responsivos */
        @media (max-width: 992px) {
            header .brand-logo {
                font-size: 24px;
                /* Tamanho menor para telas menores */
            }

            header ul.right a {
                font-size: 16px;
                /* Tamanho menor para telas menores */
            }

            .book-card {
                padding: 10px;
            }

            .section-title {
                font-size: 28px;
            }
        }

        /* Estilo para o ícone de lua/sol */
        .icon-container {
            position: fixed;
            top: 20px;
            right: 20px;
            cursor: pointer;
            font-size: 24px;
            transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        /* Animação para o ícone de lua/sol */
        .icon-container.active {
            transform: rotate(180deg);
        }

        /* Estilo para o botão de alternância do modo noturno */
        .dark-mode-button {
            position: fixed;
            top: 80px;
            right: 20px;
            padding-top: 30px;
            background-color: #009688;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: background-color 0.3s ease-in-out;
        }

        /* Estilo para o botão de alternância do modo noturno no modo noturno */
        .dark-mode-button.dark-mode {
            background-color: #333;
        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <div class="navbar-fixed">
            <nav class="nav-wrapper">
                <div class="container">
                    <a href="http://localhost:8000/" class="brand-logo">
                        <i class="material-icons left">book</i> Minha Livraria Online
                    </a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="http://localhost:8000/">Início</a></li>
                        <li><a href="http://localhost:8000/sobre-nos">Sobre Nós</a></li>
                        <li><a href="#books">Livros</a></li>
                        <li class="dark-mode-link">
                            <a href="#contact">Contato</a>
                            <button class="dark-mode-button"><i class="fas fa-sun"></i></button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

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
                                <img src="{{ $item->imagem }}" width="250px" height="315px" alt="{{ $item->titulo }}">
                                <h5>{{ $item->titulo }}</h5>
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
    <footer id="contact" class="teal white-text center-align py-5" data-aos="fade-up">
        <div class="container">
            <p>&copy; 2023 Minha Livraria Online</p>
            <p>Entre em contato conosco para descobrir mais sobre nossa vasta coleção de livros e serviços exclusivos.
                Estamos aqui para ajudá-lo a encontrar as melhores obras literárias e tornar sua experiência de leitura
                incrível.</p>
        </div>
    </footer>

    <!-- Botão de alternância do modo noturno (ícone de lua/sol) -->
    <div id="dark-mode-toggle" class="icon-container">
        <i class="fas fa-sun"></i>
    </div>

    <!-- Botão de alternância do modo noturno -->
    <button class="dark-mode-button"><i class="fas fa-sun"></i></button>

    <!-- Inclua a biblioteca Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Inclua a biblioteca AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Inicialize os componentes do Materialize
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();

            const toggleDarkModeButton = document.getElementById('dark-mode-toggle');
            const darkModeButton = document.querySelector('.dark-mode-button');
            const body = document.body;

            function toggleDarkMode() {
                body.classList.toggle('dark-mode');
                toggleDarkModeButton.classList.toggle('active');
                darkModeButton.classList.toggle('dark-mode');
                // Altere o ícone com base no modo
                const icon = darkModeButton.querySelector('i');
                if (body.classList.contains('dark-mode')) {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                } else {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                }
            }

            toggleDarkModeButton.addEventListener('click', toggleDarkMode);
            darkModeButton.addEventListener('click', toggleDarkMode);
        });

        // Inicialize as animações AOS
        AOS.init({
            duration: 700,
            easing: 'ease-in-out',
            once: true,
        });
    </script>
</body>

</html>
