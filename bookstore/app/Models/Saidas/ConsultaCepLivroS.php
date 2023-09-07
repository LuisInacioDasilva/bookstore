<?php

namespace App\Models\Saidas;

use Illuminate\Database\Eloquent\Model;

class ConsultaCepLivroS extends Model
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

        $this->logradouro       = trim($saida->logradouro);
        $this->bairro           = trim($saida->bairro);
        $this->cidade           = trim($saida->localidade);
        $this->estado           = trim($saida->uf);

    }
}
