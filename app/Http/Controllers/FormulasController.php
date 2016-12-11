<?php

namespace App\Http\Controllers;


class FormulasController extends Controller
{

    /*********INTERES**********/

    /**
     * calcula el interes efectivo (i) apartir del interes nominal (j)
     * @param $j - interes nominal(en años)
     * @param $n - periodo de tiempo en el que se aplica el tinteres (mensual=>12,trimestral=>4,semestral=>2, etc..)
     * @return float - interes efectivo
     */
    public function interesEfectivo($j, $n)
    {
        $i = $j / $n;
        /** interes efectivo(en meses) */
        //return $i;
        $data = [
            'i' => $i
        ];
        return view('home')->whit($data);
    }

    /**
     * calcula el interes nominal (j) apartir del interes efectivo (i)
     * @param $i - interes efectivo(en meses)
     * @param $n - periodo de tiempo en el que se aplica el interes (mensual=>12,trimestral=>4,semestral=>2, etc..)
     * @return float - interes nominal
     */
    public function interesNominal($i, $n)
    {
        $j = $i * $n;
        return $j;
    }

    /**
     * calcula el interes complejo
     * @param $p - monto inversion
     * @param $i - interes efectivo(en meses)
     * @param $n - periodo de tiempo en el que se vence la inversion.
     * @param $s - monto final a la entrega del vencimiento
     * @return float - interes complejo
     */
    public function interesComplejo($p, $i, $n, $s)
    {
        if (empty($s) || isset($s) || is_null($s)) {
            $s = $p * (pow((1 + $i), $n));
            return $s;
        } elseif (empty($p) || isset($p) || is_null($p)) {
            $p = $s / (pow((1 + $i), $n));
            return $p;
        }
    }

    /**
     * Convierte la tasa nominal a tasa efectiva
     * @param $j - tasa nominal
     * @param $m - periodo de tiempo (meses, trimestre,semestre, etc)
     * @return float|int $i - retorna el valor de la tasa en tasa efectiva
     */
    public function tasaEfectiva($j, $m)
    {
        return $j / $m;
        /** retorna i - tasa efectiva*/
    }

    /**
     * Convierte la tasa efectiva a tasa nominal
     * @param $i - tasa efectiva
     * @param $n - periodo de tiempo (meses, trimestre,semestre, etc)
     * @return float|int $j - retorna el valor de la tasa en tasa nominal
     */
    public function tasaNominal($i, $n)
    {
        return $i / $n;
        /** retorna j - tasa nominal*/
    }

    /**
     * calcula la equivalencia de 2 tasas, convirtiendo la tasa ingresada a la equivalente en el periodo de tiempo
     * indicado ejem: i1=0,08 n1=trimesral lo convierte al i quivalente en el periodo de tiempo n2 indicado
     * @param $i - interes a convertir
     * @param $n1 - periodo de tiempo de la tasa a convertir
     * @param $n2 - periodo de tiempo a la que se va a convertir la tasa dada
     * @return number - tasa convertida al periodo espesificado
     */
    public function equivalenciaTasas($i, $n1, $n2)
    {
        $interes = pow((1 + $i), $n1);
        $i2 = pow($interes, 1 / $n2) - 1;
        return $i2;
    }



    /*********ANUALIDADES**********/

    public function anualidadesPerpetuas(){
        
    }



    /*********AMORTIZACIÓN**********/


    /*********CAPITALIZACION**********/


    /*********GRADIENTES**********/


}
