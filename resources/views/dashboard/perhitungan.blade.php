@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6">
            <h4 class="fw-bold py-3 mb-4"> SIROWP SERGAI</h4>
        </div>
        <div class="col-md-6">
            <h6 class="fw-bold py-3 mb-4">Sistem Rekomendasi Objek Wisata Pantai Kabupaten Serdang Bedagai</h6>
        </div>
    </div>

    <div class="container text-center mt-4">
              
        <div class="row justify-content-center ">
            <h4  > <p style=" border-bottom: 3px solid #000; 
                display: inline-block;
                line-height: 1.5; 
                padding-bottom: 5px;">Proses Perhitungan Gabungan Metode AHP dan VIKOR </p> </h4>
        
                <div class="card">
               
                    <h4>Tingkat Kepentingan</h4>
                    <div class="row g-0 table-responsive" >
                        <table class="table table-bordered  ">
                            <thead class="text-center bg-success">

                                <tr>
                                    @foreach ($kriteria as $item)
                                    <th>{{ $item->tipe_kriteria }}</th>
                                    @endforeach
                                </tr>

                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                 <tr>
                                @foreach ($kriteria as $item)
                               
                                    <td>{{ $item->skala_prioritas }}</td>
                               
                                    
                                @endforeach
                            </tr>
                            </tbody>

                            

                        </table>
                      
                    </div>
                    @php
                    
                       $ahpMatrix = App\AhpMatrix::all()->toArray();
                        // dd($ahpmatrik);
                    @endphp
                    <hr>
                    <h4> Matrix</h4>
                    <div class="row g-0 table-responsive" >
                        <table class="table table-bordered  ">
                            <thead class="text-center bg-success">
                            <tr>
                                <th></th>
                                @foreach($ahpMatrix as $row)
                                <th>{{ $row['criteria'] }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ahpMatrix as $row)
                            <tr>
                                <td>{{ $row['criteria'] }}</td>
                                @foreach($ahpMatrix as $column)
                                <td>{{ $column[Str::snake($row['criteria'])] ?? '' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    
                    <hr>
                   {{-- Function to compare two criteria and return the ratio --}}
@php
$criteria = ['Biaya Masuk', 'Jarak', 'Fasilitas', 'Wahana', 'Waktu Operasional', 'Ulasan'];
$values = [
    [1, 7, 5, 1, 9, 3],
    [1/7, 1, 1/3, 1/7, 3, 1/5],
    [1/5, 3, 1, 1/5, 5, 1/3],
    [1, 7, 5, 1, 9, 3],
    [1/9, 1/3, 1/5, 1/9, 1, 1/7],
    [1/3, 5, 3, 1/3, 7, 1],
];

// Function to sum the columns
function sumColumns($matrix)
{
    $sums = array_map('array_sum', array_map(null, ...$matrix));
    return $sums;
}

// Calculate the total values
$totalValues = sumColumns($values);

// Function to normalize the matrix
function normalizeMatrix($matrix, $totalValues)
{
    $normalizedMatrix = [];
    foreach ($matrix as $row) {
        $normalizedRow = array_map(function ($value, $total) {
            return $value / $total;
        }, $row, $totalValues);

        $normalizedMatrix[] = $normalizedRow;
    }

    return $normalizedMatrix;
}

// Calculate the normalized matrix
$normalizedMatrix = normalizeMatrix($values, $totalValues);
@endphp
<h4>Original Matrix</h4>
<table class="table table-bordered  ">
    <thead class="text-center bg-success">
    <tr>
        <th></th>
        @foreach ($criteria as $columnCriterion)
            <th>{{ $columnCriterion }}</th>
        @endforeach
    </tr>
    </thead>
    @foreach ($criteria as $i => $rowCriterion)
        <tr>
            <td>{{ $rowCriterion }}</td>
            @foreach ($criteria as $j => $columnCriterion)
                <td>{{ number_format($values[$i][$j], 2, '.', '') }}</td>
            @endforeach
        </tr>
    @endforeach
</table>

<!-- Display the normalized matrix -->
<h4>Normalized Matrix</h4>
<table class="table table-bordered  ">
    <thead class="text-center bg-success">

    <tr>
        <th></th>
        @foreach ($criteria as $columnCriterion)
            <th>{{ $columnCriterion }}</th>
        @endforeach
    </tr>
    </thead>
    @foreach ($criteria as $i => $rowCriterion)
        <tr>
            <td>{{ $rowCriterion }}</td>
            @foreach ($criteria as $j => $columnCriterion)
                <td>{{ number_format($normalizedMatrix[$i][$j], 10, '.', '') }}</td>
            @endforeach
        </tr>
    @endforeach
</table>

<!-- Display the total values -->
<h4>Total Values</h4>
<table class="table table-bordered  ">
    <thead class="text-center bg-success">

    <tr>
        <th>Criteria</th>
        <th>Total Value</th>
    </tr>
    </thead>
    @foreach ($criteria as $i => $criterion)
        <tr>
            <td>{{ $criterion }}</td>
            <td>{{ number_format($totalValues[$i], 10, '.', '') }}</td>
        </tr>
    @endforeach
</table>



@php
// Your matrices and values
$normalizedMatrix = [
    [0.3587699317, 0.3, 0.3440366972, 0.3587699317, 0.2647058824, 0.3908188586],
    [0.05125284738, 0.04285714286, 0.02293577982, 0.05125284738, 0.08823529412, 0.02605459057],
    [0.07175398633, 0.1285714286, 0.06880733945, 0.07175398633, 0.1470588235, 0.04342431762],
    [0.3587699317, 0.3, 0.3440366972, 0.3587699317, 0.2647058824, 0.3908188586],
    [0.03986332574, 0.01428571429, 0.01376146789, 0.03986332574, 0.02941176471, 0.01861042184],
    [0.1195899772, 0.2142857143, 0.2064220183, 0.1195899772, 0.2058823529, 0.1302729529],
];

$totalValues = [2.017101301, 0.2825885021, 0.5313698818, 2.017101301, 0.1557960202, 0.9960429929];

$eigenvalues = [0.9370449432, 1.098955286, 1.287095936, 0.9370449432, 0.8828441145, 1.274302623];

// Function to calculate the consistency index (CI)
function calculateCI($eigenvalues, $totalValues)
{
    $lambdaMax = array_sum($eigenvalues);
    $n = count($eigenvalues);

    $CI = ($lambdaMax - $n) / ($n - 1);

    return $CI;
}

// Function to calculate the consistency ratio (CR)
function calculateCR($CI, $RI)
{
    $CR = $CI / $RI;

    return $CR;
}

$CI = calculateCI($eigenvalues, $totalValues);
$RI = 1.24; // Assuming you have calculated the Random Index (RI)

$CR = calculateCR($CI, $RI);
@endphp

<!-- Display the normalized matrix -->
<h4>Normalized Matrix</h4>
<table class="table table-bordered  ">
    <thead class="text-center bg-success">

    <tr>
        <th></th>
        <th>Biaya Masuk</th>
        <th>Jarak</th>
        <th>Fasilitas</th>
        <th>Wahana</th>
        <th>Waktu Operasional</th>
        <th>Ulasan</th>
    </tr>
    </thead>
    @foreach ($normalizedMatrix as $i => $row)
        <tr>
            <td>{{ $criteria[$i] }}</td>
            @foreach ($row as $value)
                <td>{{ number_format($value, 10, '.', '') }}</td>
            @endforeach
        </tr>
    @endforeach
</table>

<!-- Display the CI, RI, and CR -->
<h4>Consistency Index (CI), Random Index (RI), Consistency Ratio (CR)</h4>
<table class="table table-bordered  ">
    <thead class="text-center bg-success">
    <tr>
        <th>Value</th>
        <th>Calculation</th>
    </tr>
    </thead>
    <tr>
        <td>CI</td>
        <td>{{ number_format($CI, 10, '.', '') }}</td>
    </tr>
    <tr>
        <td>RI</td>
        <td>{{ $RI }}</td>
    </tr>
    <tr>
        <td>CR</td>
        <td>{{ number_format($CR, 10, '.', '') }}</td>
    </tr>
</table>
<h4>Perhitungan Vikor</h4>
<div class="row g-0 table-responsive" >
    <table class="table table-bordered  ">
        <thead class="text-center bg-success">
            <tr>
                <th class="text-center vertical-center" rowspan="2">No</th>
                <th class="text-center vertical-center" rowspan="2">Nama Pantai</th>
                <th class="text-center vertical-center" colspan="6">Kriteria</th>
              
            </tr>
            <tr>
                <th class="text-center vertical-center">K1</th>
                <th class="text-center vertical-center">K2</th>
                <th class="text-center vertical-center">K3</th>
                <th class="text-center vertical-center">K4</th>
                <th class="text-center vertical-center">K5</th>
                <th class="text-center vertical-center">K6</th>

            </tr>

        </thead>

        <tbody>
            @php
                $no = 1;
                $pantaiVikor = App\Models\Alternatif::get();
            @endphp
           @foreach ($pantaiVikor as $item)
           @php
               $nama_pantai = App\Models\Pantai::find($item->pantai_id)->nama;
        //        $datak1 = App\Models\Alternatif::pluck('k1');
        //        if ($datak1->count() > 0) {
        //     // Calculate minimum and maximum values
        //     $minValue = $datak1->min();
        //     $maxValue = $datak1->max();

        //     // Output the results
        //     echo "Minimum value: $minValue<br>";
        //     echo "Maximum value: $maxValue<br>";
        //     die;
        // } else {
        //     echo "No data found.";
        // }
        //        dd($datak1);die;
           @endphp
               
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $nama_pantai }}</td>
                    <td>{{ $item->k1 }}</td>
                    <td>{{ $item->k2 }}</td>
                    <td>{{ $item->k3 }}</td>
                    <td>{{ $item->k4 }}</td>
                    <td>{{ $item->k5 }}</td>
                    <td>{{ $item->k6 }}</td>
                     
                </tr>
            @endforeach
        </tbody>

    </table>
  
  
</div>

<h4>Perhitungan Vikor | Kriteria dan Bobot</h4>
<div class="row g-0 table-responsive" >
    <table class="table table-bordered  ">
        <thead class="text-center bg-success">
            <tr>
                <th class="text-center vertical-center" rowspan="2">Kriteria</th>
                <th class="text-center vertical-center" rowspan="2">Deskripsi</th>
                <th class="text-center vertical-center" colspan="6">Bobot</th>
              
            </tr>
           
        </thead>

        <tbody>
            @php
                $datakriterabobot = [
            //1 
            [
                'kriteria' => 'K1',
                'des' => 'Biaya masuk (Rp.)',
                'bobot' => '0,336183550247864',
            ],
             //1 
             [
                'kriteria' => 'K2',
                'des' => 'Jarak (m)',
                'bobot' => '0,0470980836871406',
            ],
             //1 
             [
                'kriteria' => 'K3',
                'des' => 'Fasilitas',
                'bobot' => '0,0885616469722326',
            ],
             //1 
             [
                'kriteria' => 'K4',
                'des' => 'Wahana',
                'bobot' => '0,336183550247864',
            ],
             //1 
             [
                'kriteria' => 'K5',
                'des' => 'Waktu Operasional',
                'bobot' => '0,0259660033663952',
            ],
             //1 
             [
                'kriteria' => 'K6',
                'des' => 'Ulasan',
                'bobot' => '0,166007165478504',
            ],
        ];

            @endphp
            
               @foreach ($datakriterabobot as $item)
               <tr>
                <td>{{ $item['kriteria'] }}</td>
                <td>{{ $item['des'] }}</td>
                <td>{{ $item['bobot'] }}</td>
               </tr>
               @endforeach
        </tbody>

    </table>
  
  
</div>
<h4>Nilai terbaik dan terburuk setiap Kriteria</h4>

<div class="row g-0 table-responsive" >
    <table class="table table-bordered  ">
        <thead class="text-center bg-success">
            <tr>
                <th class="text-center vertical-center">Kriteria</th>
                <th class="text-center vertical-center">Tipe Kriteria</th>
                <th class="text-center vertical-center">Xj+</th>
                <th class="text-center vertical-center">Xj-</th>
            </tr>

        </thead>

        <tbody>
            @php
            $datater = [
                
                    [
                'kriteria' => 'K1',
                'des' => 'Cost',
                'min' => '5000',
                'max' => '40000',
            ],
            [
                'kriteria' => 'K2',
                'des' => 'Benefit',
                'min' => '11700',
                'max' => '21000',
            ],
            [
                'kriteria' => 'K3',
                'des' => 'Benefit',
                'min' => '3',
                'max' => '1',
            ],
            [
                'kriteria' => 'K4',
                'des' => 'Benefit',
                'min' => '3',
                'max' => '1',
            ],
            [
                'kriteria' => 'K5',
                'des' => 'Benefit',
                'min' => '24',
                'max' => '8',
            ],
            [
                'kriteria' => 'K6',
                'des' => 'Benefit',
                'min' => '4.2',
                'max' => '3.5',
            ],
                
        ];
                $no = 1;
            @endphp
           @foreach ($datater as $item)
           <tr>
            <td>{{ $item['kriteria'] }}</td>
            <td>{{ $item['des'] }}</td>
            <td>{{ $item['min'] }}</td>
            <td>{{ $item['max'] }}</td>
           </tr>
           @endforeach
        </tbody>

    </table>
  
  
</div>



                    <h4>Hasil Perhitungan Pantai dengan AHP & VIKOR</h4>

                    <div class="row g-0 table-responsive" >
                        <table class="table table-bordered  ">
                            <thead class="text-center bg-success">
                                <tr>
                                    <th class="text-center vertical-center">No</th>
                                    <th class="text-center vertical-center">Nama Pantai</th>
                                    <th class="text-center vertical-center">Ranking</th>
                                    <th class="text-center vertical-center">Skor S</th>
                                    <th class="text-center vertical-center">Skor R</th>
                                    <th class="text-center vertical-center">Skor Q</th>
                                    <th class="text-center vertical-center">Titik Lokasi</th>
                                </tr>

                            </thead>

                            <tbody>
                                @php


                                    $no = 1;
                                @endphp
                               @foreach ($datapantai as $item)
                                   
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td> <a href="{{ route('detail',['id'=>$item['id'],'no'=>$item['ranking'],'id_alternatif'=>$item['id_alternatif'] ]) }}" target="_blank"> {{ $item['nama'] }} </a> </td>
                                        <td> #{{ $item['ranking'] }} </td>
                                        <td> {{ $item['skorS'] }} </td>
                                        <td> {{ $item['skorR'] }} </td>
                                        <td> {{ $item['skorQ'] }} </td>
                                        <td> <a href="{{ $item['link_maps'] }}" target="_blank">view maps </a> </td>
                                       
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                      
                      
                    </div>

                </div>
        
        </div>
    </div>

 
</div>

@endsection
