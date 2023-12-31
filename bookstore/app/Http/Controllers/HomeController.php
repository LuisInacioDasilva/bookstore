<?php

namespace App\Http\Controllers;


use App\Models\Entradas\BuscaCategoriaLivrosE;
use App\Models\Entradas\BuscaLivroE;
use App\Models\Services\BuscaCategoriaLivrosService;
use App\Models\Services\BuscaLivroService;
use App\Models\Services\ListarCategoriasService;



use App\Models\Services\ConsultaLivrosService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ListaLivrosHome(Request $request)
    {
        try {

            $processador = new ConsultaLivrosService();
            $processador->Processar();
            $dados = $processador->saida;

            return view('home', compact('dados'));
        } catch (\Exception $ex) {
            return $ex;
        }
    }


    public function getBuscaLivro(Request $request)
    {

        try {

            $processador = new BuscaLivroService(new BuscaLivroE($request));
            $processador->Processar();
            $dados = $processador->saida;

            return view('info-livro', compact('dados'));
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function postBuscaCategoria(Request $request)
    {

        try {

            $processador = new BuscaCategoriaLivrosService(new BuscaCategoriaLivrosE($request));
            $processador->Processar();
            return $processador->saida;


        } catch (\Exception $ex) {
            return $ex;
        }
    }
}
