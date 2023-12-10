<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Pantai;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Alternatif::get();
        return view('admin.alternatif.index',compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pantai = Pantai::all();
        $kriteria = Kriteria::all();
        return view('admin.alternatif.create',compact('pantai','kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if(!empty($request->id)){
            $model = Alternatif::find($request->id);

        }else{
            $model = new Alternatif();

        }


// Ambil data kriteria dari tabel
$kriteria = Kriteria::all();

// Tentukan bobot kriteria
// $matriksPerbandingan = [];
// foreach ($kriteria as $item) {
//     // Ubah skala prioritas menjadi array dan tambahkan ke matriks perbandingan
//     // $skalaPrioritasArray = json_decode($item->skala_prioritas, true);
//     $matriksPerbandingan[] = $item->skala_prioritas;
// }
$matriksPerbandingan = [
    [1, 4, 3, 1, 5, 2],
];

$jumlahKriteria = count($matriksPerbandingan);
$eigenvalue = [];
$eigenvector = [];

// Hitung eigenvalues dan eigenvectors
for ($i = 0; $i < $jumlahKriteria; $i++) {
    list($eigenvalue[$i], $eigenvector[$i]) = $this->hitungEigen($matriksPerbandingan[0]); // Perubahan di sini
}






// 3. Normalisasi Bobot Kriteria
// dd(count($eigenvector[0]));
// Simpan bobot kriteria ke dalam tabel kriteria (gunakan model Eloquent)
for ($i = 0; $i < count($eigenvector[0]); $i++) {
    // Ambil model Kriteria sesuai indeks $i
    $kriteria = Kriteria::find($i + 1);

    // Simpan bobot kriteria ke dalam kolom 'bobot_kriteria'
    $kriteria->bobot_kriteria = $eigenvector[0][$i];
    // dd($kriteria);
    $kriteria->save();
}


        $model->pantai_id = $request->pantai_id;
        $model->k1 = $request->k1;
        $model->k2 = $request->k2;
        $model->k3 = $request->k3;
        $model->k4 = $request->k4;
        $model->k5 = $request->k5;
        $model->k6 = $request->k6;

        $model->skorR = $model->hitungSkorR($request->k1, $request->k2, $request->k3, $request->k4, $request->k5, $request->k6);
        $model->skorS = $model->hitungSkorS($request->k1, $request->k2, $request->k3, $request->k4, $request->k5, $request->k6);
       

        $model->skorQ = $model->hitungSkorQ($model->skorR,$model->skorS);
        // dd($model->skorQ);
        $model->save();
        return redirect()->route('alternatif.index')->with('success', 'alternatif create successfully');
    }

    private function hitungEigen($matrix)
{
    if (!is_array($matrix)) {
        return [0, []];
    }

    $jumlahElemen = count($matrix);
    $eigenvalue = array_sum($matrix) / $jumlahElemen;

    // Normalisasi eigenvector agar total menjadi 1
    $eigenvector = array_map(function ($value) use ($eigenvalue, $jumlahElemen) {
        return $value / ($eigenvalue * $jumlahElemen);
    }, $matrix);
    // dd([$eigenvalue, $eigenvector]);

    return [$eigenvalue, $eigenvector];
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Alternatif::find($id);
        return view('admin.alternatif.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pantai = Pantai::all();
        $model = Alternatif::find($id);
        return view('admin.alternatif.edit',compact('pantai','model'));
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
        $model = Alternatif::find($id)->delete();


        return redirect()->route('alternatif.index')->with('success', 'alternatif  deleted');

    }
}
