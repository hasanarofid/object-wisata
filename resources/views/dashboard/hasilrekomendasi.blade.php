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
                    <div class="row g-0 table-responsive" >
                        <p>Tabel Perhitungan</p>
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="3" class="text-center vertical-center">No</th>
                                    <th rowspan="3" class="text-center vertical-center">Alternatif</th>
                                    <th colspan="12">Kriteria</th>
                                  
                                    <th rowspan="3" class="text-center vertical-center">Link Maps</th>
                                </tr>
                                <tr>
                                    <th colspan="2" rowspan="2" class="text-center vertical-center">Biaya Masuk</th>
                                    <th  colspan="2" rowspan="2" class="text-center vertical-center">Jarak</th>
                                    <th colspan="2" class="text-center vertical-center">Fasilitas</th>
                                    <th colspan="2" class="text-center vertical-center">Wahana</th>
                                    <th colspan="2" class="text-center vertical-center">Waktu Operasional</th>
                                    <th colspan="2" rowspan="2" class="text-center vertical-center">Ulasan</th>


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

                        </table>
                      
                    </div>
                </div>
        
        </div>
    </div>

 
</div>

@endsection
