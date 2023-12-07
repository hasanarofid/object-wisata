@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">User Admin /</span> Add User</h4>
    <div class="card ">
        <h5 class="card-header">Form</h5>
        <div class="card-body">
            <form action="{{ route('alternatif.store') }}" method="POST" id="myForm">
                @csrf
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Pantai</label>
            <div class="col-md-10">
              <select name="pantai_id" id="pantai_id" class="form-control select2">
                  <option value="">.:Pilih:.</option>
                  @foreach ($pantai as $item)
                      <option value="{{ $item->id }}"> {{$item->nama }} </option>
                  @endforeach
              </select>

            </div>
          </div>
          <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Kategori</label>
            <div class="col-md-10">
              <select name="kriteria" id="kriteria" class="form-control select2">
                <option value="">.:Pilih:.</option>
                @foreach ($kriteria as $item)
                    <option value="{{ $item->id }}"> {{$item->kriteria }} </option>
                @endforeach
            </select>


            </div>
          </div>

          

          <div class="pt-4">            
            <a href="{{ route('alternatif.index') }}" class="btn btn-warning  btn-label-secondary waves-effect">Cancel</a>
            <button type="button" class="btn btn-info btn-label-secondary waves-effect reset">Reset</button>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
          </div>

        </form>
        </div>

        
      </div>

</div>

@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
        var resetButton = document.querySelector('.reset');

        resetButton.addEventListener('click', function () {
            var form = document.getElementById('myForm'); // Replace 'myForm' with the actual ID of your form
            form.reset();
        });
    });
 $(document).ready(function() {
        $('.select2').select2();

    });

</script>
@endsection