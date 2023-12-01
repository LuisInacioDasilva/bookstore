<?php

namespace App\Models\Services;

use App\Models\Entradas\ListarLivroE;
use App\Models\Saidas\ListaLivrosS;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class ListarLivrosService extends Model
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


    public function __construct(ListarLivroE $entrada)
    {
        $this->entrada = $entrada;
    }

    public function Processar()
    {


        $id_livro = $this->entrada->id_livro;

        $client = new Client();
        $response = $client->get("https://openlibrary.org/works/{$id_livro}.json");

        $data = json_decode($response->getBody());

         $dados = new ListaLivrosS($data);

        $this->saida = $dados;


    }
}
