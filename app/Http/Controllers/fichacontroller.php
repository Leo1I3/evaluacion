<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class fichacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        FacadesDB::insert('insert into `ficha`(`idficha`,`numero`, `lugar`,`instructor_idinstructor`,`aprendiz_idaprendiz`) VALUES (null,?,?,?,?)', [

            $request->numero,
            $request->lugar,
            $request->instructor_idinstructor,
            $request->aprendiz_idaprendiz,
        ]);
        return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        FacadesDB::update('update ficha set numero =?,lugar=?,instructor_idinstructor=?,aprendiz_idaprendiz=?  where idficha = ?', [

            $request->numero,
            $request->lugar,
            $request->instructor_idinstructor,
            $request->aprendiz_idaprendiz,
        ]);
        return redirect()->route('inicio');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    FacadesDB::delete('delete from ficha where idficha = ?', []);
    return redirect()->route('inicio');
    }

}
