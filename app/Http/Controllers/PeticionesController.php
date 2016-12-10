<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeticionesController extends Controller
{
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

        dd($p);

        $data=['title'=>'INTERES COMPUESTO'];
        return view('interesCompuesto')->with($data);
    }

}
