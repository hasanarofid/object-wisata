@extends('layouts.app')

@section('content')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/pages/ui-carousel.css') }}" />
@endsection

<style>
  .rating {
      display: inline-block;
      unicode-bidi: bidi-override;
      color: #ddd;
      font-size: 24px;
      height: 25px;
      width: auto;
      margin: 0;
      padding: 0;
      position: relative;
    }

    .rating > span {
      display: inline-block;
      position: relative;
      width: 1.1em;
    }

  
    .filled-star:before {
        content: "\2605";
        position: absolute;
        color: #ffcc00;
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
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <div class="container text-center mt-4">
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
        <div class="row justify-content-center ">
            <h4  > <p style=" border-bottom: 3px solid #000; 
                display: inline-block;
                line-height: 1.5; 
                padding-bottom: 5px;"> {{ $model->nama }} </p> </h4>
        
        @if (!empty($no) && !empty($alternatif))
        <h5 style="background-color: gray;color:white;">
          <i class="fa fa-info-circle" style="color:white" aria-hidden="true"></i>
          Rangking #{{ $no}}, dengan nilai S = {{ $alternatif->skorS }} ,Nilai R = {{ $alternatif->skorR }} ,Nilai Q = {{ $alternatif->skorQ }}
        </h5>
            
        @endif
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <div class="card-body">
                                  <div class="row mb-3">
                                    <label style="text-align: left" class="col-sm-4 col-form-label" for="basic-default-name">Biaya Masuk</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label">{{ $model->biaya_masuk }}</p>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label style="text-align: left" class="col-sm-4 col-form-label" for="basic-default-name">Jarak</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label" id="jarak_kini" ></p>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label style="text-align: left" class="col-sm-4 col-form-label" for="basic-default-name">Fasilitas</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label">@foreach ($facilities as $index => $fas)
                                          @php
                                              $colorIndex = $index % count($colors); // Use modulo to cycle through colors
                                              $color = $colors[$colorIndex]; // Get the color for this iteration
                                          @endphp
                                      
                                              <a href="#" class="btn btn-sm btn-default" style="background-color: {{ $color }};color:white;">{{ $fas->nama}}</a>
                                          @endforeach</p>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label style="text-align: left" class="col-sm-4 col-form-label" for="basic-default-name">Wahana</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label"> @foreach ($wahanas as $index => $fas)
                                          @php
                                              $colorIndex = $index % count($colors); // Use modulo to cycle through colors
                                              $color = $colors[$colorIndex]; // Get the color for this iteration
                                          @endphp
                                      
                                              <a href="#" class="btn btn-sm btn-default" style="background-color: {{ $color }};color:white;">{{ $fas->nama}}</a>
                                          @endforeach</p>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label style="text-align: left" class="col-sm-4 col-form-label" for="basic-default-name">Waktu Operasional</label>
                                    <div class="col-sm-8">
                                        <p class="card-text col-form-label">{{ $model->waktu_operasional }}</p>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label style="text-align: left" class="col-sm-4 col-form-label" for="basic-default-name">Maps</label>
                                    <div class="col-sm-8">
                                      <a href="{{ $model->link_maps }}" target="_blank">view maps </a>
                                    </div>
                                  </div>

                                  <div  class="row mb-3">
                                    <label style="text-align: left" class="col-sm-4 col-form-label" for="basic-default-name">Ulasan</label>
                                    <div class="col-sm-8">
                                      <div class="rating" id="star-rating">
                                        <span data-value="1">&#x2605;</span>
                                        <span data-value="2">&#x2605;</span>
                                        <span data-value="3">&#x2605;</span>
                                        <span data-value="4">&#x2605;</span>
                                        <span data-value="5">&#x2605;</span>
                                      </div>

                                    </div>
                                  </div>
                                  <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Beri Ulasan
                      </button>
                                
                              </div>

                        </div>
                    </div>
                </div>
               
                <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalCenterTitle">Beri Ulasan</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                          <div class="modal-body">
                            <!-- Your Ulasan Form Here -->
                            <form action="{{ route('ulasan') }}" method="POST" >
                              @csrf
                              <input type="hidden" name="pantai_id" value="{{ $model->id }}" >
                              <!-- Comment Input -->
                              <div class="form-group">
                                <label for="comment">Komentar:</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                              </div>
                              <!-- Star Rating Input -->
                              <div class="form-group">
                                <label for="rating">Rating:</label>
                                <div class="rating" id="star-rating-modal">
                                  <span data-value="1">&#x2605;</span>
                                  <span data-value="2">&#x2605;</span>
                                  <span data-value="3">&#x2605;</span>
                                  <span data-value="4">&#x2605;</span>
                                  <span data-value="5">&#x2605;</span>
                                </div>
                                <input type="hidden" name="rating" id="rating-input">
                              </div>
                              <br>
                              <!-- Submit Button -->
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </div>
                    </div>
                  </div>
                </div>
            
        </div>
    </div>
    
 
</div>

@endsection
@section('script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>

function haversine(lat1, lon1, lat2, lon2) {
    // Radius of the Earth in kilometers
    var R = 6371;

    // Convert latitude and longitude from degrees to radians
    var lat1Rad = degToRad(lat1);
    var lon1Rad = degToRad(lon1);
    var lat2Rad = degToRad(lat2);
    var lon2Rad = degToRad(lon2);

    // Calculate differences
    var dLat = lat2Rad - lat1Rad;
    var dLon = lon2Rad - lon1Rad;

    // Haversine formula
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1Rad) * Math.cos(lat2Rad) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    // Calculate distance
    var distance = R * c;

    return distance;
  }

  function degToRad(deg) {
    return deg * (Math.PI / 180);
  }

function hitungjarak(latitude,longitude){
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
        var userLatitude = position.coords.latitude;
        var userLongitude = position.coords.longitude;

        // Calculate distance using Haversine formula
        var distance = haversine(userLatitude, userLongitude, latitude, longitude);

        // Update the content of the <p> element with id "jarak_kini"
        $('#jarak_kini').text(distance.toFixed(2) + ' km');
      }); 
  }
}

      $(document).ready(function () {
        var latitude = '{{ $model->latitude }}';
        var longitude = '{{ $model->longitude }}';
        hitungjarak(latitude,longitude);

        let selectedRating = 0;

    // Handle click event on stars
    $('#star-rating-modal span').on('click', function () {
      // Get the selected rating value
      const ratingValue = $(this).data('value');

      // Update the selected rating variable
      selectedRating = ratingValue;
      $('#rating-input').val(selectedRating);

      // Update the UI to reflect the selected rating
      updateRatingUI();

      // You can also perform additional actions based on the selected rating here
      // For example, send the rating to the server or perform other actions.
    });

    // Function to update the UI based on the selected rating
    function updateRatingUI() {
      // Remove the hover effect from all stars
      $('#star-rating-modal span').css('color', '');

      // Apply the hover effect to the selected number of stars
      $('#star-rating-modal span:lt(' + selectedRating + ')').css('color', '#ffcc00');

    }

        var ratingValue = parseFloat('{{ $averageRating }}');

// Update the star elements based on the rating value
$('#star-rating span').each(function(index, element) {
    if (index + 1 <= ratingValue) {
        $(element).addClass('filled-star');
    } else {
        $(element).removeClass('filled-star');
    }
});
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