# bookstore

Catálogo de livros iniciado em 2023. Consulta dados da [Open Library](https://openlibrary.org/developers/api) e apresenta listagens e detalhes em Laravel. Esta etapa atualiza a base técnica; a revisão do produto e da interface vem em uma mudança separada.

## Estado da revisão

O histórico mostra a integração inicial no commit `fe6615c` e a tela de detalhes no `d0f4aa0`. A exceção devolvida diretamente ao navegador entrou em `7e7a02b`; o mapeamento atual de título, autores, capa e ID foi alterado em `5e817c3`. Não encontrei no histórico uma justificativa para expor exceções ou fazer chamadas externas sem limite de tempo.

A integração entrou em 2023 e a PR #2 impôs timeout às requisições, validou o identificador, evitou consultas repetidas para capa/descrição e ocultou exceções cruas. Esta PR migra Laravel 9 para 13, Sanctum 3 para 4, Tinker 2 para 3 e PHPUnit 9 para 12, mantendo a estrutura do aplicativo e os dez testes de caracterização. Ainda faltam cache, tratamento explícito de indisponibilidade e uma revisão mais ampla da experiência; não trate esta etapa isolada como homologação de produção.

## Executar localmente

Requisitos: PHP 8.3+, Composer, extensões exigidas pelo `composer.lock` e acesso à Open Library. Dentro de `bookstore/`:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

No PowerShell, use `Copy-Item .env.example .env` no lugar de `cp`. Mantenha `APP_DEBUG=false` se compartilhar a instância na rede. A página principal faz consulta externa em tempo real; uma falha de rede pode interromper a renderização. Não há migração de banco de dados necessária para o catálogo atual.

`OPEN_LIBRARY_BASE_URL` aponta para a API pública. O antigo `BASE_URL` ainda é aceito como fallback para não quebrar ambientes existentes. Em caso de indisponibilidade da API, o site devolve HTTP 503 e registra o erro no log em vez de mostrar a exceção ao visitante.

## Verificação

```bash
cd bookstore
php artisan test
```

Os testes de caracterização fixam o mapeamento do cartão e a normalização do identificador. A suíte adicional cobre os links, a data, os campos opcionais do detalhe, a chamada de autor e os erros de API. Ela **não** cobre todos os fluxos nem certifica segurança. O CI executa a suíte com PHP 8.3 a cada PR.

## Publicação e rollback

O deploy desta etapa requer PHP 8.3+, `composer install --no-dev`, `.env` com `APP_KEY`/`APP_DEBUG=false` e `php artisan config:cache`; não há schema novo. A mudança não altera as configurações antigas de sessão nem os dados. Para voltar, reverta a PR, instale as dependências do `composer.lock` anterior, limpe o cache com `php artisan config:clear` e restaure o runtime PHP anterior se necessário. Nenhuma migração de dados é executada.

---

<p align="center"><a href="https://github.com/LuisInacioDasilva"><img src="https://avatars.githubusercontent.com/u/88007376?v=4" width="82" height="82" alt="Foto de Luis da Silva"></a></p>
<p align="center"><strong>Desenvolvido por Luis da Silva</strong><br>Back-end, dados, integrações e automação.</p>
