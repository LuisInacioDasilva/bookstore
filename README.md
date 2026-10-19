<p align="center"><img src="assets/hero.svg" alt="Bookstore Discovery — acervo em movimento" width="100%"></p>

# Bookstore Discovery

Um catálogo para encontrar a próxima leitura, sem fingir que é uma loja. Busco metadados públicos na Open Library, normalizo as respostas na aplicação e entrego uma interface própria, responsiva e acessível. O projeto começou em 2023 como um estudo de catálogo; esta versão mantém a ideia original e a transforma em uma aplicação apresentável, testada e mais preparada para falhas da fonte externa.

**Experimente:** clone, rode localmente e abra `/`. Busque por título, autor ou assunto; filtre por tema e abra a ficha de uma obra. Não é necessário cadastrar conta nem configurar banco de dados.

## O que está implementado

- Busca com filtros e paginação; fichas com descrição, assuntos, capa e acesso à fonte original.
- Gateway HTTP com tempo limite, retry seletivo, cache de seis horas e última resposta válida por dois dias. Quando a fonte falha, uma consulta já conhecida continua acessível com aviso visual; sem cache, a aplicação retorna 503 sem vazar detalhes internos.
- IDs da Open Library validados antes da chamada externa, consultas limitadas e respostas filtradas antes da renderização.
- Layout responsivo com navegação por teclado, foco visível e animações desativadas quando o sistema pede menos movimento.
- Rotas legadas preservadas, com redirecionamento para a experiência nova onde cabível. O código legado também foi mantido para facilitar a comparação e o rollback.
- Testes de caracterização do comportamento anterior e testes novos para busca, cache, falha da fonte, HTML escapado e rotas.

## Arquitetura

```text
Browser → CatalogController → OpenLibraryCatalog → Open Library
                              │
                              └─ cache + última resposta válida
```

O controller cuida de validação e apresentação; o gateway concentra contrato externo, normalização e resiliência. Não há persistência de livros local nem carrinho: isso exigiria outra licença de dados, regras de atualização e um produto diferente.

## Rodar localmente

Requer **PHP 8.3+**, Composer 2 e as extensões padrão exigidas pelo Laravel. Na raiz do repositório:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Abra `http://127.0.0.1:8000`. No Windows, copie `.env.example` para `.env` pelo Explorador ou use `Copy-Item .env.example .env` no PowerShell.

Opcionalmente, defina `OPEN_LIBRARY_CONTACT_EMAIL` no `.env` para identificar o aplicativo no `User-Agent`. Use um e-mail seu, não um valor fixo em código. A interface não depende de build JavaScript.

```bash
php artisan test
composer validate --strict
```

Os testes HTTP simulam a Open Library e, portanto, não dependem de conexão externa. A origem real pode oscilar ou limitar acesso; para uso público de alto volume seria necessário respeitar as [diretrizes da API](https://openlibrary.org/developers/api) e acordar uma estratégia de dados apropriada.

## Publicação e rollback

Configure PHP 8.3+, `APP_KEY`, `APP_ENV=production`, `APP_DEBUG=false`, HTTPS e cache persistente (`CACHE_STORE=file` em uma instância ou Redis em múltiplas instâncias) no destino. Execute `composer install --no-dev --prefer-dist --optimize-autoloader`, configure o ambiente e publique o conteúdo de `public/` pelo servidor web. Não exponha `.env` ou a raiz do projeto.

Não há migração de schema nesta versão. Para voltar ao comportamento anterior, reverta o commit da experiência nova e faça novo deploy; o código e as views antigas continuam no repositório. O upgrade de framework para Laravel 13 foi separado em uma PR anterior, justamente para isolar esse risco.

---

<p align="center"><img src="https://github.com/LuisInacioDasilva.png?size=72" alt="Foto de Luis da Silva" width="72" height="72"><br><strong>Luis da Silva</strong><br>Back-end, integrações e produtos que precisam funcionar além da demo.</p>
