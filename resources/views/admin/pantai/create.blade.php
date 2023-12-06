@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Master Pantai /</span> Add Pantai</h4>
    <div class="card ">
        <h5 class="card-header">Form</h5>
        <div class="card-body">
            <form action="{{ route('pantai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Foto</label>
            <div class="col-md-10">

              <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple accept="image/*">
              <br>
              <div id="previewImages" class="mt-4"></div>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="nama" required  id="html5-text-input">
            </div>
          </div>

          <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Lokasi</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="lokasi" required  id="lokasi">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Latitude & Longitude</label>
            <div class="col-md-10">
                <div class="form-group row">
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="latitude" required id="latitude" placeholder="Latitude">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="longitude" required id="longitude" placeholder="Longitude">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Biaya Masuk</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="biaya_masuk" required  id="biaya_masuk">
            </div>
        </div>

        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Fasilitas</label>
            <div class="col-md-10">
              <select class="form-control select2" name="fasilitas[]" id="fasilitas" multiple="multiple">
                @foreach ($fasilitas as $item)
                      <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                @endforeach
              </select>

            </div>
        </div>

        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Wahana</label>
            <div class="col-md-10">
              <select class="form-control select2" name="wahana[]" id="wahana" multiple="multiple">
                @foreach ($wahana as $item)
                      <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                @endforeach
              </select>

            </div>
        </div>

        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Waktu Operasional</label>
          <div class="col-md-10">
              <div class="form-group row">
                  <div class="col-md-6">
                      <input class="form-control" type="text" name="jam_awal" required id="jam_awal" placeholder="dari">
                  </div>
                  <div class="col-md-6">
                      <input class="form-control" type="text" name="jam_akhir" required id="jam_akhir" placeholder="sampai">
                  </div>
              </div>
          </div>
      </div>
        


          <div class="pt-4">
            <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Save</button>
          </div>

        </form>
        </div>

        
      </div>

</div>

@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
 $(document).ready(function() {
  $('#gambar').on('change', function() {
    displayImagePreview(this);
  });

  // Function to display image preview
  function displayImagePreview(input) {
    var previewContainer = $('#previewImages');
    previewContainer.empty();

    if (input.files) {
      var filesAmount = input.files.length;
      
      for (var i = 0; i < filesAmount; i++) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('<img>').attr('src', e.target.result).addClass('img-thumbnail mr-2 mb-2').appendTo(previewContainer);
        }

        reader.readAsDataURL(input.files[i]);
      }
    }
  }


        $('.select2').select2();
    }); 
</script>
@endsection