<?php

namespace App\Http\Controllers;


class FormulasController extends Controller
{

    /*********INTERES**********/

    /**
     * Convierte la tasa nominal a tasa efectiva
     * @param $j - tasa nominal
     * @param $m - periodo de tiempo (meses, trimestre,semestre, etc)
     * @return float|int $i - retorna el valor de la tasa en tasa efectiva
     */
    public function tasaEfectiva($j, $m)
    {
        return $j/$m;
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
        return $i * $n;
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

    /**
     * calcula el interes compuesto
     * @param $p- monto inversion
     * @param $i- tasa efectivo(en meses)
     * @param $n- periodo de tiempo en el que se vence la inversion.
     * @param $s- monto final a la entrega del vencimiento
     * @return float - interes complejo
     */
    public function interesCompuesto($p, $i, $n)
    {
        $s = $p * (pow((1 + $i), $n));
        return $s;
    }
    /**
     * calcula el monto de invercion (p), teniendo el monto final s al termino del periodo de tiempo total,
     * esto se calcula apartir de la formula de interes compuesto
     * @param $s- monto final a la entrega del vencimiento
     * @param $i- tasa efectivo(en meses)
     * @param $n- periodo de tiempo en el que se vence la inversion.
     * @return float - monto inversion
    */
    public function montoInvercion($s,$i,$n){
        $p = $s/(pow((1+$i),$n));
        return $p;
    }





    /*********ANUALIDADES**********/
    /**
     * Calcula el monto de invercion (Vp) o el redito (r) de anualidades
     * @param $Vp - Valor presente
     * @param $redito - Redito o cuota
     * @param $i- tasa efectivo(en meses)
     * @param $n- periodo de tiempo en el que se vence el prestamo.
     * @return float - redito o monto anual.
     */
    public function anualidadesDiferidasRedito($interes,$valorTotal,$numeroPagos){
        $numeroPagos = -$numeroPagos;
            $resultado = $valorTotal/((1 - pow((1+$interes),$numeroPagos))/$interes);
            return $resultado;
    }

    public function anualidadesDiferidasValorPresente($interes,$redito,$numeroPagos){
        $resultado = 0;

        //dd("interes: ".$interes."redito".$redito."numeroPagos".$numeroPagos);
        $numeroPagos = -$numeroPagos;
        $resultado =  $redito * ((1 - pow((1+$interes),$numeroPagos))/$interes);
        return $resultado;
    }

    /******************************************/

    public function anualidadAnticipada($interes,$redito,$numeroPagos){
    $numeroPagos = -$numeroPagos;
    dd($interes."//".$redito."//".$numeroPagos);
        dd((1 - pow((1+$interes),$numeroPagos)));
    $resultado =  $redito * ((1 - pow((1+$interes),$numeroPagos))/$interes)*(1+$interes);
        dd($resultado);
    return $resultado;
}

    public function anualidadAnticipadaRedito($interes,$valorTotal,$numeroPagos){
        $numeroPagos = -$numeroPagos;
        dd($interes."//".$valorTotal."//".$numeroPagos);
        $resultado = $valorTotal/(((1 - pow((1+$interes),$numeroPagos))/$interes)* (1+$interes));
        return $resultado;
    }

    public function anualidadDiferida($interes,$redito,$numeroPagos){
        $numeroPagos = -$numeroPagos;
        dd($interes."//".$redito."//".$numeroPagos);
        $resultado =  $redito * ((pow((1+$interes),$numeroPagos) - 1)/$interes);
        return $resultado;
    }

    public function anualidadDiferidaRedito($interes,$valorTotal,$numeroPagos){
        $numeroPagos = -$numeroPagos;
        dd($interes."//".$valorTotal."//".$numeroPagos);
        $resultado = $valorTotal/((pow((1+$interes),$numeroPagos)-1)/$interes);
        return $resultado;
    }

    /******************************************/

    /*********AMORTIZACIÓN**********/

    public function amortizacion($monto,$i,$n){
        $tablas=array();
        $saldo=$monto;
        $cuota = $this->calcularCuota($monto,$i,$n);
        for($a=0;$a<=$n;$a++):
            $interes=$saldo*$i;
            $amortizacion=$cuota-$interes;
            if($a==0):
                $tablas[]=(object)[
                    'periodo'=>$a,
                    'saldo'=>$monto,
                    'interes'=>'',
                    'cuota'=>'',
                    'amortCapi'=>'',
                ];
            else:
                $saldo=$saldo-$amortizacion;
                $tablas[]=(object)[
                    'periodo'=>$a,
                    'saldo'=>number_format($saldo,3,',','.'),
                    'interes'=>number_format($interes,3,',','.'),
                    'cuota'=>number_format($cuota,3,',','.'),
                    'amortCapi'=>number_format($amortizacion,3,',','.'),
                ];
            endif;
        endfor;
        return $tablas;
    }

    public function calcularCuota($monto,$i,$n){
        $divisor=1-pow((1+$i),(-$n));
        return $monto*($i/$divisor);
    }

    /*********CAPITALIZACION**********/
    public function capitalizacion($monto,$i,$n){
        $tablas=array();
        $cuota = $this->calcularCuotaCapi($monto,$i,$n);
        $saldo=$cuota;
        $capitalizacion=$cuota;
        for($a=0;$a<=$n;$a++):
            $interes=$saldo*$i;
            if($a==0):
                $tablas[]=(object)[
                    'periodo'=>$a,
                    'saldo'=>number_format($saldo,3,',','.'),
                    'interes'=>0,
                    'cuota'=>number_format($cuota,3,',','.'),
                    'amortCapi'=>number_format($capitalizacion,3,',','.'),
                ];
            else:
                $saldo=$saldo+$capitalizacion;
                $capitalizacion=$cuota+$interes;
                $tablas[]=(object)[
                    'periodo'=>$a,
                    'saldo'=>number_format($saldo,3,',','.'),
                    'interes'=>number_format($interes,3,',','.'),
                    'cuota'=>number_format($cuota,3,',','.'),
                    'amortCapi'=>number_format($capitalizacion,3,',','.'),
                ];
            endif;
        endfor;
        return $tablas;
    }

    public function calcularCuotaCapi($monto,$i,$n){
        $divisor=pow((1+$i),$n)-1;
        return $monto/($divisor/$i);
    }

    /*********GRADIENTES**********/


}
