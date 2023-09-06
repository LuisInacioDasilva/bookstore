<?php

namespace App\Models\Services;

use App\Models\Entradas\ConsultaLivrosE;
use App\Models\Saidas\ConsultaLivrosS;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class ConsultaLivrosService extends Model
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

   public function __construct()
    {

    }


    public function Processar()
    {

        $query = 'livros';
        $lista = [];

        $client = new Client();
        $response = $client->get("https://openlibrary.org/search.json?q={$query}");

        $data = json_decode($response->getBody());

        foreach ($data->docs as $book) {
            $lista[] = new ConsultaLivrosS($book);
        }


        $this->saida = $lista;

    }
}
