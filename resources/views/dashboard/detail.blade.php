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
                padding-bottom: 5px;"> {{ $model->nama }} </p> </h4>
        
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{ asset('pantai/' . $model->gambar) }}" alt="{{ $model->nama }}" class="img-fluid m-3" style="height: 400px;">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                  <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-name">Biaya Masuk</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label">{{ $model->biaya_masuk }}</p>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-name">Jarak</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label">{{ $model->jarak }}</p>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-name">Fasilitas</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label">{{ $model->fasilitas }}</p>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-name">Wahana</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label">{{ $model->fasilitas }}</p>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-name">Waktu Operasional</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label">{{ $model->fasilitas }}</p>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-name">Ulasan</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label">{{ $model->fasilitas }}</p>
                                    </div>
                                  </div>
                                  
                              </div>

                        </div>
                    </div>
                </div>
        
        </div>
    </div>

 
</div>

@endsection
