@extends('layouts.app')
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
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

@endsection
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

            <div class="row mb-5 mt-2" id="data-container">
                <h5 class="my-4">Pantai Tedekat</h5>

        

                

                          
            
            </div>
            
            {{-- <div class="container text-center mt-4">
              
              <div class="row justify-content-center ">
                  <div class="col-4">
                      <hr style="border-radius: 20px; height: 4px;">
                  </div>
                  <div class="col-auto"> <!-- Adjust the width based on your design -->
                    <button id="load-more" class="btn btn-primary"><i class="fa fa-angle-double-down"></i>  See More </button>
                  </div>
                  <div class="col-4">
                      <hr style="border-radius: 20px; height: 4px;">
                  </div>
              </div>
          </div> --}}
            

          </div>
          <!--/ Content -->

         


  <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Cari Rekomendasi Pantai</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <form action="{{ route('cari-rekomendasi') }}" method="GET">
          <div class="modal-body">
              <div class="mb-3 row">
                <input type="hidden" id="userLatitude" name="userLatitude">
<input type="hidden" id="userLongitude" name="userLongitude">

                <label for="html5-text-input" class="col-md-2 col-form-label">Biaya Masuk</label>
                <div class="col-md-10">
                  <div class="form-group row">
                      <div class="col-md-6">
                          <input class="form-control" type="text" name="biaya_masuk1" required id="biaya_masuk1" placeholder="dari">
                      </div>
                      <div class="col-md-6">
                          <input class="form-control" type="text" name="biaya_masuk2" required id="biaya_masuk2" placeholder="sampai">
                      </div>
                  </div>
              </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-search-input" class="col-md-2 col-form-label">Jarak</label>
                <div class="col-md-10">
                  <div class="form-group row">
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="jarak1" required id="jarak1" placeholder="dari">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="jarak2" required id="jarak2" placeholder="sampai">
                    </div>
                </div>

                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-email-input" class="col-md-2 col-form-label">Fasilitas</label>
                <div class="col-md-10">
                  <select name="fasilitas[]" id="fasilitas" class="form-control select2" multiple="multiple">
                    @foreach ($fasilitas as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                    @endforeach
                  </select>
                 
                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-url-input" class="col-md-2 col-form-label">Wahana</label>
                <div class="col-md-10">
                  <select name="wahana[]" id="wahana" class="form-control select2" multiple="multiple">
                    @foreach ($wahana as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                    @endforeach
                  </select>

                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-tel-input" class="col-md-2 col-form-label">Waktu Operasional</label>
                <div class="col-md-10">
                  <input class="form-control" type="time"  name="waktu_operasional" id="html5-time-input">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-password-input" class="col-md-2 col-form-label">Ulasan</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" name="ulasn" id="html5-password-input">
                </div>
              </div>

            
          </div>
          <div class="modal-footer">
            </button>
            <button type="submit" class="btn btn-primary">Cari</button>
          </div>
          </form>
        </div>
      </div>
    </div>


@endsection
@php
    $detailRoute = route('detail', ['id' => ':itemId']);
@endphp
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<!-- Page JS -->


<script>
  $(document).ready(function () {
    $('.select2').select2();
    loadPantaiTerdekat();

      var offset = {{ count($model) }}; // Initial offset

      $('#load-more').on('click', function () {
          $.ajax({
              url: "{{ route('load-more') }}",
              method: 'GET',
              data: { offset: offset },
              success: function (response) {
                if (response.data.length > 0) {
                        var container = $('#data-container');

                        $.each(response.data, function (index, item) {
                            // Append new card to the container
                            container.append(`
                                <div class="col-md-4 col-lg-3 mb-3">
                                  <a href="${'{{ $detailRoute }}'.replace(':itemId', item.id)}" class="card-link">
                                    <div class="card">
                                        <div class="card-body position-relative">
                                            <button class="card-subtitle text-muted position-absolute top-4 end-0 mr-2 rounded-pill">
                                                <i class="fa-solid fa-plus-minus"></i> ${item.jarak}
                                            </button>
                                            <img class="img-fluid d-block" src="{{ asset('pantai/') }}/${item.gambar}" alt="${item.gambar}" style="height: 200px;">
                                        </div>
                                        <div class="card-body">
                                            <a href="javascript:void(0);" class="card-link">${item.nama}</a>
                                        </div>
                                    </div>
                                  </a>
                                </div>
                            `);
                        });

                        offset += response.data.length;
                    } else {
                        // No more data
                        $('#load-more').attr('disabled', 'disabled').text('No more data');
                    }
              },
              error: function (error) {
                  console.log('Error:', error);
              }
          });
      });
  });

  function loadPantaiTerdekat(){
    if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var userLatitude = position.coords.latitude;
                var userLongitude = position.coords.longitude;
                $("#userLatitude").val(userLatitude);
                $("#userLongitude").val(userLongitude);

                // Send user's location to the server to get the nearest Pantai
                $.ajax({
                    url: "{{ route('pantai-terdekat') }}",
                    type: 'GET',
                    data: {
                        userLatitude: userLatitude,
                        userLongitude: userLongitude
                    },
                    success: function (nearestPantai) {
                        // Handle the response, update UI, etc.
                        var container = $('#data-container');
                        $.each(nearestPantai, function (index, item) {
                            // Append new card to the container
                            container.append(`
                                <div class="col-md-4 col-lg-3 mb-3">
                                  <a href="${'{{ $detailRoute }}'.replace(':itemId', item['id'])}" class="card-link">
                                    <div class="card">
                                        <div class="card-body position-relative">
                                            <button class="card-subtitle text-muted position-absolute top-4 end-0 mr-2 rounded-pill">
                                                <i class="fa-solid fa-plus-minus"></i> ${item['jarak']} KM
                                            </button>
                                            <img class="img-fluid d-block" src="{{ asset('pantai/') }}/${item['gambar']}" alt="${item['gambar']}" style="height: 200px;">
                                        </div>
                                        <div class="card-body">
                                            <a href="javascript:void(0);" class="card-link">${item['nama']}</a>
                                        </div>
                                    </div>
                                  </a>
                                </div>
                            `);
                        });

                    },
                    error: function (error) {
                        console.error('Error getting nearest Pantai:', error);
                    }
                });
            });
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
  }

  
</script>
@endsection