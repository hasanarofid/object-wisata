@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Kriteria /</span> Edit Kriteria</h4>
    <div class="card ">
        <h5 class="card-header">Form</h5>
        <div class="card-body">
            <form action="{{ route('kriteria.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $model->id }}">
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama Kreteria</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="kriteria" value="{{ $model->kriteria }}" required  id="kriteria">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Definisi</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="difinisi" value="{{ $model->difinisi }}"   id="difinisi">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Parameter</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="parameter"  value="{{ $model->parameter }}"  id="parameter">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nilai</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="nilai"  value="{{ $model->nilai }}"  id="nilai">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Skala Prioritas </label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="prioritas" value="{{ $model->prioritas }}"   id="prioritas">
            </div>
          </div>
          



          <div class="pt-4">
            <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
          </div>

        </form>
        </div>

        
      </div>

</div>

@endsection