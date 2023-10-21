<style>
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

    }

    /* Estilos para dispositivos móveis (celulares) */
    @media (max-width: 600px) {
        header .brand-logo {
            font-size: 20px;
        }

        header ul.right a {
            font-size: 14px;
        }
    }
</style>
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
