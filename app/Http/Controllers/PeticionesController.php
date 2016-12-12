<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeticionesController extends Controller
{
    protected  $formulas;/** objeto de formulas controller */
    protected $tiempos;/** arreglo que contiene los tiempos segun el tipo de periodo o tasa ejemplo: trimestral=>4 */
    public function __construct()
    {
        $this->tiempos=[
            'm'=>12,
            'b'=>6,
            't'=>4,
            's'=>2,
            'a'=>1
        ];
        $this->formulas=new FormulasController();
    }

    public function index(){
        $data=['title'=>'PROYECTO'];
        return view('welcome')->with($data);
    }

    public function formInteresCompuesto(){
        $data=[
            'title'=>'INTERES COMPUESTO',
            'tiposPeriodos'=>[
                'm'=>'Mes',
                'b'=>'Bimestres',
                't'=>'Trimestres',
                's'=>'Semestres',
                'a'=>'Años'
            ],
            'tiposTasas'=>[
                'em'=>'Efectiva Mensual',
                'eb'=>'Efectiva Bimestral',
                'et'=>'Efectiva Trimestral',
                'es'=>'Efectiva Semestral',
                'ea'=>'Efectiva Anual',
                'nm'=>'Nominal Mensual',
                'nb'=>'Nominal Bimestral',
                'nt'=>'Nominal Trimestral',
                'ns'=>'Nominal Semestral',
                'na'=>'Nominal Anual',
            ]
        ];
        return view('interesCompuesto')->with($data);
    }

    public function postInteresCompuesto(Request $request){
        /**determino si la tasa es nominal o efectiva, si es nominal se convierte a efectiva*/
        if(substr($request->tipTasa,0,1)=='n'):
            $i=$this->formulas->tasaEfectiva($request->tasa,$request->periodo);
        else:
            $i=$this->tasa;
        endif;
        /** se determina si los periodos de cobros estan en unidades de tiempo diferentes a las del interes
         * ejemplo si el periodo de cobro es mensual pero el interes se cobra trimestral, se conbierte a interes mensual
         */
        if(substr($request->tipTasa,1,1)!==$request->tipoPeriodo):
            $i=$this->formulas->equivalenciaTasas($request->tasa,$this->tiempos[substr($request->tipTasa,1,1)],$this->tiempos[$request->tipoPeriodo]);
        endif;
        $interesCompuesto=$this->formulas->interesCompuesto($request->capital,$i,$request->periodo,null);

        $data=['title'=>'INTERES COMPUESTO'];
        return view('interesCompuesto')->with($data);
    }


    /******************************************************************************/

    public function formAnualidades(){
        $data=['title'=>'ANUALIDADES'];
        return view('anualidades')->with($data);
    }

    public function postAnualidades(Request $request){
        //$p=$request->p;

        //dd($this->formulas->equivalenciaTasas(0.08,4,12));

        $data=['title'=>'ANUALIDADES'];
        return view('anualidades')->with($data);
    }

    public function formAmortizacion(){
        $data=[
            'title'=>'AMORTIZACION'];
        return view('amortizacion')->with($data);
    }

    public function postAmortizacion(Request $request){
        //$p=$request->p;

        //dd($this->formulas->equivalenciaTasas(0.08,4,12));
        $p='datos a mostrar';
        $data=[
            'title'=>'AMORTIZACION',
            'dato1'=>$p
        ];
        return view('amortizacion')->with($data);
    }



    /******************************************************************************/

}
