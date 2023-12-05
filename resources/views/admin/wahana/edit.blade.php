@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Wahana /</span> Edit Wahana</h4>
    <div class="card ">
        <h5 class="card-header">Form</h5>
        <div class="card-body">
            <form action="{{ route('wahana.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $model->id }}">
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
              <input class="form-control" value="{{ $model->nama }}" type="text" name="nama" required  id="html5-text-input">
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