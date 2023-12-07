@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">User Admin /</span> Add User</h4>
    <div class="card ">
        <h5 class="card-header">Form</h5>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST" id="myForm">
                @csrf
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="name" required  id="html5-text-input">
            </div>
          </div>
          <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Username</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="username" required  id="html5-text-input">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-10">
              <input class="form-control" type="email" name="email"  id="html5-email-input">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
            <div class="col-md-10">
              <input class="form-control" type="password" name="password" id="html5-password-input">
            </div>
          </div>

          <div class="pt-4">            
            <a href="{{ route('user.index') }}" class="btn btn-warning  btn-label-secondary waves-effect">Cancel</a>
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