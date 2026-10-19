<?php

namespace App\Models\Services;

use App\Models\Entradas\BuscaCategoriaLivrosE;
use App\Models\Saidas\ConsultaLivrosS;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class BuscaCategoriaLivrosService extends Model
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


    public function __construct(BuscaCategoriaLivrosE $entrada)
    {
        $this->entrada = $entrada;
    }

    public function Processar()
    {


        $categories = [$this->entrada->categoria];
        $lista = [];

        $client = new Client(['connect_timeout' => 2, 'timeout' => 5]);

        foreach ($categories as $category) {
            $query = urlencode("subject:\"$category\"");
            $baseUrl = rtrim(config('services.open_library.base_url'), '/');
            $response = $client->get("{$baseUrl}/search.json?q={$query}");

            $data = json_decode($response->getBody());

            foreach (is_array($data->docs ?? null) ? $data->docs : [] as $book) {
                if (isset($book->cover_i) && $book->cover_i !== null) {
                    $lista[] = new ConsultaLivrosS($book);
                }
            }
        }

         $this->saida = $lista;
    }
}
