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

.rating > span:hover:before,
.rating > span.selected:before,
.rating > span:hover ~ span:before,
.rating > span.selected ~ span:before {
  content: "\2605";
  position: absolute;
  color: #ffcc00;
}

.rating > span:hover ~ span:before {
  content: "\2605";
  position: absolute;
  color: #ddd;
}

#selected-rating {
  font-size: 14px;
  display: inline-block;
  margin-top:10px;
  margin-left: 10px; /* Sesuaikan margin sesuai kebutuhan */
  vertical-align: middle; /* Agar teks berada di tengah secara vertikal */
}

.rating-value::before {
  content: "(";
}

.rating-value::after {
  content: ")";
}
</style>
@section('css')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/pages/ui-carousel.css') }}" />
@endsection
@section('content')


          <!--/ Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">SIROWP </span> SERGAI</h4> -->

            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-lg-6 d-flex align-items-center order-md-2">
                <img src="{{ asset('cover-sirowp.png') }}" class="img-fluid" alt="Responsive image">
                
                </div>
                <div class="col-md-6 col-lg-6 d-flex align-items-center">

                  <div class="jumbotron">
                <h1 class="display-4 fw-bold">SIROWP <span class="text-muted fw-light">SERGAI</span></h1>
                <p class="lead text-black">
                Sistem Rekomendasi Objek Wisata Pantai Kabupaten Serdang Bedagai merupakan sebuah website layanan masyarakat yang dapat mempermudah wisatawan dalam menentukan tujuan pantai yang ingin dikunjungi berdasarkan kebutuhan dan keinginannya.
                </p>
                <hr class="my-4">
                  <div class="alert alert-success text-black" role="alert">
                  <i class="fa-solid fa-circle-info"></i> Tekan tombol Cari Rekomendasi Pantai untuk memulai!
                  </div>
                <a class="btn btn-primary btn-lg" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#modalCenter">Cari Rekomendasi Pantai</a>
              </div>
                </div>
              </div>
            </div>


            <div class="container-fluid dashboard-header">
              <!-- <div class="cover-image"> -->
                  <!-- Replace 'your-image.jpg' with the actual path to your cover image -->
                  <!-- <img src="{{ asset('pantai-bg.jpg') }}" alt="Cover Image" class="img-fluid">
              </div> -->
              <!-- <div class="title-container">
                  <h4 class="fw-bold py-3 mb-4">
                      <span class="text-muted fw-light">SIROWP </span> SERGAI
                  </h4>
              </div> -->
          </div>
          

          
          

           
            

            <!-- <div class="container text-center mt-4">
              
                <div class="row justify-content-center ">
                    <div class="col-4">
                        <hr style="border-radius: 20px; height: 4px;">
                    </div> -->
                    <!-- <div class="col-auto"> Adjust the width based on your design -->
                      <!-- <button
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
                </div> -->
            <!-- </div> -->

            <div class="row mb-5 mt-2" id="data-container">
                <h5 class="my-4">Pantai Tedekat</h5>

        

                

                          
            
            </div>
            
            <div class="container text-center mt-4">
              
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
          </div>
            

          </div>
          <!--/ Content -->

         
          <div class="container text-center mt-4">
              
            <div class="row justify-content-center ">
                <div class="col-4">
                    <hr style="border-radius: 20px; height: 4px;">
                </div>
                <div class="col-auto"> <!-- Adjust the width based on your design -->
                  <button
                    type="button"
                    class="btn btn-primary"
                  >
                    Beri Feedback
                  </button>
                </div>
                <div class="col-4">
                    <hr style="border-radius: 20px; height: 4px;">
                </div>
            </div>
        </div>
  <!-- Modal Fee -->
 <br>
 <div class="container mt-2">
  <div class="row justify-content-center align-items-center">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

      <div class="card">
          <form action="{{ route('feed') }}" method="GET">
              <div class="card-body">
                  <!-- Your form content goes here -->

            <div class="mb-3 row">
              <label for="html5-text-input" class="col-md-5 col-form-label">Nama</label>
              <div class="col-md-7">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Anda">
              </div>
            </div>
  
            <div class="mb-3 row">
              <label for="html5-text-input" class="col-md-5 col-form-label">Email</label>
              <div class="col-md-7">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda">
              </div>
            </div>
  
            <div class="mb-3 row">
              <label for="html5-text-input" class="col-md-5 col-form-label">No Whatsapp</label>
              <div class="col-md-7">
                  <input type="text" class="form-control" name="no_wa" id="no_wa" placeholder="No Whatsapp Anda">
              </div>
            </div>
  
            <div class="mb-3 row">
              <label for="html5-text-input" class="col-md-5 col-form-label">FeedBack</label>
              <div class="col-md-7">
                <textarea placeholder="Berikan Feedback anda" class="form-control" name="feedback" id="feedback" cols="30" rows="10"></textarea>
              </div>
            </div>
  
            

              </div>
              <div class="modal-footer">
                  <!-- Your form buttons go here -->
                  <button type="submit" class="btn btn-primary">Kirim Feedback</button>
              </div>
          </form>
      </div>
  </div>
</div>





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
                <label for="html5-text-input" class="col-md-5 col-form-label">Biaya Masuk Maksimal</label>
                <div class="col-md-7">
                  <div class="input-group">
                    <input type="text" class="form-control" name="biaya_masuk" id="biaya_masuk" placeholder="Biaya Masuk  Maksimal" required>
                    <div class="input-group-append">
                      <span class="input-group-text">Rp</span>
                    </div>
                  </div>
                  <div id="error-message-container" class="error-message" style="color:red"></div>
              </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-search-input" class="col-md-5 col-form-label">Jarak Maksimal</label>
                <div class="col-md-7">
                  <div class="input-group">
                    <input type="text" class="form-control" name="jarak" id="jarak" placeholder="Jarak Maksimal" required>
                    <div class="input-group-append">
                      <span class="input-group-text">m</span>
                    </div>
                  </div>
                  <div id="error-message-container2" class="error-message" style="color:red"></div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-email-input" class="col-md-5 col-form-label">Fasilitas Minimal</label>
                <div class="col-md-7">
                  <select name="fasilitas" id="fasilitas" class="form-control" required >
                    <option value="">.: Pilih :.</option>
                    <option value="Sangat Lengkap">Sangat Lengkap</option>
                    <option value="Lengkap">Lengkap</option>
                    <option value="Kurang Lengkap">Kurang Lengkap</option>
                  </select>
                 
                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-url-input" class="col-md-5 col-form-label">Wahana Minimal</label>
                <div class="col-md-7">
                  <select name="wahana" id="wahana" class="form-control" required >
                    <option value="">.: Pilih :.</option>
                    <option value="Sangat Lengkap">Sangat Lengkap</option>
                    <option value="Lengkap">Lengkap</option>
                    <option value="Kurang Lengkap">Kurang Lengkap</option>

                  </select>

                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-tel-input" class="col-md-5 col-form-label">Waktu Operasional Minimal</label>
                <div class="col-md-7">
                  <input class="form-control" type="time"  name="waktu_operasional" id="html5-time-input" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-password-input" class="col-md-5 col-form-label">Ulasan Minimal</label>
                <div class="col-md-7">
                  <div class="input-group">
                    <div class="rating">
                      <span data-value="1">&#x2605;</span>
                      <span data-value="2">&#x2605;</span>
                      <span data-value="3">&#x2605;</span>
                      <span data-value="4">&#x2605;</span>
                      <span data-value="5">&#x2605;</span>
                    </div>
                    <div id="selected-rating" class="rating-value">0</div>
                  </div>
                  <div id="error-message-container3" class="error-message" style="color:red"></div>
                  <input type="hidden" name="rating" id="rating-input">
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
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Page JS -->


<script>
  function formatRupiah(angka) {
      var number_string = angka.toString().replace(/[^,\d]/g, ''),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang diinput lebih dari satu ribu
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
      return 'Rp ' + rupiah;
    }


  $(document).ready(function () {

    let selectedRating = 0;

// Handle mousemove event on stars
$('.rating').on('mousemove', function(e) {
  const containerWidth = $(this).width();
  const ratingValue = (e.pageX - $(this).offset().left) / containerWidth * 5;
  const percentage = (ratingValue - Math.floor(ratingValue)) * 100;
  $(this).find('span').css('color', '');
  $(this).find('span:lt(' + Math.floor(ratingValue) + ')').css('color', '#ffcc00');
  if (percentage > 0) {
    const nextStar = Math.floor(ratingValue) + 1;
    $(this).find('span').eq(nextStar - 1).css('color', 'rgba(255, 204, 0, ' + (percentage / 100) + ')');
  }
});

// Handle click event on stars
$('.rating').on('click', function(e) {
  const containerWidth = $(this).width();
  const ratingValue = (e.pageX - $(this).offset().left) / containerWidth * 5;
  selectedRating = Math.floor(ratingValue) + (ratingValue - Math.floor(ratingValue));
  $("#rating-input").val(selectedRating.toFixed(1));
  $('#selected-rating').text(selectedRating.toFixed(1));

  // Validation: Check if rating is less than 3.5
  if (selectedRating < 3.5) {
    $('#error-message-container3').text('Rating harus lebih dari  3.5');
    // Optionally, you can reset the selected rating
    // selectedRating = 0;
    // $('#selected-rating').text(selectedRating.toFixed(1));
  } else {
    $('#error-message-container3').text('');
  }
});
  

      // Fungsi untuk memformat input setiap kali diketik
      $('#biaya_masuk').on('input', function() {
        var inputVal = $(this).val();
        var formattedValue = formatRupiah(inputVal);
        $(this).val(formattedValue);

        // Validasi jika angka kurang dari 8000
        var numericValue = parseInt(inputVal.replace(/[^\d]/g, ''));
        var errorContainer = $('#error-message-container');

        if (numericValue < 8000) {
          errorContainer.text('Biaya tidak boleh kurang dari 8000').show();
        } else {
          errorContainer.hide().text('');
        }
      });

      $('#jarak').on('input', function() {
        var inputValue = $(this).val().replace(/[^\d]/g, ''); // Hapus karakter selain angka
        $(this).val(inputValue);

        // Validasi minimal 1000
        var numericValue = parseInt(inputValue);
        var errorContainer = $('#error-message-container2');

        if (isNaN(numericValue) || numericValue < 1000) {
          errorContainer.text('Jarak minimal 1000 meter').show();
        } else {
          errorContainer.hide().text('');
        }
      });


    $('.select2').select2();
    // loadPantaiTerdekat();

   
  });
var displayedPantai = 4;
var pantaiPerLoad = 4;
var offset = 0; // Track the offset for loading more Pantai


function loadPantaiTerdekat() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var userLatitude = position.coords.latitude;
            var userLongitude = position.coords.longitude;
            $("#userLatitude").val(userLatitude);
            $("#userLongitude").val(userLongitude);

            // Send user's location to the server to get the nearest Pantai
            loadPantaiFromServer(userLatitude, userLongitude, displayedPantai);
        });
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function loadPantaiFromServer(userLatitude, userLongitude, numberOfPantai) {
    $.ajax({
        url: "{{ route('pantai-terdekat') }}",
        type: 'GET',
        data: {
            userLatitude: userLatitude,
            userLongitude: userLongitude,
            numberOfPantai: numberOfPantai,
            offset: offset,
        },
        success: function (response) {
            var nearestPantai = response.datapantai;
            var hasMorePantai = response.hasMorePantai;

            console.log(nearestPantai);

            // Handle the response, update UI, etc.
            appendPantaiToUI(nearestPantai);

            // Show/hide the "See More" button based on the flag
            if (hasMorePantai) {
                $('#load-more').show();
            } else {
                $('#load-more').hide();
            }
        },
        error: function (error) {
            console.error('Error getting nearest Pantai:', error);
        }
    });
}

function appendPantaiToUI(nearestPantai) {
    var container = $('#data-container');

    $.each(nearestPantai, function (index, item) {
        // Initialize an empty string to store slide HTML
        var slidesHtml = '';

        // Parse the JSON string into an array
        var gambarArray = JSON.parse(item.gambar);

        // Loop through each image for the current item
        $.each(gambarArray, function (imgIndex, imgName) {
            slidesHtml += `
                <div class="swiper-slide" style="background-image: url('{{ asset('pantai/') }}/${imgName}')"></div>
            `;
        });

        // Create a unique ID for each Swiper container
        var swiperContainerId = 'swiper-container-' + index;

        // Append the carousel container and slides to the container with reversed order
        container.append(`
            <div class="col-md-4 col-lg-3 mb-3">
              <a href="${'{{ $detailRoute }}'.replace(':itemId', item.id)}" class="card-link">
                <div class="card">
                    <div class="card-body position-relative">
                        <button class="card-subtitle bg-info position-absolute top-4 end-0 mr-2 rounded-pill" style="z-index: 2;">
                            <i class="fa-solid fa-plus-minus"></i> ${item.jarak} KM
                        </button>
                        <div class="swiper-container swiper" id="${swiperContainerId}">
                            <div class="swiper-wrapper">
                                ${slidesHtml}
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="${'{{ $detailRoute }}'.replace(':itemId', item.id)}" class="card-link">${item.nama}</a>
                    </div>
                </div>
                </a>
            </div>
        `);

        // Initialize Swiper after adding all slides for the current item
        new Swiper(`#${swiperContainerId}`, {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: `#${swiperContainerId} .swiper-pagination`,
                clickable: true,
            },
        });
    });
}


function loadMorePantai() {
    offset += pantaiPerLoad;

    // Load additional Pantai from the server
    loadPantaiFromServer($("#userLatitude").val(), $("#userLongitude").val(), displayedPantai);
}

// Initial load of Pantai
$(document).ready(function () {
    loadPantaiTerdekat();
});

// "See More" button click event
$('#load-more').on('click', function () {
    loadMorePantai();
});

</script>
@endsection