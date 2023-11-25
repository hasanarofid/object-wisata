@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">User Admin /</span> Detail</h4>
    <div class="card ">
        <h5 class="card-header">Form Detail</h5>
        <div class="card-body">
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-1"> : </div>
            <div class="col-md-9">
                <label class="col-form-label">{{ $model->name}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Username</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->username}}</label>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-1"> : </div>

            <div class="col-md-9">
                <label class="col-form-label">{{ $model->email}}</label>
            </div>

          </div>


        </div>

        
      </div>

</div>

@endsection