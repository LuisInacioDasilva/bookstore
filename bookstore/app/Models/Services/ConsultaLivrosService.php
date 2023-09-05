<?php

namespace App\Models\Services;
use Illuminate\Database\Eloquent\Model;
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
        echo "teste";
    }
}
