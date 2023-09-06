<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online</title>
    <!-- Inclua a biblioteca Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Inclua a biblioteca AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        /* Seu estilo CSS personalizado aqui... */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            /* Cor de fundo mais escura */
            color: #fff;
        }

        /* Estilo para o cabeçalho */
        header .nav-wrapper {
            background-color: #1e1e1e;
            /* Cor de fundo roxa escura */
        }

        header .brand-logo {
            font-size: 24px;
            color: #fff;
            /* Cor branca para o texto do título */
        }

        header ul.right a {
            font-size: 18px;
            color: #fff;
            /* Cor branca para os links no cabeçalho */
        }

        /* Estilo para os links no cabeçalho quando hover */
        header ul.right a:hover {
            background-color: #1e1e1e;
            /* Cor de fundo roxa mais escura ao passar o mouse */
        }

        .section-title {
            font-size: 36px;
            /* Tamanho maior para os títulos das seções */
            font-weight: bold;
            color: #ff7043;
        }

        .book-card {
            background-color: #1e1e1e;
            /* Cor de fundo mais escura para os cards */
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .book-card img {
            max-width: 100%;
            border-radius: 10px;
            /* Bordas mais arredondadas para as imagens */
        }

        /* Espaçamento reduzido para textos */
        .book-card p {
            margin-bottom: 10px;
            /* Espaçamento ligeiramente maior para textos */
            text-align: left;
        }

        /* Estilo para textos "Sobre Nós" */
        .about-text {
            background-color: #1e1e1e;
            /* Cor de fundo mais escura para os textos das bordas */
            padding: 20px;
            border-radius: 10px;
            text-align: justify;
            border: 2px solid #ff7043;
            color: #fff;
            margin: 30px 20px;
            /* Espaçamento externo maior em cima e nos lados */
            animation: fadeIn 2s;
        }

        /* Estilo para o rodapé */
        footer {
            background-color: #111;
            /* Cor de fundo mais escura para o rodapé */
            padding: 20px 0;
            /* Cor do texto no rodapé */
        }

        footer p {
            margin: 0;
            font-size: 18px;
            color: #ffffff;
            animation: fadeIn 2s;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav class="nav-wrapper" style="background-color: #ff7043;">
                <div class="container">
                    <a href="#" class="brand-logo white-text">
                        <i class="material-icons left">library_books</i> Biblioteca Online
                    </a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li>
                            <a href="#presentation" class="white-text">
                                <i class="material-icons left">home</i> Início
                            </a>
                        </li>
                        <li>
                            <a href="#about" class="white-text">
                                <i class="material-icons left">info</i> Sobre Nós
                            </a>
                        </li>
                        <li>
                            <a href="#books" class="white-text">
                                <i class="material-icons left">book</i> Livros
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="white-text">
                                <i class="material-icons left">email</i> Contato
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>


    <section id="presentation" class="center-align py-5" data-aos="fade-up">
        <h2 class="flow-text">Bem-vindo à nossa biblioteca online!</h2>
        <p class="flow-text">Descubra uma vasta coleção de livros e autores incríveis. Encontre a sua próxima aventura
            literária aqui.</p>
    </section>

    <section id="about" class="py-5">
        <div class="container">
            <h2 class="center-align section-title">Sobre Nós</h2>
            <div class="row">
                <div class="col s12 m8 offset-m2" data-aos="fade-up">
                    <div class="about-card">
                        <p>Somos uma equipe apaixonada por literatura, dedicada a proporcionar a você a melhor
                            experiência de leitura online. Nossa missão é conectar leitores a obras excepcionais e
                            autores talentosos. Com uma coleção diversificada e um compromisso inabalável com a
                            qualidade, estamos aqui para tornar a sua jornada literária única e empolgante.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="books" class="py-5">
        <div class="container">
            <h2 class="center-align section-title">Livros em Destaque</h2>

            <!-- Catálogo de Livros em Destaque -->
            <div class="row">
                <div class="col s12 m4" data-aos="fade-up">
                    <div class="book-card">
                        <img src="livro1.jpg" alt="Livro 1">
                        <h5>Título do Livro 1</h5>
                        <p>Autor: Autor do Livro 1</p>
                        <p>Descrição: Um romance emocionante que vai cativar seu coração. Acompanhe os destinos
                            entrelaçados de personagens fascinantes enquanto eles enfrentam desafios inimagináveis.</p>
                    </div>
                </div>
                <div class="col s12 m4" data-aos="fade-up">
                    <div class="book-card">
                        <img src="livro2.jpg" alt="Livro 2">
                        <h5>Título do Livro 2</h5>
                        <p>Autor: Autor do Livro 2</p>
                        <p>Descrição: Uma história misteriosa que vai mantê-lo intrigado. Explore os enigmas sombrios de
                            uma cidade perdida e desvende segredos surpreendentes.</p>
                    </div>
                </div>
                <div class="col s12 m4" data-aos="fade-up">
                    <div class="book-card">
                        <img src="livro3.jpg" alt="Livro 3">
                        <h5>Título do Livro 3</h5>
                        <p>Autor: Autor do Livro 3</p>
                        <p>Descrição: Uma aventura emocionante no espaço sideral. Junte-se à tripulação destemida da
                            nave estelar Solaris enquanto eles exploram novos mundos e enfrentam perigos cósmicos.</p>
                    </div>
                </div>
                <!-- Adicione mais livros aqui -->
            </div>
        </div>
    </section>

    <footer id="contact" class="deep-orange darken-4 white-text center-align py-5" data-aos="fade-up">
        <div class="container">
            <p>&copy; 2023 Biblioteca Online</p>
            <p>Entre em contato conosco para obter mais informações sobre nossa vasta coleção de livros e nossos
                serviços exclusivos. Estamos aqui para ajudar você a encontrar as melhores obras literárias e tornar sua
                experiência de leitura incrível.</p>
        </div>
    </footer>

    <!-- Inclua a biblioteca Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Inclua a biblioteca AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Inicialize os componentes do Materialize
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
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
