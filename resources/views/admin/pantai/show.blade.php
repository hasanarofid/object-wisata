@extends('layouts.admin')

@section('content')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/pages/ui-carousel.css') }}" />
@endsection

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Pantai /</span> Detail</h4>
    <div class="card ">
        <h5 class="card-header">Pantai Detail</h5>
        <div class="card-body">
          @php
          $colors = ['#FF5733', '#33FF57', '#3357FF', '#57FF33', '#5733FF']; // Array of colors
$gambarArray = json_decode($model->gambar);

$fasilitasString = $model->fasilitas;
                  $wahanaString = $model->wahana;
  $fasilitasArray = explode(",", $fasilitasString);
  $wahanaArray = explode(",", $wahanaString);
  $facilities = \App\Models\Fasilitas::whereIn('id', $fasilitasArray)->get();
  $wahanas = \App\Models\Wahana::whereIn('id', $wahanaArray)->get();
  
@endphp

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Gambar</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
              <div class="swiper" id="swiper-with-pagination-2">
                <div class="swiper-wrapper">
                    @foreach ($gambarArray as $image)
                    <div class="swiper-slide" style="background-image: url({{ asset('pantai/' . $image) }})">
                        
                      </div>

                @endforeach

                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
                <label class="col-form-label">{{ $model->nama}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Link</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->link_maps}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Ulasan</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->ulasan}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-email-input" class="col-md-2 col-form-label">Latitude & Longitude</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
                <label class="col-form-label">{{ $model->latitude .' - '.$model->longitude}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Biaya Masuk</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
                <label class="col-form-label">{{ number_format($model->biaya_masuk) }}</label>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Fasilitas</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
              @foreach ($facilities as $index => $fas)
              @php
                  $colorIndex = $index % count($colors); // Use modulo to cycle through colors
                  $color = $colors[$colorIndex]; // Get the color for this iteration
              @endphp
                  <a href="#" class="btn btn-sm btn-default" style="background-color: {{ $color }};color:white;">{{ $fas->nama}}</a>
              @endforeach
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Wahana</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
              @foreach ($wahanas as $index => $fas)
              @php
                  $colorIndex = $index % count($colors); // Use modulo to cycle through colors
                  $color = $colors[$colorIndex]; // Get the color for this iteration
              @endphp
          
                  <a href="#" class="btn btn-sm btn-default" style="background-color: {{ $color }};color:white;">{{ $fas->nama}}</a>
              @endforeach
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Waktu Operasional</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
                <label class="col-form-label">{{ $model->waktu_operasional}}</label>
            </div>
          </div>

          <div class="pt-4">
            <a href="{{ route('pantai.index') }}" class="btn btn-info" ><i class="fa fa-arrow-left mr-2 ml-2" aria-hidden="true"></i> Kembali</a>
          </div>
        </div>
    
        
      </div>

</div>

@endsection

@section('script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>

$(document).ready(function () {

new Swiper("#swiper-with-pagination-2", {
      slidesPerView: 'auto',
      pagination: {
        clickable: true,
        el: '.swiper-pagination'
      }
    });
    });
</script>

@endsection