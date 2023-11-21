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
                  
                </div>
              </div>
            </div>
            

            <div class="container text-center mt-0">
              
                <div class="row justify-content-center ">
                    <div class="col-4">
                        <hr style="border-radius: 20px; height: 4px;">
                    </div>
                    <div class="col-auto"> <!-- Adjust the width based on your design -->
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#modalCenter">
                        Cari Rekomendasi Partai
                      </button>
                    </div>
                    <div class="col-4">
                        <hr style="border-radius: 20px; height: 4px;">
                    </div>
                </div>
            </div>

            <div class="row mb-5 mt-2">
                <h5 class="my-4">Pantai Tedekat</h5>
                
                <div class="col-md-4 col-lg-3 mb-3">
                  <div class="card ">
                    <div class="card-body">
                        <button class="card-subtitle text-muted position-absolute top-4  end-0 mr-2 rounded-pill">+- 7.8 KM</button>   
                        <img class="img-fluid" src="{{ asset('theme/assets/img/elements/10.jpg') }}" alt="Card image cap">       
                    </div>
                    <div class="card-body">
                        <a href="javascript:void(0);" class="card-link">Card link</a>
                      </div>
                  </div>
                </div>



                 
                
              </div>
            
            
            

          </div>
          <!--/ Content -->

         


  <!-- Modal -->
  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameWithTitle" class="form-label">Name</label>
              <input
                type="text"
                id="nameWithTitle"
                class="form-control"
                placeholder="Enter Name" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="emailWithTitle" class="form-label">Email</label>
              <input
                type="email"
                id="emailWithTitle"
                class="form-control"
                placeholder="xxxx@xxx.xx" />
            </div>
            <div class="col mb-0">
              <label for="dobWithTitle" class="form-label">DOB</label>
              <input type="date" id="dobWithTitle" class="form-control" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


@endsection