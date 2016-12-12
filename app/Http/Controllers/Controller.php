<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     *limpia un dato numerio de cualquier tipo de dato que no sea numerico
     */
    public function cleanDataNumeric($data){
        $data=preg_replace("/\D/",'',$data);
        return $data;
    }
}
