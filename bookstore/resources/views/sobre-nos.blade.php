<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/sobre-nos.css') }}">

</head>

<body>
    <!-- Cabeçalho -->
    @include('includes.header')

    <div class="container">

        <div class="section">
            <h2 class="section-title">Sobre Mim</h2>
            <p>Olá! Atualmente, atuo como desenvolvedor Back-End, com mais de dois anos de experiência nesta área
                dinâmica. Minha trajetória na programação teve início na Fatec e se consolidou na Etec, onde adquiri
                habilidades práticas em desenvolvimento web e back-end. Ao longo desse tempo, venho aprimorando minha
                expertise em integrações com APIs, aprimorando minha lógica de programação e buscando constantemente a
                exploração de novas linguagens e tecnologias.<br><br>

                Com vasta experiência em desenvolvimento Back-End, tenho trabalhado ativamente na criação de sistemas
                robustos e eficientes. Neste projeto, estou utilizando da API OpenLibrary para enriquecer minha mini
                biblioteca online, utilizando essas informações para aprimorar ainda mais meu conhecimento.<br><br>

                Estou sempre aberto a novos desafios e oportunidades que me permitam expandir e aperfeiçoar minhas
                habilidades, sempre buscando maneiras inovadoras de enfrentar os desafios presentes no mundo do
                desenvolvimento de software.</p>
        </div>

        <div class="section">
            <h2 class="section-title">Tecnologias utilizadas nesse projeto</h2>
            <div class="row">
                <div class="col s4 m4">
                    <img src="https://i.postimg.cc/L5g8BLJx/api-318-751021.png" alt="Integração com API">
                    <p>Integração com API</p>
                </div>

                <div class="col s4 m4">
                    <img src="https://i.postimg.cc/bvGnFDS2/888859.png" alt="Html">
                    <p>Html</p>
                </div>

                <div class="col s4 m4">
                    <img src="https://i.postimg.cc/8sCrSjcW/4846332.png" alt="PHP">
                    <p>PHP</p>
                </div>

                <div class="col s4 m4">
                    <img src="https://i.postimg.cc/zDdJ3dc8/888847.png" alt="Css">
                    <p>Css</p>
                </div>


                <div class="col s4 m4">
                    <img src="https://i.postimg.cc/05TR3L6W/gratis-png-javascript-logo-html-comentario-blog-thumbnail-removebg-preview.png"
                        alt="JavaScript">
                    <p>JavaScript</p>
                </div>


                <div class="col s4 m4">
                    <img src="https://i.postimg.cc/WFWBMPPb/1969px-Laravel-svg.png" alt="Laravel">
                    <p>Laravel</p>
                </div>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Experiência Profissional</h2>
            <p>Com mais de dois anos de experiência em PHP, com foco especializado em Laravel, tenho habilidades sólidas
                no desenvolvimento back-end. Além disso, possuo conhecimentos em programação para Arduino, ampliando meu
                leque de habilidades para além do desenvolvimento de software convencional. Estou atualmente buscando
                aprimorar meu conhecimento e habilidades para minha pós-graduação, visando fortalecer ainda mais meu
                perfil profissional.<br><br>
                Essa busca contínua por aprendizado reflete minha paixão pela programação e meu compromisso em criar
                soluções de alta qualidade para atender às demandas dos clientes e usuários finais.<br><br>
                Ao longo da minha trajetória, trabalhei em equipes multidisciplinares, oferecendo soluções eficazes e
                inovadoras. Minha experiência também abrange o gerenciamento de bancos de dados utilizando SQL e VBA,
                permitindo-me desenvolver produtos que atendem às necessidades do mercado.</p>
        </div>


        <div class="section">
            <h2 class="section-title">Entre em Contato</h2>
            <p>Estou sempre pronto para colaborar em projetos emocionantes. Se você deseja entrar em contato ou discutir
                uma colaboração, sinta-se à vontade para me enviar uma mensagem.</p>
            <a href="https://www.linkedin.com/in/luis-inacio-0849b0227/"
                class="btn contact-button waves-effect waves-light" target="_blank">Conecte-se comigo no LinkedIn</a>
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
