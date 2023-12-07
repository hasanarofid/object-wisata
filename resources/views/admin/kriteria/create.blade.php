@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Kriteria /</span> Add User</h4>
    <div class="card ">
        <h5 class="card-header">Form</h5>
        <div class="card-body">
            <form id="myForm"  action="{{ route('kriteria.store') }}" method="POST">
                @csrf
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama Kreteria</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="kriteria" required  id="kriteria">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Definisi</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="difinisi"   id="difinisi">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Parameter</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="parameter"   id="parameter">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nilai</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="nilai"   id="nilai">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Skala Prioritas </label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="prioritas"   id="prioritas">
            </div>
          </div>
          



          <div class="pt-4">            
            <a href="{{ route('kriteria.index') }}" class="btn btn-warning  btn-label-secondary waves-effect">Cancel</a>
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
