<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeticionesController extends Controller
{
    protected  $formulas;/** objeto de formulas controller */
    public function __construct()
    {
        $this->formulas=new FormulasController();
    }

    public function index(){
        $data=['title'=>'PROYECTO'];
        return view('welcome')->with($data);
    }

    public function formInteresCompuesto(){
        $data=['title'=>'INTERES COMPUESTO'];
        return view('interesCompuesto')->with($data);
    }

    public function postInteresCompuesto(Request $request){
        $p=$request->p;

        dd($this->formulas->equivalenciaTasas(0.08,4,12));

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

        $data=['title'=>'AMORTIZACION'];
        return view('amortizacion')->with($data);
    }



    /******************************************************************************/

}
