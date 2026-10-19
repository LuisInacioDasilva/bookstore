<?php

namespace App\Models\Services;

use App\Models\Entradas\BuscaLivroE;
use App\Models\Saidas\BuscaLivroS;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class BuscaLivroService extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "entrada",
        "saida"
    ];


    public function __construct(BuscaLivroE $entrada)
    {
        $this->entrada = $entrada;
    }

    public function Processar()
    {


        $id_livro = $this->entrada->id_livro;

        if (!preg_match('/^OL[0-9]+W$/', $id_livro)) {
            throw new \InvalidArgumentException('Identificador de livro inválido.');
        }

        $client = new Client(['connect_timeout' => 2, 'timeout' => 5]);
        $response = $client->get("https://openlibrary.org/works/{$id_livro}.json");

        $data = json_decode($response->getBody());

        if (!is_object($data) || !isset($data->key)) {
            throw new \UnexpectedValueException('Resposta de livro inválida.');
        }

         $dados = new BuscaLivroS($data, $client);

        $this->saida = $dados;


    }
}

