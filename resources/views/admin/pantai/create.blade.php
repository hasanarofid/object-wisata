@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Master Pantai /</span> Add Pantai</h4>
    <div class="card ">
        <h5 class="card-header">Form</h5>
        <div class="card-body">
            <form action="{{ route('pantai.store') }}" method="POST">
                @csrf
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


          <div class="pt-4">
            <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Save</button>
          </div>

        </form>
        </div>

        
      </div>

</div>

@endsection