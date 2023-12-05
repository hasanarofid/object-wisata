<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Pantai;
use App\Models\Wahana;
use Illuminate\Http\Request;

class PantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Pantai::get();
        return view('admin.pantai.index',compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Pantai();
        $fasilitas = Fasilitas::all();
        $wahana = Wahana::all();
        return view('admin.pantai.create',compact('model','fasilitas','wahana'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request->file('gambar'));
        // $image = $request->file('gambar');
        // $imageName = time().'.'.$image->extension();
        // $image->move(public_path('pantai'), $imageName);

        $facilities = $request->input('fasilitas');
        $wahanas = $request->input('wahana');

    // Convert the array of facility IDs to a string
    $fasilitasString = implode(',', $facilities);
    $wahanastring = implode(',', $wahanas);
        // $model = new Pantai();
        // $model->gambar = $imageName;
        // $model->nama = $request->nama;
        // $model->lokasi = $request->lokasi;
        // $model->biaya_masuk = $request->biaya_masuk;
        // $model->latitude = $request->latitude;
        // $model->longitude = $request->longitude;
        // $model->fasilitas = $fasilitasString;
        // $model->wahana = $wahanastring;
        // $model->waktu_operasional = $request->input('jam_awal') .' - '.$request->input('jam_akhir');
        // $model->save();

        $pantai = Pantai::create([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'biaya_masuk' => $request->biaya_masuk,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'fasilitas' => $fasilitasString,
            'wahana' => $wahanastring,
            'waktu_operasional' =>$request->input('jam_awal') .' - '.$request->input('jam_akhir'),
        ]);

        if ($request->hasFile('gambar')) {
            $imagePaths = [];

            foreach ($request->file('gambar') as $key=> $image) {
                $imageName =time().$key.'.'.$image->extension();
                $image->move(public_path('pantai'), $imageName);
                $imagePaths[] = $imageName;
            }

            $pantai->update(['gambar' => $imagePaths]);
        }

        return redirect()->route('pantai.index')->with('success', 'pantai created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Pantai::find($id);
        $fasilitas = Fasilitas::all();
        $wahana = Wahana::all();
        return view('admin.pantai.show',compact('model','fasilitas','wahana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Pantai::find($id);
        $fasilitas = Fasilitas::all();
        $wahana = Wahana::all();
        return view('admin.pantai.edit',compact('model','fasilitas','wahana'));
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
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $model = Pantai::find($id)->delete();


        return redirect()->route('pantai.index')->with('success', 'Pantai created deleted');
    }
}
