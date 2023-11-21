@extends('layouts.app')
@section('styles')
    <!-- Additional CSS files -->
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/pages/ui-carousel.css') }}" />
@endsection
@section('content')
 

          <!--/ Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">SIROWP </span> SERGAI</h4>

          
          

            <div class="row">
              <!-- Gallery effect-->
              <div class="col-12">
                <div id="swiper-gallery">
                  <div class="swiper gallery-top">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme//assets/img/backgrounds/2.jpg') }}')">
                        Slide 1
                      </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme//assets/img/backgrounds/1.jpg') }}')">
                        Slide 2
                      </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme//assets/img/backgrounds/3.jpg') }}')">
                        Slide 3
                      </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme//assets/img/backgrounds/4.jpg') }}')">
                        Slide 4
                      </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme//assets/img/backgrounds/6.jpg') }}')">
                        Slide 5
                      </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                  </div>
                  <div class="swiper gallery-thumbs">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme/assets/img/backgrounds/2.jpg') }}')">
                        Slide 1
                      </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme/assets/img/backgrounds/1.jpg') }}')">
                        Slide 2
                      </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme/assets/img/backgrounds/3.jpg') }}')">
                        Slide 3
                      </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme/assets/img/backgrounds/4.jpg') }}')">
                        Slide 4
                      </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('theme/assets/img/backgrounds/6.jpg') }}')">
                        Slide 5
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container text-center mt-5">
              
                <div class="row justify-content-center ">
                    <div class="col-4">
                        <hr style="border-radius: 20px; height: 4px;">
                    </div>
                    <div class="col-auto"> <!-- Adjust the width based on your design -->
                        <button class="btn btn-primary rounded-pill">Cari Rekomendasi Partai</button>
                    </div>
                    <div class="col-4">
                        <hr style="border-radius: 20px; height: 4px;">
                    </div>
                </div>
            </div>

            <div class="row mb-5 mt-2">
                <h5 class="my-4">Pantai Tedekat</h5>
                
                <div class="col-md-4 col-lg-3 mb-3">
                  <div class="card h-100">
                    
                    <div class="card-body">
                      <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                    </div>
                    <img class="img-fluid" src="{{ asset('theme/assets/img/elements/10.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                      <a href="javascript:void(0);" class="card-link">Card link</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-lg-3 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                      </div>
                      <img class="img-fluid" src="{{ asset('theme/assets/img/elements/10.jpg') }}" alt="Card image cap">
                      <div class="card-body">
                        <a href="javascript:void(0);" class="card-link">Card link</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-lg-3 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                      </div>
                      <img class="img-fluid" src="{{ asset('theme/assets/img/elements/10.jpg') }}" alt="Card image cap">
                      <div class="card-body">
                        <a href="javascript:void(0);" class="card-link">Card link</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-lg-3 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                      </div>
                      <img class="img-fluid" src="{{ asset('theme/assets/img/elements/10.jpg') }}" alt="Card image cap">
                      <div class="card-body">
                        <a href="javascript:void(0);" class="card-link">Card link</a>
                      </div>
                    </div>
                  </div>

                 
                
              </div>
            
            
            

          </div>
          <!--/ Content -->

         


  
@endsection