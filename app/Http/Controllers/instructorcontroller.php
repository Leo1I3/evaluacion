<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB as FacadesDB;

class instructorcontroller extends Controller
{
    public function index()
    {
        $instructor = FacadesDB::select('select * from instructor', []);

        return view('instructor', [
            'elinstructor' => $instructor
        ]);
    }
    
    public function index1(){
        $elinstructor = FacadesDB::select('select * from instructor', []);
        return $elinstructor;
    }

}
