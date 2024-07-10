<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UtilController extends Controller
{

    /**
     * Retorna todas as cidades de um determinado estado
     * 
     * @param  Request $request
     * @param State $state
     * 
     * @return void
     */
    public function cities(Request $request, State $state){
        return City::where('state_id', $state->id)->get();
    }


        /**
     * Busca CEP via api VIACEP
     */
    public function buscarCep(Request $request)
    {
        $cep = Util::apenasNumeros($request->get('cep'));
        if ($cep) {
            $response = Http::get('https://viacep.com.br/ws/' . $cep . '/json/')->json();
            if ($response) {
                //estado
                $estado = State::where('abbr', $response['uf'])->first();
                //cidade
                $cidade = City::where('name', $response['localidade'])->where('state_id', $estado->id)->first();
                $data = [
                    'logradouro' => $response['logradouro'],
                    'complemento' => $response['complemento'],
                    'bairro' => $response['bairro'],
                    'estado_id' => $estado->id,
                    'cidade_id' => $cidade->id,
                    'estado' => $estado->name,
                    'uf'     => $estado->abbr,
                    'cidade' => $cidade->name
                ];
                return ['erro' => 0, 'info' => $data];
            } else {
                return ['erro' => 1];
            }
        } else {
            return ['erro' => 1];
        }
    }
}
