<?php

namespace App\Http\Controllers;

use App\AhpMatrix;
use App\Models\Alternatif;
use App\Models\Fasilitas;
use App\Models\Feedback;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\Pantai;
use App\Models\Ulasan;
use App\Models\Wahana;
use Illuminate\Support\Facades\DB;

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
        // dd($request->input()); 
        $userLatitude = $request->input('userLatitude');
        $userLongitude = $request->input('userLongitude');
        $data = Pantai::get(); // Your Pantai data array here;
        $datapantai2 = [];
        foreach ($data as $value) {
            $datapantai2[] = array(
                'id' => $value->id,
                'nama' => $value->nama,
                'gambar' => $value->gambar,
                'latitude' => $value->latitude,
                'longitude' => $value->longitude,
            );
        }
        
        // Calculate the nearest Pantai
        $nearestPantai = $this->calculateNearestPantai($datapantai2, $userLatitude, $userLongitude);
        
        foreach ($datapantai2 as $pantai) {
            $pantai['jarak'] = $this->calculateDistance(
                $userLatitude,
                $userLongitude,
                $pantai['latitude'],
                $pantai['longitude']
            );
           $update =  Pantai::where('id', $pantai['id'])
            ->update(['jarak' => $pantai['jarak']]);
            $update2 = Alternatif::where('pantai_id', $pantai['id'])
            ->update(['k2' => $pantai['jarak']]);
        }
        
        //update alternatif$
        // $alternatif = Alternatif::get();
        

        // $min_k1 = $alternatif->min('k1');
        // $max_k1 = $alternatif->max('k1');

        // $min_k2 = $alternatif->min('k2');
        // $max_k2 = $alternatif->max('k2');

        // $min_k3 = $alternatif->min('k3');
        // $max_k3 = $alternatif->max('k3');

        // $min_k4 = $alternatif->min('k4');
        // $max_k4 = $alternatif->max('k4');

        // $min_k5 = $alternatif->min('k5');
        // $max_k5 = $alternatif->max('k5');

        // $min_k6 = $alternatif->min('k6');
        // $max_k6 = $alternatif->max('k6');

        // // Langkah 2: Hitung skor R
        // foreach ($alternatif as $alternative) {
        //     $alternative->skorR_k1 = ($alternative->k1 - $min_k1) / ($max_k1 - $min_k1);
        //     $alternative->skorR_k2 = ($alternative->k2 - $min_k2) / ($max_k2 - $min_k2);
        //     $alternative->skorR_k3 = ($alternative->k3 - $min_k3) / ($max_k3 - $min_k3);
        //     $alternative->skorR_k4 = ($alternative->k4 - $min_k4) / ($max_k4 - $min_k4);
        //     $alternative->skorR_k5 = ($alternative->k5 - $min_k5) / ($max_k5 - $min_k5);
        //     $alternative->skorR_k6 = ($alternative->k6 - $min_k6) / ($max_k6 - $min_k6);
        // }

        // $totalSkorR = $alternatif->sum('skorR');

        // // Perbarui setiap alternatif dengan skorR baru
        // foreach ($alternatif as $alternative) {
        //     $alternative->skorS = ($alternative->skorR_k1 + $alternative->skorR_k2 
        //         + $alternative->skorR_k3 + $alternative->skorR_k4
        //         + $alternative->skorR_k5 + $alternative->skorR_k6) / $totalSkorR;
        
        //     $alternative->skorQ = $alternative->skorS;
        // }
        
        // // Hitung total skorQ
        // $totalSkorQ = $alternatif->sum('skorQ');
        
        // Perbarui setiap alternatif dengan skorQ baru
        // foreach ($alternatif as $alternative) {
        //     $update2 = Alternatif::where('id', $alternative['id'])
        //         ->update([
        //             'skorR' => $totalSkorR,
        //             'skorS' => $alternative->skorS,
        //             'skorQ' => $alternative->skorQ,
        //         ]);
        // }
        // Langkah 5: Hitung total skor Q
       


        // dd($data);


        $datapantai = [];
      
        // $alternatif = Alternatif::get();

        // $ranking = $alternatif->sortByDesc('skorQ');
        $query = Alternatif::orderByDesc('skorQ');
        // dd($request->has('cari_tanpa_filter'));
        if ($request->has('cari_tanpa_filter')) {
            $results = $query->get();
            // Handle search without filter
        } elseif ($request->has('cari')) {
             if (!empty($request->biaya_masuk)) {
                    $numericString = preg_replace('/[^0-9]/', '', $request->biaya_masuk);

                    // Convert the numeric string to an integer
                    $k1 = (int) $numericString;

                    $query->where('k1', '<=', $k1);
                }

                if (!empty($request->jarak)) {
                    $query->where('k2', '<=', (int)$request->jarak);
                }

                if (!empty($request->fasilitas)) {
                    switch ($request->fasilitas) {
                        case 'Sangat Lengkap':
                            $query->where('k3', '=', '3');
                            break;
                        case 'Lengkap':
                            $query->whereBetween('k3', [2, 3]);
                            break;
                        case 'Kurang Lengkap':
                            $query->whereBetween('k3', [1, 3]);
                            break;
                        default:
                            // Handle other cases or provide a default behavior
                            break;
                    }
                }

                if (!empty($request->wahana)) {
                    switch ($request->wahana) {
                        case 'Lengkap':
                            $query->where('k4', '=', '3');
                            break;
                        case 'Kurang Lengkap':
                            $query->whereBetween('k4', [2, 3]);
                            break;
                        case 'Tidak Ada':
                            $query->whereBetween('k4', [1, 3]);
                            break;
                        default:
                            // Handle other cases or provide a default behavior
                            break;
                    }
                }
                

                if (!empty($request->waktu_operasional)) {
                    // $jamOperasional = intval($request->waktu_operasional);
                    // dd($jamOperasional);
                    $query->where('k5', '>=', (int)$request->waktu_operasional);
                }

                if(!empty($request->rating)) {
                    $query->where('k6', '>=', $request->rating);
                }
            // Handle search with filter
            $results = $query->get();

        }

       
        // dd($query);
        // dd($results);    
       $no = 1;
        foreach($results as $value){
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
        $userLatitude = $request->input('userLatitude');
        $userLongitude = $request->input('userLongitude');
        $numberOfPantai = $request->input('numberOfPantai', 4); // Default to 4 if not provided
        $offset = $request->input('offset', 0);
    
        // Retrieve a limited number of Pantai from the database with an offset
        // $data = Pantai::skip($offset)->take($numberOfPantai)->get();
        $data = Pantai::get();

        $datapantai = [];
        foreach ($data as $value) {
            $datapantai[] = array(
                'id' => $value->id,
                'nama' => $value->nama,
                'gambar' => $value->gambar,
                'latitude' => $value->latitude,
                'longitude' => $value->longitude,
            );
        }
        
        // Calculate the nearest Pantai
        $nearestPantai = $this->calculateNearestPantai($datapantai, $userLatitude, $userLongitude);
        
        foreach ($datapantai as &$pantai) {
            $pantai['jarak'] = $this->calculateDistance(
                $userLatitude,
                $userLongitude,
                $pantai['latitude'],
                $pantai['longitude']
            );
        }
        
        // Sort the array based on distance
        usort($datapantai, function ($a, $b) {
            return $a['jarak'] <=> $b['jarak'];
        });
        
        // Take 4 records starting from the offset
        $limitedData = array_slice($datapantai, $offset, $numberOfPantai);
        
        // If there are no more Pantai to load, set the flag
        $hasMorePantai = count($datapantai) > $offset + $numberOfPantai;
        
        // Return the data along with the flag
        return response()->json([
            'datapantai' => $limitedData,
            'hasMorePantai' => $hasMorePantai,
        ]);
        
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

    public function perhitungan(Request $request){
// dd($request);

        $datapantai = [];
        $data = Pantai::get(); // Your Pantai data array here;
        $alternatif = Alternatif::get();
        $kriteria = Kriteria::get();
        // $ranking = $alternatif->sortByDesc('skorQ');
        $query = Alternatif::orderByDesc('skorQ');

        if (!empty($request->biaya_masuk)) {
            $numericString = preg_replace('/[^0-9]/', '', $request->biaya_masuk);

            // Convert the numeric string to an integer
            $k1 = (int) $numericString;

            $query->where('k1', '>', $k1);
        }

        if (!empty($request->jarak)) {
            $query->where('k2', '>', (int)$request->jarak);
        }

        if (!empty($request->fasilitas)) {
            switch ($request->fasilitas) {
                case 'Sangat Lengkap':
                    $query->whereBetween('k3', [7,8,9, 10]);
                    break;
                case 'Lengkap':
                    $query->whereBetween('k3', [5, 6]);
                    break;
                case 'Kurang Lengkap':
                    $query->whereBetween('k3', [0,1,2,3, 4]);
                    break;
                default:
                    // Handle other cases or provide a default behavior
                    break;
            }
        }

        if (!empty($request->wahana)) {
            switch ($request->wahana) {
                case 'Sangat Lengkap':
                    $query->whereBetween('k4', [5, 6]);
                    break;
                case 'Lengkap':
                    $query->whereBetween('k4', [3,4]);
                    break;
                case 'Kurang Lengkap':
                    $query->whereBetween('k4', [0,1]);
                    break;
                default:
                    // Handle other cases or provide a default behavior
                    break;
            }
        }
        

        if (!empty($request->waktu_operasional)) {
            $jamOperasional = intval($request->waktu_operasional);
            // dd($jamOperasional);
            $query->where('k5', '<=', $jamOperasional);
        }

        if(!empty($request->rating)) {
            $query->where('k6', '<=', $request->rating);
        }
        
        $results = $query->get();
    
       $no = 1;
        foreach($results as $value){
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

        $criteria = AhpMatrix::distinct()->pluck('criteria')->toArray();

        
        

        return view('dashboard.perhitungan',compact('datapantai','kriteria','alternatif','data'));
    }
    
   

    // sendfeed
    public function sendfeed(Request $request){

        $model = new Feedback();
        $model->nama = $request->nama;
        $model->email = $request->email;
        $model->no_wa = $request->no_wa;
        $model->feedback = $request->feedback;
        $model->save();

        return redirect()->route('home')->with('success', 'Feedback berhasil dikirim');
    }


}
