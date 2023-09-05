<?php

namespace App\Http\Controllers;

use App\Models\Services\ConsultaLivrosService;
use Illuminate\Http\Request;

class ConsultaApiController extends Controller
{

    public function ConsultaLivros(Request $request)
    {
        try {

            $processador = new ConsultaLivrosService();
            $processador->Processar();

            return response()
                ->json($processador->saida)
                ->setStatusCode(200);
        } catch (\Exception $ex) {
            return $this->retornarExceptionGenetica($ex);
        }
    }
}
