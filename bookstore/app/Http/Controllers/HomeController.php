<?php

namespace App\Http\Controllers;

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
}
