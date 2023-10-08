<?php

namespace App\Models\Saidas;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class BuscaLivroS extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        ""
    ];

    public function __construct($saida = null){
        if($saida == null){return;}



    $this->titulo = isset($saida->title) ? trim($saida->title) : '';
    $this->data_publicacao = isset($saida->first_publish_date) ? trim($saida->first_publish_date) : '';
    $this->autor = $this->BuscaAutor($saida->authors[0]->author->key);
    $this->assuntos = isset($saida->subjects) ? implode(', ', $saida->subjects) : '';
    $this->id_livro =  str_replace("/works/", '', $saida->key);
    $this->imagem   =  $this->BuscaImagemLivro($this->id_livro);
    $this->descricao_livro =  $this->BuscaDescricaoLivro($this->id_livro);


    }

    private function BuscaAutor($id_autor){
        $client = new Client();

        try {
            $response = $client->get("https://openlibrary.org/authors/{$id_autor}.json");
            $autor_data = json_decode($response->getBody());

            return isset($autor_data->name) ? $autor_data->name : 'Autor Desconhecido';
        } catch (ClientException $e) {
            // Trate o erro, por exemplo, retornando 'Autor Desconhecido' em caso de erro
            return 'Autor Desconhecido';
        }
    }

    private function BuscaImagemLivro($id_livro){
        $client = new Client();

        try {
            $response = $client->get("https://openlibrary.org/works/{$id_livro}.json");
            $livro_data = json_decode($response->getBody());

            if (isset($livro_data->covers[0])) {
                // A URL da capa do livro pode ser construída a partir do cover ID
                $coverId = $livro_data->covers[0];
                $imagem_url = "https://covers.openlibrary.org/b/id/{$coverId}-L.jpg";
                return $imagem_url;
            } else {
                return 'URL da Imagem Indisponível';
            }
        } catch (ClientException $e) {
            return 'URL da Imagem Indisponível';
        }
    }

    private function BuscaDescricaoLivro($id_livro){
        $client = new Client();

        try {
            $response = $client->get("https://openlibrary.org/works/{$id_livro}.json");
            $livro_data = json_decode($response->getBody());

            if (isset($livro_data->description)) {
                return $livro_data->description;
            } else {
                return 'Descrição Indisponível';
            }
        } catch (ClientException $e) {
            // Trate o erro, por exemplo, retornando 'Descrição Indisponível' em caso de erro
            return 'Descrição Indisponível';
        }
    }
}
