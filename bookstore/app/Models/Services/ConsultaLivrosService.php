<?php

namespace App\Models\Services;

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


        $categories = ['romance', 'terror'];
        $lista = [];

        $client = new Client();

        foreach ($categories as $category) {
            $query = urlencode("subject:\"$category\"");
            $response = $client->get("https://openlibrary.org/search.json?q={$query}");

            $data = json_decode($response->getBody());

            foreach ($data->docs as $book) {
                if (isset($book->cover_i) && $book->cover_i !== null) {
                    $lista[] = new ConsultaLivrosS($book);
                }
            }
        }

         $this->saida = $lista;

    }
}
