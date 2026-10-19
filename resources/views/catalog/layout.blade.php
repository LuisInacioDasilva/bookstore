<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101b2c">
    <meta name="description" content="Bookstore Discovery: um catálogo de leitura, busca e curadoria com dados da Open Library.">
    <title>@yield('title', 'Bookstore Discovery')</title>
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
</head>
<body>
    <a class="skip-link" href="#main">Pular para o conteúdo</a>
    <header class="site-header">
        <div class="shell header-inner">
            <a class="brand" href="{{ route('home') }}" aria-label="Bookstore Discovery, página inicial">
                <span class="brand-mark" aria-hidden="true">B<span>/</span></span>
                <span class="brand-name">BOOKSTORE<span>DISCOVERY</span></span>
            </a>
            <nav class="site-nav" aria-label="Navegação principal">
                <a href="{{ route('home') }}#explorar">Explorar</a>
                <a href="{{ route('sobre-nos') }}">Sobre o projeto</a>
            </nav>
            <span class="header-note">CATÁLOGO ABERTO <span class="live-dot" aria-hidden="true"></span></span>
        </div>
    </header>

    <main id="main">@yield('content')</main>

    <footer class="site-footer">
        <div class="shell footer-inner">
            <div><strong>BOOKSTORE / DISCOVERY</strong><p>Descobrir livros deveria ser simples. Os metadados vêm da Open Library e podem estar incompletos.</p></div>
            <div class="footer-links">
                <a href="https://openlibrary.org/" target="_blank" rel="noopener noreferrer">Fonte: Open Library ↗</a>
                <a href="https://github.com/LuisInacioDasilva/bookstore" target="_blank" rel="noopener noreferrer">Código no GitHub ↗</a>
            </div>
            <span class="footer-signature">Feito por Luis da Silva</span>
        </div>
    </footer>
</body>
</html>
