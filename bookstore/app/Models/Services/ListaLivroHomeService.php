<?php

namespace App\Models\Services;

use App\Models\Entradas\ListaLivroHomeE;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class ListaLivroHomeService extends Model
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

    public function __construct(ListaLivroHomeE $entrada)
    {
        $this->entrada = $entrada;
    }

    public function Processar()
    {
      // Inicialize uma sessão cURL
    $ch = curl_init();

    // Defina a URL da API
    $url = 'http://localhost:8000/api/consult-books';

    // Defina as opções da requisição cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute a requisição cURL
    $response = curl_exec($ch);

    // Verifique se a requisição foi bem-sucedida
    if ($response === false) {
        // Lide com erros de requisição, se necessário
        echo "Erro na requisição: " . curl_error($ch);
    } else {
        // O código para lidar com a resposta bem-sucedida vai aqui
        $livros = json_decode($response, true); // Decodifique a resposta JSON em um array associativo
        print_r($livros);
    }

    // Feche a sessão cURL
    curl_close($ch);
}
}
