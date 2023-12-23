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
                            <a target="_blank" href="{{ route('perhitungan', request()->all()) }}" class="btn btn-primary">Perhitungan</a>
                        </div>
                    </div>
                    <br>

                    <div class="alert alert-success text-black" role="alert">
                        @if (count($datapantai) >= 15)
                            <i class="fa-solid fa-circle-info"></i> Alternatif Rating 1 sampai 2 adalah pilihan terbaik
                        @elseif (count($datapantai) < 10)
                            <i class="fa-solid fa-circle-info"></i> Alternatif Rating 1 adalah pilihan terbaik
                        @endif

                        </div>
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
    </div>

 
</div>

@endsection


<script>
    // Ambil URL saat ini
    var currentUrl = new URL(window.location.href);

    // Tambahkan parameter tambahan
    currentUrl.searchParams.set('additionalParam', 'nilaiBaru');

    // Tentukan ID tombol atau link yang ingin diubah
    var perhitunganButton = document.getElementById('perhitunganButton');

    // Setel atribut href dengan URL yang telah dimodifikasi
    perhitunganButton.href = currentUrl.toString();
</script>
