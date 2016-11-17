<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulasController extends Controller
{
    /**
     * calcula el interes efectivo (i) apartir del interes nominal (j)
     * @param $j- interes nominal(en años)
     * @param $n- periodo de tiempo en el que se aplica el tinteres (mensual=>12,trimestral=>4,semestral=>2, etc..)
     * @return float
     */
    public function interesEfectivo($j,$n){
        $i=$j/$n;/** interes efectivo(en meses) */
        return $i;
    }
}
