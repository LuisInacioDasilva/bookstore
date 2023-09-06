<?php

namespace App\Http\Controllers;

use App\Models\Entradas\ConsultaLivrosE;
use App\Models\Entradas\ListaLivroHomeE;
use App\Models\Services\ConsultaLivrosService;
use App\Models\Services\ListaLivroHomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ListaLivrosHome(Request $request)
    {
        try {

            $processador = new ListaLivroHomeService( new ListaLivroHomeE($request));
            $processador->Processar();

            return response()
                ->json($processador->saida)
                ->setStatusCode(200);
        } catch (\Exception $ex) {
            return $this->retornarExceptionGenetica($ex);
        }
    }
}
