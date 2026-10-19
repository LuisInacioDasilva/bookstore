# bookstore

Protótipo histórico de catálogo de livros, iniciado em 2023. Consulta dados da [Open Library](https://openlibrary.org/developers/api) e apresenta listagens e detalhes em Laravel. Mantido público como trabalho anterior, **não como sistema pronto para produção**.

## Estado da revisão

O histórico mostra a integração inicial no commit `fe6615c` e a tela de detalhes no `d0f4aa0`. A exceção devolvida diretamente ao navegador entrou em `7e7a02b`; o mapeamento atual de título, autores, capa e ID foi alterado em `5e817c3`. Não encontrei no histórico uma justificativa para expor exceções ou fazer chamadas externas sem limite de tempo.

A aplicação ainda usa Laravel 9, fora da janela de suporte de segurança. A Open Library é chamada diretamente em controllers/services; há requisições sem timeout e respostas sem validação suficiente. Evite expor este código à internet ou conectar dados sensíveis. A modernização será incremental: primeiro caracterizar o comportamento, depois estabilizar a integração e, em PR separado, atualizar o framework.

## Executar localmente

Requisitos do estado atual: PHP 8.1/8.2, Composer, extensões exigidas pelo `composer.lock` e acesso à Open Library. Dentro de `bookstore/`:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

No PowerShell, use `Copy-Item .env.example .env` no lugar de `cp`. Mantenha `APP_DEBUG=false` se compartilhar a instância na rede. A página principal faz consulta externa em tempo real; uma falha de rede pode interromper a renderização. Não há migração de banco de dados necessária para o catálogo atual.

## Verificação

```bash
cd bookstore
php artisan test
```

Os testes de caracterização fixam o mapeamento atual do cartão de livro e a normalização do identificador. Eles **não** cobrem todos os fluxos nem certificam segurança. O CI executa a suíte a cada PR.

## Publicação e rollback

Publicação somente depois de atualizar a stack, isolar a integração e passar pelos testes. Se uma alteração futura falhar, reverta o PR; este projeto não executa migrações de dados em produção.

---

<p align="center"><a href="https://github.com/LuisInacioDasilva"><img src="https://avatars.githubusercontent.com/u/88007376?v=4" width="82" height="82" alt="Foto de Luis da Silva"></a></p>
<p align="center"><strong>Desenvolvido por Luis da Silva</strong><br>Back-end, dados, integrações e automação.</p>
