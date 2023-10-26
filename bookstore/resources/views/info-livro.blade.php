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
    <link rel="stylesheet" href="{{ asset('css/info-livro.css') }}">


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
