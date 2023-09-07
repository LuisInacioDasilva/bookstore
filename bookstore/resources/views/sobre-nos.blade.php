<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Sobre Nós</title>
    <style>
        body {
            background-color: #121212;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        /* Estilo para o cabeçalho */
        header .nav-wrapper {
            background-color: #ff7043;
        }

        header .brand-logo {
            font-size: 24px;
            color: #fff;
        }

        header ul.right a {
            font-size: 18px;
            color: #fff;
        }

        /* Estilo para os links no cabeçalho quando hover */
        header ul.right a:hover {
            background-color: #1e1e1e;
        }

        /* Estilos para as seções de conteúdo */
        .section {
            padding: 40px 0;
        }

        .card {
            background-color: #1e1e1e;
            color: #fff;
        }

        .card-title {
            color: #ff7043;
        }

        .icon-block {
            text-align: center;
            padding: 20px;
        }

        .icon-block h4 {
            font-size: 24px;
        }

        /* Estilo para o footer */
        footer {
            background-color: #ff7043;
            color: #fff;
            padding: 10px 0;
            /* Reduzi o tamanho do footer */
        }

        .footer-logo {
            font-size: 32px;
            font-weight: bold;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #fff;
            font-size: 14px;
            /* Diminuí o tamanho das fontes */
        }

        /* Animações */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animated {
            animation: fadeIn 1s ease-in-out;
        }

        /* Estilo para o novo footer */
        .social-icons {
            margin-top: 20px;
            text-align: center;
        }

        .social-icons a {
            font-size: 24px;
            margin: 0 10px;
            color: #ff7043;
        }

        .footer-content {
            margin-top: 40px;
        }

        .footer-content h4 {
            font-size: 24px;
        }

        .footer-content p {
            font-size: 16px;
        }

        /* Estilo para as novas seções de conteúdo */
        .content-section {
            background-color: #1e1e1e;
            padding: 40px 0;
        }

        .content-section h3 {
            color: #ff7043;
        }

        .content-section p {
            font-size: 18px;
            line-height: 1.6;
        }

        /* Estilo para os ícones de serviços */
        .service-icon {
            border-radius: 10px;
            /* Adicionei bordas arredondadas */
            background-color: #ff7043;
            color: #fff;
            padding: 10px;
            font-size: 24px;
        }

        /* Estilo para as imagens dos serviços */
        .service-image {
            max-width: 100px;
            /* Defina o tamanho máximo das imagens */
            border-radius: 10px;
            /* Adicionei bordas arredondadas */
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav class="nav-wrapper" style="background-color: #ff7043;">
                <div class="container">
                    <a href="http://localhost:8000/" class="brand-logo white-text">
                        <i class="material-icons left">library_books</i> Biblioteca Online
                    </a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li>
                            <a href="http://localhost:8000/" class="white-text">
                                <i class="material-icons left">home</i> Início
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/sobre-nos" class="white-text">
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

    <div class="container">
        <section id="sobre-nos" class="section">
            <h2 class="white-text animated">Quem Somos</h2>
            <div class="row animated">
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Nossa História</span>
                            <p>Somos uma biblioteca online dedicada a oferecer acesso a uma vasta coleção de livros em
                                diversos gêneros e idiomas. Nossa missão é tornar o conhecimento e a literatura
                                acessíveis a todos, em qualquer lugar.</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="https://i.postimg.cc/jSwpS15Y/escritorio-moderno-com-ia-generativa-de-computador-portatil.jpg" alt="Imagem da Biblioteca">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="servicos" class="section">
            <h2 class="white-text animated">Nossos Serviços</h2>
            <div class="row animated">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <span class="service-icon"><i class="material-icons">search</i></span>
                        <img src="imagem-servico-1.jpg" alt="Serviço 1" class="service-image">
                        <p class="light">Consultar Endereço de CEP para Entrega</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="icon-block">
                        <span class="service-icon"><i class="material-icons">library_books</i></span>
                        <img src="imagem-servico-2.jpg" alt="Serviço 2" class="service-image">
                        <p class="light">Busque seus Livros Favoritos</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="icon-block">
                        <span class="service-icon"><i class="material-icons">email</i></span>
                        <img src="imagem-servico-3.jpg" alt="Serviço 3" class="service-image">
                        <p class="light">Entre em Contato</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Novo conteúdo -->
        <section class="content-section">
            <div class="row">
                <div class="col s12 m6">
                    <h3 class="white-text animated">Siga-nos nas Redes Sociais</h3>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
                    </div>
                </div>
                <div class="col s12 m6">
                    <h3 class="white-text animated">Entre em Contato</h3>
                    <p>Fale conosco se tiver alguma dúvida ou comentário:</p>
                    <p>Email: contato@bibliotecaonline.com</p>
                    <p>Telefone: (123) 456-7890</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Novo footer -->
    <footer class="page-footer animated" style="background-color: #ff7043;">
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <h5 class="white-text footer-logo">Biblioteca Online</h5>
                    <p>Sua melhor fonte para livros online.</p>
                </div>
                <div class="col s12 m6 footer-content">
                    <h4 class="white-text">Destaques</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget urna vitae orci hendrerit
                        luctus.</p>
                    <p>Nulla facilisi. Integer lacinia, justo a fermentum malesuada, velit lectus sodales turpis, eu
                        finibus justo ligula id mi.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        M.AutoInit(); // Inicializa os componentes do Materialize
    </script>
</body>

</html>
