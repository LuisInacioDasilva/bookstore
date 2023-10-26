<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            /* Cor de fundo suave */
        }

        .header {
            font-size: 36px;
            margin: 30px 0;
            animation: fadeInUp 1s ease-in-out;
        }

        .section {
            background-color: #fff;
            padding: 40px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        .section-title {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .tech-icons {
            font-size: 48px;
            margin: 10px;
            color: #00796b;
            /* Cor personalizável */
        }

        .icon-bg {
            background-color: #00796b;
            /* Cor personalizável */
            border-radius: 50%;
            padding: 20px;
            display: inline-block;
        }

        .contact-button {
            background-color: #00796b;
            /* Cor personalizável */
            color: #fff;
            font-size: 20px;
            border-radius: 5px;
            animation: bounce 2s infinite;
        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    @include('includes.header')

    <div class="container">

        <div class="section">
            <h2 class="section-title">Sobre Mim</h2>
            <p>Olá! Sou um desenvolvedor back-end apaixonado por criar sistemas robustos e eficientes. Minha jornada na
                programação começou na Fatec e se aprofundou na Etec, onde adquiri habilidades práticas em
                desenvolvimento web e back-end. Atualmente, estou utilizando a API OpenLibrary para obter informações de
                livros e enriquecer minha mini biblioteca online. Estou sempre em busca de novos desafios e
                oportunidades para expandir meu conhecimento.</p>
        </div>

        <div class="section">
            <h2 class="section-title">Linguagens e Tecnologias</h2>
            <div class="row">
                <div class="col s4 m4">
                    <img src="https://i.postimg.cc/k4rnwNWT/png-transparent-web-development-application-programming-interface-computer-icons-web-api-others-text.png"
                        alt="Integração com API" style="width: 100px; height: 100px; ">
                    <p>Integração com API</p>
                </div>
                <div class="col s4 m4">
                    <img src="https://i.postimg.cc/fLxMP3KD/png-transparent-logo-php-html-others-text-trademark-logo-thumbnail.png"
                        alt="PHP" style="width: 100px; height: 100px;">
                    <p>PHP</p>
                </div>
                <div class="col s4 m4">
                    <img src="https://i.postimg.cc/WFWBMPPb/1969px-Laravel-svg.png" alt="Laravel"
                        style="width: 100px; height: 100px; ">
                    <p>Laravel</p>
                </div>
            </div>
        </div>




        <div class="section">
            <h2 class="section-title">Experiência Profissional</h2>
            <p>Com experiência no desenvolvimento back-end desde 2020, tenho conhecimento em linguagens como C, C#, e
                Laravel, além de habilidades em SQL para gerenciamento de bancos de dados. Também possuo experiência em
                VBA. Durante minha trajetória, trabalhei em equipes multidisciplinares, onde criei soluções eficazes que
                atendem às necessidades dos clientes e usuários finais. Minha paixão pela programação impulsiona meu
                desejo contínuo de aprender e aprimorar minhas habilidades para criar produtos de alta qualidade.</p>
        </div>


        <div class="section">
            <h2 class="section-title">Entre em Contato</h2>
            <p>Estou sempre pronto para colaborar em projetos emocionantes. Se você deseja entrar em contato ou discutir
                uma colaboração, sinta-se à vontade para me enviar uma mensagem.</p>
            <a class="btn contact-button waves-effect waves-light">Contate-me</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Rodapé -->
    @include('includes.footer')

    <!-- Botão de alternância do modo noturno (ícone de lua/sol) -->
    @include('includes.button-mode')

</body>

</html>
