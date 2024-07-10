<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Util extends Model
{
    use HasFactory;

    /**
     * Retorna todos os estados
     * 
     * @return State[]|Collection
     */
    public static function states(){
        return State::all();
    }

    /**
     * Retorna todas as cidades de um determinado estado
     * 
     * @param  State $state
     * 
     * @return mixed
     */
    public static function cities(State $state){
        $cidades = City::where('state_id', $state->id)->get();

        return $cidades;
    }

    /**
     * 
     * Retorna todas as cidades de um id de estado
     * 
     * @param  int $state_id
     * 
     * @return mixed
     */
    public static function citiesByStateId(int $state_id){
        $cidades = City::where('state_id', $state_id)->get();

        return $cidades;
    }

        /**
     * Remove todas as strings mantendo apenas números
     * @param string $string
     * @return string
     */
    public static function apenasNumeros(string $string)
    {
        return preg_replace('/[^0-9]/', '', $string);
    }
    
}
