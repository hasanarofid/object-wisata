@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">alternatif /</span> Detail alternatif</h4>
    <div class="card ">
        <h5 class="card-header">Form Detail</h5>
        <div class="card-body">
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Pantai/Alterntif</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
                <label class="col-form-label">{{ $model->pantai->nama}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">K1</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->k1}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">k2</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->k2}}</label>
            </div>
          </div>


          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">k3</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->k3}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">k4</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->k4}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">k5</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->k5}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">k6</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->k6}}</label>
            </div>
          </div>


          <div class="pt-4">
            <a href="{{ route('alternatif.index') }}" class="btn btn-info" ><i class="fa fa-arrow-left mr-2 ml-2" aria-hidden="true"></i> Kembali</a>
          </div>
        </div>

        
      </div>

</div>

@endsection