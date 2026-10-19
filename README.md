# bookstore

Protótipo histórico de catálogo de livros, iniciado em 2023. Consulta dados da [Open Library](https://openlibrary.org/developers/api) e apresenta listagens e detalhes em Laravel. Mantido público como trabalho anterior, **não como sistema pronto para produção**.

## Estado da revisão

O histórico mostra a integração inicial no commit `fe6615c` e a tela de detalhes no `d0f4aa0`. A exceção devolvida diretamente ao navegador entrou em `7e7a02b`; o mapeamento atual de título, autores, capa e ID foi alterado em `5e817c3`. Não encontrei no histórico uma justificativa para expor exceções ou fazer chamadas externas sem limite de tempo.

A aplicação ainda usa Laravel 9, fora da janela de suporte de segurança. A primeira correção da integração impõe timeout às requisições, valida o identificador, evita duas consultas repetidas para capa/descrição e não mostra exceções cruas ao visitante. Ainda não há cache, política de retry ou atualização do framework. Evite expor este código à internet ou conectar dados sensíveis antes de completar essa etapa.

## Executar localmente

Requisitos do estado atual: PHP 8.1/8.2, Composer, extensões exigidas pelo `composer.lock` e acesso à Open Library. Dentro de `bookstore/`:

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

Os testes de caracterização fixam o mapeamento do cartão e a normalização do identificador. A suíte adicional cobre os links, a data, os campos opcionais do detalhe, a chamada de autor e os erros de API. Ela **não** cobre todos os fluxos nem certifica segurança. O CI executa a suíte a cada PR.

## Publicação e rollback

Publicação somente depois de atualizar a stack, isolar a integração e passar pelos testes. O deploy requer `composer install --no-dev`, `.env` com `APP_KEY`/`APP_DEBUG=false` e `php artisan config:cache`; não há schema novo. Se o ajuste da integração falhar, reverta o PR e limpe o cache de configuração com `php artisan config:clear`. Nenhuma migração de dados é executada.

---

<p align="center"><a href="https://github.com/LuisInacioDasilva"><img src="https://avatars.githubusercontent.com/u/88007376?v=4" width="82" height="82" alt="Foto de Luis da Silva"></a></p>
<p align="center"><strong>Desenvolvido por Luis da Silva</strong><br>Back-end, dados, integrações e automação.</p>
