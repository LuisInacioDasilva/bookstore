<?php

namespace App\Models\Services;

use App\Models\Entradas\ConsultaCepLivroE;
use App\Models\Saidas\ConsultaCepLivroS;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class ConsultaCepLivroService extends Model
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


    public function __construct(ConsultaCepLivroE $entrada)
    {
        $this->entrada = $entrada;
    }

    public function Processar()
    {


        // Verifique se o CEP foi fornecido
    if (!isset($this->entrada->cep)) {
        $this->saida = "CEP não fornecido.";
    }

    $cep = $this->entrada->cep;

    // Faça a requisição à API ViaCEP
    $client = new Client();
    $response = $client->request('GET', "https://viacep.com.br/ws/{$cep}/json/");

    if ($response->getStatusCode() == 200) {
        $data = json_decode($response->getBody());
        // Verifique se a resposta da API contém os dados esperados
        if (isset($data->logradouro, $data->bairro, $data->localidade, $data->uf)) {
            // Defina os dados obtidos da API ViaCEP na saída
            // $this->saida = [
            //     'logradouro' => $data->logradouro,
            //     'bairro' => $data->bairro,
            //     'cidade' => $data->localidade,
            //     'estado' => $data->uf,
            // ];

            $this->saida = new ConsultaCepLivroS($data);
        } else {
           $this->saida = "Não foi possível obter os dados do CEP {$cep}.";
        }
    } else {
        $this->saida = "Erro ao consultar a API ViaCEP.";
    }
    }
}
