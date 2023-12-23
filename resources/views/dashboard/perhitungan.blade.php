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
<br>
<h4>Perhitungan Alternatif</h4>
@php
$alternatives = App\Models\Alternatif::all();
/// Langkah 1: Hitung nilai minimum dan maksimum untuk setiap kriteria
$min_k1 = $alternatives->min('k1');
$max_k1 = $alternatives->max('k1');

$min_k2 = $alternatives->min('k2');
$max_k2 = $alternatives->max('k2');

$min_k3 = $alternatives->min('k3');
$max_k3 = $alternatives->max('k3');

$min_k4 = $alternatives->min('k4');
$max_k4 = $alternatives->max('k4');

$min_k5 = $alternatives->min('k5');
$max_k5 = $alternatives->max('k5');

$min_k6 = $alternatives->min('k6');
$max_k6 = $alternatives->max('k6');

// Langkah 2: Hitung skor R
foreach ($alternatives as $alternative) {
    $alternative->skorR_k1 = ($alternative->k1 - $min_k1) / ($max_k1 - $min_k1);
    $alternative->skorR_k2 = ($alternative->k2 - $min_k2) / ($max_k2 - $min_k2);
    $alternative->skorR_k3 = ($alternative->k3 - $min_k3) / ($max_k3 - $min_k3);
    $alternative->skorR_k4 = ($alternative->k4 - $min_k4) / ($max_k4 - $min_k4);
    $alternative->skorR_k5 = ($alternative->k5 - $min_k5) / ($max_k5 - $min_k5);
    $alternative->skorR_k6 = ($alternative->k6 - $min_k6) / ($max_k6 - $min_k6);
}

// Langkah 3: Hitung total skor R
$totalSkorR = $alternatives->sum('skorR_k1') + $alternatives->sum('skorR_k2') 
+ $alternatives->sum('skorR_k3') + $alternatives->sum('skorR_k4') 
+ $alternatives->sum('skorR_k5') + $alternatives->sum('skorR_k6') ;


// Langkah 4: Hitung skor S dan skor Q
foreach ($alternatives as $alternative) {
    $alternative->skorS = ($alternative->skorR_k1 + $alternative->skorR_k2 
    + $alternative->skorR_k3 + $alternative->skorR_k4
    + $alternative->skorR_k5
    + $alternative->skorR_k6) / $totalSkorR;
    $alternative->skorQ = $alternative->skorS;
}

// Langkah 5: Hitung total skor Q
$totalSkorQ = $alternatives->sum('skorQ');
@endphp
<div class="table-responsive">
<table class="table table-bordered  ">
    <thead class="text-center bg-success">
        <tr>
            <th>Skor R K1</th>
            <th>Skor R K2</th>
            <th>Skor R K3</th>
            <th>Skor R K4</th>
            <th>Skor R K5</th>
            <th>Skor R K6</th>
            <th>Skor S</th>
            <th>Skor Q</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alternatives->sortByDesc('skorQ') as $alternative)
            <tr>
                <td>{{ $alternative->skorR_k1 }}</td>
                <td>{{ $alternative->skorR_k2 }}</td>
                <td>{{ $alternative->skorR_k3 }}</td>
                <td>{{ $alternative->skorR_k4 }}</td>
                <td>{{ $alternative->skorR_k5 }}</td>
                <td>{{ $alternative->skorR_k6 }}</td>
                <td>{{ $alternative->skorS }}</td>
                <td>{{ $alternative->skorQ }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>

                    <h4>Hasil Perhitungan Pantai dengan AHP</h4>

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
