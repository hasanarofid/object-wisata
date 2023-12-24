<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Kriteria::get();
        return view('admin.kriteria.index',compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'unique' => 'Kolom :attribute sudah ada sebelumnya.',
            // Tambahkan pesan lainnya sesuai kebutuhan Anda
        ];
    
        $request->validate([
            'nama' => 'required|unique:kriteria|max:255',
            // tambahkan validasi lainnya sesuai kebutuhan
        ], $messages);
        if(!empty($request->id)){
            $model = Kriteria::find($request->id);
        }else{
            $model = new Kriteria();
        }
        $model->nama_kriteria = $request->nama_kriteria;
        $model->tipe_kriteria = $request->tipe_kriteria;
        $model->skala_prioritas = $request->skala_prioritas;
        $model->save();
        
        return redirect()->route('kriteria.index')->with('success', 'Kriteria created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Kriteria::find($id);
        return view('admin.kriteria.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Kriteria::find($id);
        return view('admin.kriteria.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Kriteria::find($id)->delete();


        return redirect()->route('kriteria.index')->with('success', 'kriteria created deleted');

    }
}
