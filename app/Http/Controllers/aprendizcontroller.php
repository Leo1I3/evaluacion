<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB as FacadesDB;

class aprendizcontroller extends Controller
{
    public function index()
    {
        $aprendiz = FacadesDB::select('select * from aprendiz', []);

        return view('aprendiz', [
            'elaprendiz' => $aprendiz
        ]);
    }
    public function index1(){
        $elaprendiz = FacadesDB::select('select * from aprendiz', []);
        return $elaprendiz;
    }

}
