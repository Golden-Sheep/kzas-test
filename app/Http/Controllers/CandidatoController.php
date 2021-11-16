<?php

namespace App\Http\Controllers;

use App\Candidato;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CandidatoController extends Controller
{
    public function index()
    {
        $candidatos = Candidato::where('status',0)->get();
        return view('candidatos.index')->with(['candidatos' => $candidatos]);
    }


    public function getViewCandidatosPriorizados(){
        $candidatos = Candidato::where('status',1)->get();
        return view('candidatos.priorizados')->with(['candidatos' => $candidatos]);
    }

    public function getViewCandidatosDesconsiderados(){
        $candidatos = Candidato::where('status',2)->get();
        return view('candidatos.desconsiderados')->with(['candidatos' => $candidatos]);
    }


    public function getPriorizarCandidato($id){
        $candidato = Candidato::find($id);
        if($candidato){
            $candidato->status = 1;
            $candidato->save();
        }
        return redirect()->back();
    }

    public function getDesconsiderarCandidato($id){
        $candidato = Candidato::find($id);
        if($candidato){
            $candidato->status = 2;
            $candidato->save();
        }
        return redirect()->back();
    }

}
