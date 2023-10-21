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

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .book-card img {
            max-width: 100%;
            border-radius: 10px;
        }

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
                margin: 10px;
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



        /* Estilo para a seção de informações do livro */
        #book-info {
            background-color: #f5f5f5;
            padding: 40px 0;
            text-align: center;
        }

        #book-info .book-card {
            background-color: #fff;
            /* Cor de fundo branca para os cards */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        #book-info .book-card img {
            max-width: 100%;
            border-radius: 10px;
        }

        #book-info .book-details {
            margin-top: 20px;
        }

        #book-info .book-title {
            font-size: 24px;
            color: #009688;
            margin-bottom: 10px;
        }

        #book-info .book-authors {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }

        #book-info .book-description {
            font-size: 16px;
            color: #333;
        }

        #book-info .book-details p {
            font-size: 16px;
            color: #333;
            margin: 5px 0;
        }

        .btn-contact {
            display: inline-block;
            padding: 12px 24px;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            font-size: 1rem;
            line-height: 0.6;
            /* Ajuste a altura da linha para 1 (padrão) */
            border-radius: 0.25rem;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-contact:hover {
            background-color: #00796b;
        }

        /* Estilos para dispositivos móveis (celulares) */
        @media (max-width: 600px) {

            .section-title {
                font-size: 24px;
            }

            .book-card {
                padding: 10px;
                margin: 10px 0;
            }

            #book-info .book-card {
                padding: 10px;
            }

        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    @include('includes.header')

    <!-- Seção de informações do livro -->
    <section id="book-info" class="container" data-aos="fade-up">
        <div class="row">
            <div class="col s12">
                <h2 class="section-title center-align" style="margin-top: 2px; border-bottom: 2px solid #009688;">
                    Detalhes do Livro</h2>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="book-card center-align">
                    <img src="{{ $dados->imagem }}" alt="Nome do Livro">
                    <h3 class="book-title">{{ $dados->titulo }}</h3>
                    <p class="book-authors">Autor(es): {{ $dados->autor }}</p>
                    <p class="book-description">
                        {{ isset($dados->descricao_livro) ? (strlen($dados->descricao_livro) > 150 ? substr($dados->descricao_livro, 0, 145) . '...' : $dados->descricao_livro) : 'Descrição Indisponível' }}
                    </p>
                    <p><strong>Data de Publicação:</strong>
                        {{ isset($dados->data_publicacao) ? 'Sem informações de data' : $dados->data_publicacao }}</p>
                    <p><strong>Categorias:</strong>
                        {{ strlen($dados->assuntos) > 158 ? substr($dados->assuntos, 0, 145) . '...' : $dados->assuntos }}
                    </p>
                    <a href="#contact" class="btn waves-effect waves-light btn-contact center-align">Entrar em
                        Contato</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    @include('includes.footer')

    <!-- Botão de alternância do modo noturno (ícone de lua/sol) -->
    @include('includes.button-mode')

</body>

</html>
