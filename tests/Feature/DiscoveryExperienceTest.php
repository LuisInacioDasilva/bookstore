<?php

namespace Tests\Feature;

use App\Services\OpenLibraryCatalog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DiscoveryExperienceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Cache::flush();
        Http::preventStrayRequests();
    }

    public function test_search_renders_normalized_books_and_ignores_invalid_records(): void
    {
        Http::fake(['openlibrary.org/search.json*' => Http::response([
            'numFound' => 2,
            'docs' => [
                ['key' => '/works/OL42W', 'title' => 'O Jardim', 'author_name' => ['Ana'], 'first_publish_year' => 1998],
                ['key' => '/authors/OL77A', 'title' => 'Registro inválido'],
            ],
        ])]);

        $this->get('/?q=Jardim')
            ->assertOk()
            ->assertSee('O Jardim')
            ->assertSee('Ana')
            ->assertSee('SEM CAPA')
            ->assertSee('/busca-livro/OL42W', false)
            ->assertDontSee('Registro inválido');

        Http::assertSentCount(1);
    }

    public function test_repeated_search_uses_cache_without_a_second_upstream_request(): void
    {
        Http::fake(['openlibrary.org/search.json*' => Http::response(['numFound' => 0, 'docs' => []])]);

        $this->get('/?tema=fantasia')->assertOk();
        $this->get('/?tema=fantasia')->assertOk();

        Http::assertSentCount(1);
    }

    public function test_last_good_snapshot_is_used_when_upstream_fails(): void
    {
        $query = 'cache-probe';
        Http::fake(['openlibrary.org/search.json*' => Http::sequence()
            ->push(['numFound' => 1, 'docs' => [['key' => '/works/OL42W', 'title' => 'Livro salvo']]])
            ->push('Indisponível', 429)]);

        app(OpenLibraryCatalog::class)->search($query);
        Cache::forget('open-library:search:'.sha1($query.'|1'));
        $result = app(OpenLibraryCatalog::class)->search($query);

        $this->assertTrue($result['stale']);
        $this->assertSame('Livro salvo', $result['books'][0]->titulo);
    }

    public function test_work_page_uses_validated_identifier_and_safe_external_link(): void
    {
        Http::fake(['openlibrary.org/works/OL42W.json' => Http::response([
            'key' => '/works/OL42W',
            'title' => 'A Obra',
            'description' => ['value' => '<script>alert(1)</script>'],
            'first_publish_date' => '2001',
            'subjects' => ['Ficção'],
        ])]);

        $this->get('/busca-livro/OL42W')
            ->assertOk()
            ->assertSee('A Obra')
            ->assertSee('2001')
            ->assertSee('&lt;script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false)
            ->assertSee('https://openlibrary.org/works/OL42W', false);

        $this->get('/busca-livro/OL42W%2Fedit')->assertNotFound();
        Http::assertSentCount(1);
    }

    public function test_invalid_filters_are_rejected_before_upstream_access(): void
    {
        $this->get('/?tema=qualquer')->assertSessionHasErrors('tema');
        $this->get('/?page=101')->assertSessionHasErrors('page');
        Http::assertNothingSent();
    }

    public function test_legacy_category_redirects_to_the_new_catalog(): void
    {
        $this->get('/busca-categoria?categoria=fantasia')
            ->assertRedirect(route('home', ['tema' => 'fantasia']))
            ->assertStatus(301);
    }
}
