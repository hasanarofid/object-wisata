@extends('layouts.app')

@section('content')
<style>
    .vertical-center {
    vertical-align: middle;
}
</style>
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
                padding-bottom: 5px;">Hasil Rekomendasi </p> </h4>
        
                <div class="card">
                    <div class="row">
                        <div class="col-6 mt-2 mb-2" style="text-align: left;">
                            <h4>Tabel Perhitungan</h4>
                            <!-- Your content goes here -->
                        </div>
                        <div style="text-align: right;" class="col-6 text-right mt-2 ml-10 mb-2">
                            <button class="btn btn-primary">Perhitungan</button>
                        </div>
                    </div>
                    <br>

                    
                    <div class="row g-0 table-responsive" >
                        <table class="table table-bordered  ">
                            <thead class="text-center bg-success">
                                <tr>
                                    <th rowspan="3" class="text-center vertical-center">No</th>
                                    <th rowspan="3" class="text-center vertical-center">Alternatif</th>
                                    <th colspan="9">Kriteria</th>
                                  
                                    <th rowspan="3" class="text-center vertical-center">Link Maps</th>
                                </tr>
                                <tr>
                                    <th rowspan="2"  class="text-center vertical-center">Biaya Masuk</th>
                                    <th  rowspan="2"  class="text-center vertical-center">Jarak</th>


                                    <th colspan="2" class="text-center vertical-center">Fasilitas</th>
                                    <th colspan="2" class="text-center vertical-center">Wahana</th>
                                    <th colspan="2" class="text-center vertical-center">Waktu Operasional</th>
                                    <th  rowspan="2" class="text-center vertical-center">Ulasan</th>


                                </tr>
                                <tr>
                                    <th>Yang Tersedia</th>
                                    <th>Nilai Parameter</th>
                                    <th>Yang Tersedia</th>
                                    <th>Nilai Parameter</th>
                                    <th class="text-center vertical-center">Pukul</th>
                                    <th class="text-center vertical-center">Total (jam)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
        $colors = ['#FF5733', '#33FF57', '#3357FF', '#57FF33', '#5733FF']; // Array of colors
                                $no = 1;
                                @endphp

                                @foreach ($datapantai as $item)
                                @php
                                    $fasilitasString = $item['fasilitas'];
                                    $wahanaString = $item['wahana'];
                    $fasilitasArray = explode(",", $fasilitasString);
                    $wahanaArray = explode(",", $wahanaString);
                    $facilities = \App\Models\Fasilitas::whereIn('id', $fasilitasArray)->get();
                    $wahanas = \App\Models\Wahana::whereIn('id', $wahanaArray)->get();
                    

                                @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td> {{ $item['nama'] }} </td>
                                        <td> {{ $item['biaya_masuk'] }} </td>
                                        <td> {{ $item['jarak'] }} KM</td>
                                        <td>
                                            @foreach ($facilities as $index => $fas)
                                            @php
                                                $colorIndex = $index % count($colors); // Use modulo to cycle through colors
                                                $color = $colors[$colorIndex]; // Get the color for this iteration
                                            @endphp
                                        
                                                <a href="#" class="btn btn-default" style="background-color: {{ $color }};color:white;">{{ $fas->nama}}</a>
                                            @endforeach
                                    </td>
                                        <td> {{ $item['fasilitas'] }} </td>
                                        <td>
                                            @foreach ($wahanas as $index => $fas)
                                            @php
                                                $colorIndex = $index % count($colors); // Use modulo to cycle through colors
                                                $color = $colors[$colorIndex]; // Get the color for this iteration
                                            @endphp
                                        
                                                <a href="#" class="btn btn-default" style="background-color: {{ $color }};color:white;">{{ $fas->nama}}</a>
                                            @endforeach
                                    </td>
                                        <td> {{ $item['wahana'] }} </td>
                                        <td> {{ $item['waktu_operasional'] }} </td>
                                        <td> {{ $item['waktu_operasional'] }} </td>
                                        <td> {{ $item['waktu_operasional'] }} </td>
                                        <td> {{ $item['waktu_operasional'] }} </td>
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
