<?php

namespace Tests\Unit;

use App\Models\Entradas\BuscaLivroE;
use App\Models\Saidas\ConsultaLivrosS;
use Illuminate\Http\Request;
use Tests\TestCase;

class LegacyCatalogCharacterizationTest extends TestCase
{
    public function test_catalog_card_keeps_the_current_title_author_and_cover_mapping(): void
    {
        $book = new ConsultaLivrosS((object) [
            'title' => 'Um livro com titulo extenso',
            'author_name' => ['Ana', 'Bruno'],
            'description' => 'Uma descricao bastante extensa',
            'cover_i' => 123,
            'key' => '/works/OL42W',
        ]);

        $this->assertSame('Um livro com titulo ...', $book->titulo);
        $this->assertSame('Ana, Bruno', $book->autores);
        $this->assertSame('Uma descricao bastan...', $book->descricao);
        $this->assertSame('https://covers.openlibrary.org/b/id/123-M.jpg', $book->imagem);
        $this->assertSame('OL42W', $book->id_livro);
    }

    public function test_book_input_trims_the_route_identifier(): void
    {
        $input = new BuscaLivroE(Request::create('/busca-livro/OL42W', 'GET', [
            'id_livro' => '  OL42W  ',
        ]));

        $this->assertSame('OL42W', $input->id_livro);
    }
}
