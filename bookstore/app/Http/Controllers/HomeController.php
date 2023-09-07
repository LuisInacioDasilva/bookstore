<?php

namespace App\Http\Controllers;

use App\Models\Entradas\ConsultaCepLivroE;
use App\Models\Services\ConsultaCepLivroService;
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
            return $this->retornarExceptionGenetica($ex);
        }
    }


    public function ConsultaCep(Request $request)
    {

        try {

            $processador = new ConsultaCepLivroService(new ConsultaCepLivroE($request));
            $processador->Processar();
            return $processador->saida;
        } catch (\Exception $ex) {
            return "Cep não encontrado";
        }
    }
}
