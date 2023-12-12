<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Http\Request;

class Fcontroller extends Controller
{
    public function index(){
        $ficha = FacadesDB::select('select * from ficha', []);

        $instructorcontroller = new instructorcontroller();
        $instructor  = $instructorcontroller->index1();

        $aprendizcontroller = new aprendizcontroller;
        $aprendiz  = $aprendizcontroller->index1();

        return view('welcome', [
            'laficha' => $ficha,
            'elinstructor' => $instructor,
            'elaprendiz' => $aprendiz
        ]);


    }

    public function store(Request $request)
    {
        FacadesDB::insert('insert into `ficha`(`idficha`,`numero`, `lugar`, `instructor_idinstructor`, `aprendiz_idaprendiz`) VALUES (null,?,?,?,?)', [

            $request->numero,
            $request->lugar,
            $request->instructor_idinstructor,
            $request->aprendiz_idaprendiz,
        ]);
        return redirect()->route('ficha');
    }
    public function update(Request $request, string $id)
    {
        FacadesDB::update('update ficha set numero =?,lugar=?,instructor_idinstructor=?,aprendiz_idaprendiz=?  where idficha = ?', [
            $id,
            $request->numero,
            $request->lugar,
            $request->instructor_idinstructor,
            $request->aprendiz_idaprendiz,
        ]);
        return redirect()->route('ficha');
    }
    public function destroy($id)
    {
    FacadesDB::delete('delete from ficha where idficha = ?', [
        $id
    ]);
    return redirect()->route('ficha');
    }
}
