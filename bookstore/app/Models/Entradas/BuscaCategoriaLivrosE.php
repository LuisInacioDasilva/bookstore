<?php

namespace App\Models\Entradas;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BuscaCategoriaLivrosE extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    public function __construct(Request $entrada)
    {
        $this->categoria              = trim($entrada->categoria);

    }

}
