<?php

namespace App\Models\Saidas;

use Illuminate\Database\Eloquent\Model;

class ConsultaLivrosS extends Model
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

        $this->titulo       = isset($saida->title) ? (strlen($saida->title) > 20 ? substr($saida->title, 0, 20) . '...' : $saida->title) : 'Título não disponível';
        $this->autores      = isset($saida->author_name) ? implode(', ', $saida->author_name) : 'Autor não disponível';
        $this->descricao    = isset($saida->description) ? (strlen($saida->description) > 20 ? substr($saida->description, 0, 20) . '...' : $saida->description) : 'Descrição não disponível';
        $this->imagem       = isset($saida->cover_i) ? "https://covers.openlibrary.org/b/id/{$saida->cover_i}-M.jpg" : 'Imagem não disponível';
        $this->id_livro     = trim(str_replace("/works/", '', $saida->key));

    }
}
