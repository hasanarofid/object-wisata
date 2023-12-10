@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Kriteria /</span> Edit Kriteria</h4>
    <div class="card ">
        <h5 class="card-header">Form</h5>
        <div class="card-body">
            <form id="myForm" action="{{ route('kriteria.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $model->id }}">
                <div class="mb-3 row">
                  <label for="html5-text-input" class="col-md-2 col-form-label">Nama Kreteria</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" name="nama_kriteria" value="{{ $model->nama_kriteria }}" required  id="nama_kriteria">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="html5-text-input" class="col-md-2 col-form-label">Tipe Kreteria</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" name="tipe_kriteria"  value="{{ $model->tipe_kriteria }}"  id="tipe_kriteria">
                  </div>
                </div>
      
                <div class="mb-3 row">
                  <label for="html5-text-input" class="col-md-2 col-form-label">Skala Prioritas</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" name="skala_prioritas" value="{{ $model->skala_prioritas }}"   id="skala_prioritas">
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
