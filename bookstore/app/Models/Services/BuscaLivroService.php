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

        $client = new Client();
        $response = $client->get("https://openlibrary.org/works/{$id_livro}.json");

        $data = json_decode($response->getBody());

         $dados = new BuscaLivroS($data);

        $this->saida = $dados;


    }
}
