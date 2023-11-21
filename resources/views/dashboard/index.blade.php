@extends('layouts.app')
@section('styles')
    <!-- Additional CSS files -->
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/pages/ui-carousel.css') }}" />
@endsection
<style>
  /* Add this to your CSS stylesheet or in a <style> tag in your HTML */

.container-fluid.dashboard-header {
    position: relative;
    padding: 0;
}

.cover-image {
    position: relative;
    overflow: hidden;
}

.cover-image img {
    width: 100%;
    height: 340px;
}

.title-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%;
    color: #fff; /* Change the color to match your design */
}

.title-container h4 {
    margin: 0;
}

</style>
@section('content')
 

          <!--/ Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">SIROWP </span> SERGAI</h4>

            <div class="container-fluid dashboard-header">
              <div class="cover-image">
                  <!-- Replace 'your-image.jpg' with the actual path to your cover image -->
                  <img src="{{ asset('pantai-bg.jpg') }}" alt="Cover Image" class="img-fluid">
              </div>
              <div class="title-container">
                  <h4 class="fw-bold py-3 mb-4">
                      <span class="text-muted fw-light">SIROWP </span> SERGAI
                  </h4>
              </div>
          </div>
          

          
          

           
            

            <div class="container text-center mt-4">
              
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

                @foreach ($model as $item)
                    <div class="col-md-4 col-lg-3 mb-3">
                        <div class="card">
                            <div class="card-body position-relative">
                                <button class="card-subtitle text-muted position-absolute top-4 end-0 mr-2 rounded-pill">
                                    <i class="fa-solid fa-plus-minus"></i> {{ $item->jarak }}
                                </button>
                                <img class="img-fluid d-block" src="{{ asset('pantai/' . $item->gambar) }}" alt="{{ $item->gambar }}" style="height: 200px;">
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0);" class="card-link">{{ $item->nama }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                
                



                 
                
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