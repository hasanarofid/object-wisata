<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Fasilitas;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\Pantai;
use App\Models\Ulasan;
use App\Models\Wahana;

class DashboardController extends Controller
{
    //index
    public function index()
    {
        $model = Pantai::limit(4)->get();
        $fasilitas = Fasilitas::all();
        $wahana = Wahana::all();

        return view('dashboard.index',compact('model','fasilitas','wahana'));
    }
    
    //load more card pantai
    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 4; // Number of items to load each time

        $data = Pantai::skip($offset)->take($limit)->get();

        return response()->json(['data' => $data]);
    }

    //detail pantai
    public function detail($id,$no = null,$id_alternatif = null){
        if(!empty($id_alternatif) ||!empty($no) ){
            $alternatif = Alternatif::find($id_alternatif);
            $no = $no;
        }else{
            $alternatif = null;
            $no = null;
        }

        $model = Pantai::find($id);
        $ulasan = Ulasan::where('pantai_id',$id)->get();
        if ($ulasan->isNotEmpty()) {
            $averageRating = $ulasan->avg('rating');
        } else {
            $averageRating = 0;
        }
        return view('dashboard.detail',compact('model','averageRating','alternatif','no'));
    }

    //carirekomendasi
    public function carirekomendasi(Request $request){
        // dd($request); 
        $userLatitude = $request->input('userLatitude');
        $userLongitude = $request->input('userLongitude');
        $datapantai = [];
        $data = Pantai::get(); // Your Pantai data array here;
        $alternatif = Alternatif::get();
        $ranking = $alternatif->sortByDesc('skorQ');
    
       $no = 1;
        foreach($ranking as $value){
            // dd($value);
            $datapantai[] = array(
                'id'=>$value->pantai->id,
                'id_alternatif'=>$value->id,
                'nama'=>$value->pantai->nama,
                'ranking'=>$no++,
                'skorR'=>$value->skorR,
                'skorS'=>$value->skorS,
                'skorQ'=>$value->skorQ,
                'link_maps'=>$value->pantai->link_maps
            );
        }
        // dd($datapantai);

        // Calculate the nearest Pantai
        // $nearestPantai = $this->calculateNearestPantai($datapantai, $userLatitude, $userLongitude);
        // // dd($nearestPantai);
        // foreach ($datapantai as &$pantai) {
        //     $pantai['jarak'] = $this->calculateDistance(
        //         $userLatitude,
        //         $userLongitude,
        //         $pantai['latitude'],
        //         $pantai['longitude']
        //     );
        // }
        // usort($datapantai, function ($a, $b) {
        //     return $a['jarak'] <=> $b['jarak'];
        // });


        return view('dashboard.hasilrekomendasi',compact('datapantai'));
    }

    // load pantai terdekat
    public function getNearestPantai(Request $request){
        // dd($request);
        $userLatitude = $request->input('userLatitude');
        $userLongitude = $request->input('userLongitude');
        $datapantai = [];
        $data = Pantai::get(); // Your Pantai data array here;
        foreach($data as $value){
            $datapantai[] = array(
                'id'=>$value->id,
                'nama'=>$value->nama,
                'gambar'=>$value->gambar,
                'latitude'=>$value->latitude,
                'longitude'=>$value->longitude,
            );
        }

        // Calculate the nearest Pantai
        $nearestPantai = $this->calculateNearestPantai($datapantai, $userLatitude, $userLongitude);
        // dd($nearestPantai);
        foreach ($datapantai as &$pantai) {
            $pantai['jarak'] = $this->calculateDistance(
                $userLatitude,
                $userLongitude,
                $pantai['latitude'],
                $pantai['longitude']
            );
        }
        usort($datapantai, function ($a, $b) {
            return $a['jarak'] <=> $b['jarak'];
        });
        // dd($datapantai);
        return response()->json($datapantai);
    }

    private function calculateNearestPantai($data, $userLatitude, $userLongitude)
    {
        $nearestPantai = null;
        $minDistance = PHP_INT_MAX;

        foreach ($data as $pantai) {
            // dd($pantai['latitude']);
            $distance = $this->calculateDistance(
                $userLatitude,
                $userLongitude,
                $pantai['latitude'],
                $pantai['longitude']
            );
            // dd($distance);
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $nearestPantai = $pantai;

            }
        }

        return $nearestPantai;
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Radius of the Earth in kilometers

        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        // dd($lat2);
        $lon2 = deg2rad($lon2);

        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c; // Distance in kilometers

        // Round the distance to two decimal places
        $roundedDistance = round($distance, 2);

        return $roundedDistance;
    }


    //save ulasan
    public function ulasan(Request $request){
        $ulasan = new Ulasan();
        $ulasan->pantai_id = $request->pantai_id;
        $ulasan->comment = $request->comment;
        $ulasan->rating = $request->rating;
        $ulasan->save();
        return redirect()->route('detail',['id'=>$ulasan->pantai_id])->with('success', 'Ulasan berhasil dikirim');

    }

    public function perhitungan(){

        $datapantai = [];
        $data = Pantai::get(); // Your Pantai data array here;
        $alternatif = Alternatif::get();
        $kriteria = Kriteria::get();
        $ranking = $alternatif->sortByDesc('skorQ');
    
       $no = 1;
        foreach($ranking as $value){
            // dd($value);
            $datapantai[] = array(
                'id'=>$value->pantai->id,
                'id_alternatif'=>$value->id,
                'nama'=>$value->pantai->nama,
                'ranking'=>$no++,
                'skorR'=>$value->skorR,
                'skorS'=>$value->skorS,
                'skorQ'=>$value->skorQ,
                'link_maps'=>$value->pantai->link_maps
            );
        }
        return view('dashboard.perhitungan',compact('datapantai','kriteria','alternatif','data'));
    }


}
