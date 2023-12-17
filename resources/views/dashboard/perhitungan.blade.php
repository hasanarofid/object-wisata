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
                    <div class="row">
                        <div class="col-6 mt-2 mb-2" style="text-align: left;">
                            <h4>Pembobotan Kriteria dengan Metode AHP</h4>
                            <!-- Your content goes here -->
                        </div>
                    </div>

                    <div class="row g-0 table-responsive" >
                        <table class="table table-bordered  ">
                            <thead class="text-center bg-success">
                                <tr>
                                    <th class="text-center vertical-center">No</th>
                                    <th class="text-center vertical-center">Nama Kriteria</th>
                                    <th class="text-center vertical-center">Tipe Kriteria</th>
                                    <th class="text-center vertical-center">Skala Prioritas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kriteria as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_kriteria }}</td>
                                    <td>{{ $item->tipe_kriteria }}</td>
                                    <td>{{ $item->skala_prioritas }}</td>
                                </tr>
                                    
                                @endforeach
                            </tbody>

                            

                        </table>
                      
                    </div>


                 

                    <div class="row">
                        <div class="col-12 mt-2 mb-2" style="text-align: left;">
                            <h4>Rumus Pembobotan AHP</h4>
                            <ul>
                                <li>
                                    <strong>Definisikan Matriks Perbandingan Berpasangan (Pairwise Comparison Matrix):</strong>
                                    <p>
                                        Tentukan matriks perbandingan berpasangan untuk setiap pasang kriteria.
                                        Misalnya, jika Anda memiliki 6 kriteria (K1, K2, ..., K6), maka Anda akan
                                        memiliki matriks perbandingan berpasangan 6x6.
                                    </p>
                                    <!-- Your PHP code for pairwise comparison matrix here -->
                                </li>
                                <li>
                                    <strong>Hitung Nilai Kepentingan Relatif (Relative Importance Values):</strong>
                                    <p>
                                        Hitung nilai eigenvalue dan eigenvector dari matriks perbandingan berpasangan.
                                        Kemudian, normalisasi eigenvector untuk mendapatkan nilai kepentingan relatif
                                        (bobot relatif) setiap kriteria.
                                    </p>
                                    <!-- Your PHP code for calculating eigenvalue and eigenvector here -->
                                </li>
                                <li>
                                    <strong>Normalisasi Bobot Kriteria:</strong>
                                    <p>
                                        Normalisasi bobot kriteria dengan membagi setiap nilai kepentingan relatif dengan
                                        jumlah total nilai kepentingan relatif.
                                    </p>
                                    <!-- Your PHP code for normalizing criteria weights here -->
                                </li>
                            </ul>
                        </div>
                    </div>

                    <h4>Hasil Pembobotan AHP</h4>

                    <div class="row g-0 table-responsive" >
                        <table class="table table-bordered  ">
                            <thead class="text-center bg-success">
                                <tr>
                                    <th class="text-center vertical-center">No</th>
                                    <th class="text-center vertical-center">Nama Kriteria</th>
                                    <th class="text-center vertical-center">Tipe Kriteria</th>
                                    <th class="text-center vertical-center">Bobot</th>
                                    <th class="text-center vertical-center">Matrik Perbandingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kriteria as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_kriteria }}</td>
                                    <td>{{ $item->tipe_kriteria }}</td>
                                    <td>{{ $item->bobot_kriteria }}</td>
                                    <td>{{ $item->matriks_perbandingan }}</td>
                                </tr>
                                    
                                @endforeach
                            </tbody>

                            

                        </table>
                      
                    </div>

                    <div class="row">
                        <div class="col-12 mt-2 mb-2" style="text-align: left;">
                            <h4>Metode VIKOR</h4>
                            <h6>Menentukan Rangking, Nilai S, Nilai R, dan Nilai Q</h6>
                            <ul>
                                <li>
                                    <strong>1. Menentukan Nilai Normalisasi (S)</strong>
                                    <p>
                                        Formula: {!! ' $S_i = \\frac{X_i - X_{\\text{min}}}{X_{\\text{max}} - X_{\\text{min}}}' !!}
    
    
                                    </p>
                                    {{-- Additional explanation or example can be added here --}}
                                </li>
                                <li>
                                    <strong>2. Menentukan Nilai Relatif (R)</strong>
                                    <p>
                                        Formula: \( R_i = \max(S_j) - S_i \)
                                    </p>
                                    {{-- Additional explanation or example can be added here --}}
                                </li>
                                <li>
                                    <strong>3. Menentukan Nilai Preferensi (Q)</strong>
                                    <p>
                                        Formula: {!! ' $Q_i = \\frac{w \cdot R_i + (1 - w) \cdot S_i}{w + (1 - w)}' !!}
    
                                    </p>
                                    {{-- Additional explanation or example can be added here --}}
                                </li>
                                <li>
                                    <strong>4. Menentukan Rangking</strong>
                                    <p>
                                        Rangking diberikan berdasarkan nilai \( Q_i \), yang lebih kecil lebih baik.
                                    </p>
                                    {{-- Additional explanation or example can be added here --}}
                                </li>
                            </ul>
                            
                        </div>

                        
                    </div>
                    <h4>Hasil Metode Vikor</h4>

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
