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
       //return $i;
        $data=[
            'i'=>$i
        ];
        return view('home')->whit($data);
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

    /**
     * calcula el interes complejo
     * @param $p- monto inversion
     * @param $i- interes efectivo(en meses)
     * @param $n- periodo de tiempo en el que se vence la inversion.
     * @param $s- monto final a la entrega del vencimiento
     * @return float - interes complejo
     */
    public function interesComplejo( $p,$i,$n,$s){
        if(empty($s)||isset($s)||is_null($s)){
            $s = $p*(pow((1+$i),$n));
            return $s;
        }elseif(empty($p)||isset($p)||is_null($p)){
            $p = $s/(pow((1+$i),$n));
            return $p;
        }
    }

    /**
     * calcula la equivalencia de tasas
     * @param $f- frecuencia (trimestral, anual, mensual, diaria, etc)
     * @param $i- interes efectivo(en meses)
     * @param $n- periodo de tiempo (en meses)
     * @param $i1- interes efectivo($f- frecuencia)
     * @param $n1- periodo de tiempo ($f- frecuencia)
     * @return float - interes
     */
    /*public function equivalenciaTasas( $f,$i,$n,$i1,$n1){
        $n1 = $n/$f;
        $i= (pow((1+$i1),(12/$n1)))-1;
        return $i;

    }*/


}
