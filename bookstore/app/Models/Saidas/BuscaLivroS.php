<?php

namespace App\Models\Saidas;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;

class BuscaLivroS extends Model
{
    protected $fillable = [];

    public function __construct($saida = null, ?ClientInterface $client = null)
    {
        if ($saida === null) {
            return;
        }

        $this->titulo = is_string($saida->title ?? null) ? trim($saida->title) : '';
        $this->data_publicacao = is_string($saida->first_publish_date ?? null)
            ? trim($saida->first_publish_date) : '';
        $this->assuntos = is_array($saida->subjects ?? null)
            ? implode(', ', array_filter($saida->subjects, 'is_string')) : '';
        $this->id_livro = preg_replace('#^/works/#', '', (string) ($saida->key ?? ''));

        $cover = $saida->covers[0] ?? null;
        $this->imagem = is_int($cover) && $cover > 0
            ? "https://covers.openlibrary.org/b/id/{$cover}-L.jpg"
            : 'URL da Imagem Indisponível';

        $description = $saida->description ?? null;
        $this->descricao_livro = is_string($description)
            ? $description
            : (is_string($description->value ?? null) ? $description->value : 'Descrição Indisponível');

        $this->autor = $this->BuscaAutor($saida->authors[0]->author->key ?? null, $client);
    }

    private function BuscaAutor($key, ?ClientInterface $client): string
    {
        if (!is_string($key) || !preg_match('#^/authors/(OL[0-9]+A)$#', $key, $match)) {
            return 'Autor Desconhecido';
        }

        $client = $client ?? new Client(['connect_timeout' => 2, 'timeout' => 5]);

        try {
            $response = $client->request('GET', "https://openlibrary.org/authors/{$match[1]}.json");
            $author = json_decode((string) $response->getBody());

            return is_string($author->name ?? null) ? $author->name : 'Autor Desconhecido';
        } catch (GuzzleException $exception) {
            return 'Autor Desconhecido';
        }
    }
}
