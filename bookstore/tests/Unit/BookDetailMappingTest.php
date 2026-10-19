<?php

namespace Tests\Unit;

use App\Models\Saidas\BuscaLivroS;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class BookDetailMappingTest extends TestCase
{
    public function test_work_payload_reuses_cover_and_description_and_fetches_only_author(): void
    {
        $requests = [];
        $handler = new MockHandler([new Response(200, [], '{"name":"Ana"}')]);
        $stack = HandlerStack::create($handler);
        $stack->push(Middleware::history($requests));

        $book = new BuscaLivroS((object) [
            'title' => 'Livro teste',
            'key' => '/works/OL42W',
            'authors' => [(object) ['author' => (object) ['key' => '/authors/OL7A']]],
            'covers' => [123],
            'description' => (object) ['value' => 'Descrição teste'],
        ], new Client(['handler' => $stack]));

        $this->assertSame('Ana', $book->autor);
        $this->assertSame('https://covers.openlibrary.org/b/id/123-L.jpg', $book->imagem);
        $this->assertSame('Descrição teste', $book->descricao_livro);
        $this->assertSame('OL42W', $book->id_livro);
        $this->assertCount(1, $requests);
        $this->assertSame('/authors/OL7A.json', $requests[0]['request']->getUri()->getPath());
    }

    public function test_missing_optional_fields_do_not_trigger_requests(): void
    {
        $book = new BuscaLivroS((object) [
            'title' => 'Sem metadados',
            'key' => '/works/OL42W',
        ], new Client(['handler' => new MockHandler([])]));

        $this->assertSame('Autor Desconhecido', $book->autor);
        $this->assertSame('URL da Imagem Indisponível', $book->imagem);
        $this->assertSame('Descrição Indisponível', $book->descricao_livro);
    }
}
