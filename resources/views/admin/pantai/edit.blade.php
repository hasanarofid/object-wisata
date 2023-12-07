@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Master Pantai /</span> Edit Pantai</h4>
    <div class="card ">
        <h5 class="card-header">Form</h5>
        <div class="card-body">
            <form id="myForm" action="{{ route('pantai.update',['id'=>$model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @php
                    
                    $gambarArray = json_decode($model->gambar);
                @endphp
                <input type="hidden" name="id" id="id" value="{{ $model->id }}">
                <div class="mb-3 row">
                  <label for="html5-text-input" class="col-md-2 col-form-label">Foto</label>
                  <div class="col-md-10">
      
                    <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple accept="image/*">
                    <br>
                    <div id="previewImages" class="mt-4">
                      @if(is_array($gambarArray))
                      @foreach ($gambarArray as $image)
                          <img class="img-fluid d-block" src="{{ asset('pantai/' . $image) }}" alt="{{ $image }}" width="100px">
                          @endforeach
                      @else
                          <img class="img-fluid d-block" src="{{ asset('pantai/' . $model->gambar) }}" alt="{{ $model->gambar }}" width="100px">
                      @endif
                    </div>
                  </div>
                </div>
      

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="nama" required  id="html5-text-input" value="{{ $model->nama }}">
            </div>
          </div>

          <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Lokasi</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="lokasi" required  id="lokasi" value="{{ $model->lokasi }}">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Latitude & Longitude</label>
            <div class="col-md-10">
                <div class="form-group row">
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="latitude" required id="latitude" placeholder="Latitude" value="{{ $model->latitude }}">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="longitude" required id="longitude" placeholder="Longitude" value="{{ $model->longitude }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Biaya Masuk</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="biaya_masuk" required  id="biaya_masuk"  value="{{ $model->biaya_masuk }}">
            </div>
        </div>

        <div class="mb-3 row">
          @php
    

     @endphp
          <label for="html5-text-input" class="col-md-2 col-form-label">Fasilitas</label>
            <div class="col-md-10">
              <select class="form-control select2" name="fasilitas[]" id="fasilitas" multiple="multiple">
                @foreach ($fasilitas as $item)
               @php
                      $fasilitasString = $model->fasilitas ?? ''; // Ensure it's not null
    $decodedFasilitas = explode(',', $fasilitasString);
    $selected = in_array($item->id, $decodedFasilitas);

               @endphp
            <option value="{{ $item->id }}" @if($selected) selected @endif>
                {{ $item->nama }}
            </option>
                @endforeach
              </select>

            </div>
        </div>

        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Wahana</label>
            <div class="col-md-10">
              <select class="form-control select2" name="wahana[]" id="wahana" multiple="multiple">
                @foreach ($wahana as $item)
                @php
                $wahanaString = $model->fasilitas ?? ''; // Ensure it's not null
$decodedWahana = explode(',', $wahanaString);
$selected = in_array($item->id, $decodedWahana);

         @endphp
                      <option value="{{ $item->id }}" @if($selected) selected @endif> {{ $item->nama }} </option>
                @endforeach
              </select>

            </div>
        </div>
        @php
            $waktu = explode(' - ',$model->waktu_operasional);
        @endphp
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Waktu Operasional</label>
          <div class="col-md-10">
              <div class="form-group row">
                  <div class="col-md-6">
                      <input class="form-control" type="text" name="jam_awal" required id="jam_awal" value="{{ $waktu[0] }}" placeholder="dari">
                  </div>
                  <div class="col-md-6">
                      <input class="form-control" type="text" name="jam_akhir" required id="jam_akhir" value="{{ $waktu[1] }}" placeholder="sampai">
                  </div>
              </div>
          </div>
      </div>
        


      <div class="pt-4">            
        <a href="{{ route('pantai.index') }}" class="btn btn-warning  btn-label-secondary waves-effect">Cancel</a>
        <button type="button" class="btn btn-info btn-label-secondary waves-effect reset">Reset</button>
        <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
      </div>

        </form>
        </div>

        
      </div>

</div>

@endsection
<script>

  document.addEventListener('DOMContentLoaded', function () {
            var resetButton = document.querySelector('.reset');
    
            resetButton.addEventListener('click', function () {
                var form = document.getElementById('myForm'); // Replace 'myForm' with the actual ID of your form
                form.reset();
            });
        });
  </script>
  

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
 $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection