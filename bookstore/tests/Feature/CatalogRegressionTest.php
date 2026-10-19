<?php

namespace Tests\Feature;

use Tests\TestCase;

class CatalogRegressionTest extends TestCase
{
    public function test_catalog_detail_link_uses_the_application_route(): void
    {
        $html = view('home', ['dados' => [(object) [
            'titulo' => 'Livro teste',
            'autores' => 'Ana',
            'descricao' => 'Descrição teste',
            'imagem' => 'https://example.test/cover.jpg',
            'id_livro' => 'OL42W',
        ]]])->render();

        $this->assertStringContainsString(route('busca-livro', 'OL42W'), $html);
        $this->assertStringNotContainsString('http://127.0.0.1:8000/busca-livro/', $html);
    }

    public function test_book_detail_displays_known_publication_date(): void
    {
        $html = view('info-livro', ['dados' => (object) [
            'titulo' => 'Livro teste',
            'autor' => 'Ana',
            'descricao_livro' => 'Descrição teste',
            'imagem' => 'https://example.test/cover.jpg',
            'data_publicacao' => '2001',
            'assuntos' => 'Computação',
        ]])->render();

        $this->assertStringContainsString('2001', $html);
        $this->assertStringNotContainsString('Sem informações de data', $html);
    }

    public function test_invalid_open_library_identifier_is_rejected_before_external_request(): void
    {
        $this->get('/busca-livro/invalido')->assertNotFound();
    }

    public function test_upstream_failure_returns_service_unavailable_without_leaking_exception(): void
    {
        config()->set('services.open_library.base_url', '://invalid');

        $response = $this->get('/');

        $response->assertStatus(503);
        $response->assertDontSee('GuzzleHttp');
    }
}
