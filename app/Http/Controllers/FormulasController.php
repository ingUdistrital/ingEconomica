<?php

namespace App\Http\Controllers;


class FormulasController extends Controller
{
    /**
     * calcula el interes efectivo (i) apartir del interes nominal (j)
     * @param $j- interes nominal(en años)
     * @param $n- periodo de tiempo en el que se aplica el tinteres (mensual=>12,trimestral=>4,semestral=>2, etc..)
     * @return float - interes efectivo
     */
    public function interesEfectivo($j,$n){
        $i=$j/$n;/** interes efectivo(en meses) */
        return $i;
    }
    /**
     * calcula el interes nominal (j) apartir del interes efectivo (i)
     * @param $i- interes efectivo(en meses)
     * @param $n- periodo de tiempo en el que se aplica el interes (mensual=>12,trimestral=>4,semestral=>2, etc..)
     * @return float - interes nominal
     */
    public function interesNominal($i,$n){
        $j=$i*$n;
        return $j;
    }
}
