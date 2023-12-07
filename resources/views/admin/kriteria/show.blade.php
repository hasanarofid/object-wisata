@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Kriteria /</span> Detail Kriteria</h4>
    <div class="card ">
        <h5 class="card-header">Form Detail</h5>
        <div class="card-body">
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama Kreteria</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
                <label class="col-form-label">{{ $model->kriteria}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Definisi</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->difinisi}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-email-input" class="col-md-2 col-form-label">Parameter</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->parameter}}</label>
            </div>

          </div>

          <div class="mb-3 row">
            <label for="html5-email-input" class="col-md-2 col-form-label">Nilai</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->nilai}}</label>
            </div>

          </div>

          <div class="mb-3 row">
            <label for="html5-email-input" class="col-md-2 col-form-label">Skala Prioritas</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->prioritas}}</label>
            </div>

          </div>
          <div class="pt-4">
            <a href="{{ route('kriteria.index') }}" class="btn btn-info" ><i class="fa fa-arrow-left mr-2 ml-2" aria-hidden="true"></i> Kembali</a>
          </div>

        </div>

        
      </div>

</div>

@endsection