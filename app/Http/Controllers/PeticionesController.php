<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeticionesController extends Controller
{
    protected  $formulas;/** objeto de formulas controller */
    protected $tiempos;/** arreglo que contiene los tiempos segun el tipo de periodo o tasa ejemplo: trimestral=>4 */
    protected $tiposPeriodos;
    protected $tiposTasas;
    public function __construct()
    {
        $this->tiempos=[
            'm'=>12,
            'b'=>6,
            't'=>4,
            's'=>2,
        ];
        $this->tiposPeriodos=[
            'm'=>'Mes',
            'b'=>'Bimestres',
            't'=>'Trimestres',
            's'=>'Semestres',
        ];
        $this->tiposTasas=[
            'em'=>'Efectiva Mensual',
            'eb'=>'Efectiva Bimestral',
            'et'=>'Efectiva Trimestral',
            'es'=>'Efectiva Semestral',
            'nm'=>'Nominal Mensual',
            'nb'=>'Nominal Bimestral',
            'nt'=>'Nominal Trimestral',
            'ns'=>'Nominal Semestral',
        ];
        $this->formulas=new FormulasController();
    }

    /**
     * verifica la tasa y hace las converciones pertinentes,
     * si se nesecita pasar de anual a efectiva, equivalencia de tasas
     * @param Request $request
     * @return float|int|number - retorna la tasa verificada y si es el caso recalculada
     */
    public function verificarTasa(Request $request){
        $tasa=str_replace(',','.',$request->tasa)/100;
        /**determino si la tasa es nominal o efectiva, si es nominal se convierte a efectiva*/
        if(substr($request->tipTasa,0,1)=='n'):
            $i=$this->formulas->tasaEfectiva($tasa,$this->tiempos[$request->tipoPeriodo]);
        else:
            $i=$tasa;
        endif;
        /** se determina si los periodos de cobros estan en unidades de tiempo diferentes a las del interes
         * ejemplo si el periodo de cobro es mensual pero el interes se cobra trimestral, se conbierte a interes mensual
         */
        if(substr($request->tipTasa,1,1)!==$request->tipoPeriodo):
            $i=$this->formulas->equivalenciaTasas($i,$this->tiempos[substr($request->tipTasa,1,1)],$this->tiempos[$request->tipoPeriodo]);
        endif;

        return $i;
    }
    public function index(){
        $data=['title'=>'PROYECTO'];
        return view('welcome')->with($data);
    }

    public function formInteresCompuesto(){
        $data=[
            'title'=>'INTERES COMPUESTO',
            'tiposPeriodos'=>$this->tiposPeriodos,
            'tiposTasas'=>$this->tiposTasas
        ];
        return view('interesCompuesto')->with($data);
    }

    public function postInteresCompuesto(Request $request){
        $this->validate($request,[
            'periodo'=>'required',
            'tasa'=>'required'
        ]);
        $i=$this->verificarTasa($request);
        if($request->calcular==0):
            $this->validate($request,['capital'=>'required']);
            $interesCompuesto=$this->formulas->interesCompuesto($this->cleanDataNumeric($request->capital),$i,$request->periodo);
            $respuesta='El capital total es de '.number_format($interesCompuesto,3,',','.');
        else:
            $this->validate($request,['capitalTotal'=>'required']);
            $interesCompuesto=$this->formulas->montoInvercion($this->cleanDataNumeric($request->capitalTotal),$i,$request->periodo);
            $respuesta='El el capital por periodo es de  '.number_format($interesCompuesto,3,',','.');
        endif;

        //dd($interesCompuesto);

        $data=[
            'title'=>'INTERES COMPUESTO',
            'respuesta'=>$respuesta,
            'datos'=>(object)[
                "calcular" =>$request->calcular,
                "capitalTotal" =>$request->capitalTotal,
                "capital" =>$request->capital,
                "periodo" =>$request->periodo,
                "tipoPeriodo" =>$request->tipoPeriodo,
                "tasa" =>$request->tasa,
                "tipTasa" =>$request->tipTasa
            ],
            'tiposPeriodos'=>$this->tiposPeriodos,
            'tiposTasas'=>$this->tiposTasas
        ];
        return view('interesCompuesto')->with($data);
    }


    /******************************************************************************/

    public function formAnualidades(){
        $data=[
            'title'=>'ANUALIDADES',
            'tiposPeriodos'=>$this->tiposPeriodos,
            'tiposTasas'=>$this->tiposTasas
        ];
        return view('anualidades')->with($data);
    }

    public function postAnualidades(Request $request){
        //$p=$request->p;

        //dd($this->formulas->equivalenciaTasas(0.08,4,12));

        $i=$this->verificarTasa($request);

        $anualidad = $this->formulas->anualidadesDiferidas(null,null,$i,$request->valorTotal,$request->redito,$request->periodo,null);
        $data=[
            'title'=>'ANUALIDADES',
            'datos'=>(object)[
                "anualidad" =>$anualidad,
                "cuotaActual" =>$request->redito,
                //"interes" =>$request->interes,
                "numeroPagos" =>$request->periodo,
                "tasa" =>$request->tasa,
                "tipTasa" =>$request->tipTasa
                ],
            'tiposPeriodos'=>$this->tiposPeriodos,
            'tiposTasas'=>$this->tiposTasas
        ];
        return view('anualidades')->with($data);
    }

    public function formAmortizacion(){
        $data=[
            'title'=>'AMORTIZACION',
            'tiposPeriodos'=>$this->tiposPeriodos,
            'tiposTasas'=>$this->tiposTasas
        ];
        return view('amortizacion')->with($data);
    }

    public function postAmortizacion(Request $request){
        $this->validate($request,[
            'periodo'=>'required',
            'tasa'=>'required'
        ]);
        $i=$this->verificarTasa($request);
        if ($request->calcular==0):
            $tablas=$this->formulas->amortizacion($request->monto,$i,$request->periodo);
        else:
            $tablas=$this->formulas->capitalizacion($request->monto,$i,$request->periodo);
        endif;
        $data=[
            'title'=>'AMORTIZACION',
            'datosTabla'=>$tablas,
            'datos'=>(object)[
                "calcular" =>$request->calcular,
                "monto" =>$request->monto,
                "periodo" =>$request->periodo,
                "tipoPeriodo" =>$request->tipoPeriodo,
                "tasa" =>$request->tasa,
                "tipTasa" =>$request->tipTasa
            ],
            'tiposPeriodos'=>$this->tiposPeriodos,
            'tiposTasas'=>$this->tiposTasas
        ];
        return view('amortizacion')->with($data);
    }

    public function formGradientes(){
        $data=[
            'title'=>'GRADIENTES'];
        return view('gradientes')->with($data);
    }

    public function postGradientes(Request $request){
        //$p=$request->p;

        //dd($this->formulas->equivalenciaTasas(0.08,4,12));

        $data=['title'=>'GRADIENTES'];
        return view('gradientes')->with($data);
    }



    /******************************************************************************/

}
