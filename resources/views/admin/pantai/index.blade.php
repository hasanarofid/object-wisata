@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Pantai /</span> Tables</h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="card-header flex-column flex-md-row">
              <div class="head-label text-center">
                <h5 class="card-title mb-0">Data Pantai</h5>
              </div>
              <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                
                    <a href="{{ route('pantai.create') }}" class="btn btn-sm btn-primary" role="button">
                        <i class="ti ti-plus me-sm-1"></i> Add New Record
                    </a>
               
                </div>
              </div>
            </div>
            
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
            
            <table class="datatables-basic table dataTable no-footer dtr-column" id="data_tabel"  style="width: 961px;">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Biaya Masuk</th>
                    <th>Fasilitas</th>
                    <th>Wahana</th>
                    <th>Waktu Operasional</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($model as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><img class="img-fluid d-block" src="{{ asset('pantai/' . $item->gambar) }}" alt="{{ $item->gambar }}" width="100px" > </td>
                        <td> {{ $item->nama}} </td>
                        <td> {{ $item->lokasi }} </td>
                        <td> {{ $item->biaya_masuk }} </td>
                        <td> {{ $item->fasilitas }} </td>
                        <td> {{ $item->wahana }} </td>
                        <td> {{ $item->waktu_operasional }} </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Action Buttons">
                                <a href="{{ route('pantai.show', $item->id) }}" class="btn btn-sm btn-info" role="button">
                                    <i class="fas fa-info-circle"></i> Detail
                                </a>
                                <a href="{{ route('pantai.edit', $item->id) }}" class="btn btn-sm btn-warning" role="button">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                        
                                <form method="POST" action="{{ route('pantai.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    
                @endforeach

              </tbody>
            </table>


          </div>
        </div>
      </div>
      <!-- Modal to add new record -->
      <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
          <form class="add-new-record pt-0 row g-2 fv-plugins-bootstrap5 fv-plugins-framework" id="form-add-new-record" onsubmit="return false" novalidate="novalidate">
            <div class="col-sm-12 fv-plugins-icon-container">
              <label class="form-label" for="basicFullname">Full Name</label>
              <div class="input-group input-group-merge has-validation">
                <span id="basicFullname2" class="input-group-text">
                  <i class="ti ti-user"></i>
                </span>
                <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2">
              </div>
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-sm-12 fv-plugins-icon-container">
              <label class="form-label" for="basicPost">Post</label>
              <div class="input-group input-group-merge has-validation">
                <span id="basicPost2" class="input-group-text">
                  <i class="ti ti-briefcase"></i>
                </span>
                <input type="text" id="basicPost" name="basicPost" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2">
              </div>
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-sm-12 fv-plugins-icon-container">
              <label class="form-label" for="basicEmail">Email</label>
              <div class="input-group input-group-merge has-validation">
                <span class="input-group-text">
                  <i class="ti ti-mail"></i>
                </span>
                <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com">
              </div>
              <div class="fv-plugins-message-container invalid-feedback"></div>
              <div class="form-text">You can use letters, numbers &amp; periods</div>
            </div>
            <div class="col-sm-12 fv-plugins-icon-container">
              <label class="form-label" for="basicDate">Joining Date</label>
              <div class="input-group input-group-merge has-validation">
                <span id="basicDate2" class="input-group-text">
                  <i class="ti ti-calendar"></i>
                </span>
                <input type="text" class="form-control dt-date flatpickr-input" id="basicDate" name="basicDate" aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" readonly="readonly">
              </div>
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-sm-12 fv-plugins-icon-container">
              <label class="form-label" for="basicSalary">Salary</label>
              <div class="input-group input-group-merge has-validation">
                <span id="basicSalary2" class="input-group-text">
                  <i class="ti ti-currency-dollar"></i>
                </span>
                <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary" placeholder="12000" aria-label="12000" aria-describedby="basicSalary2">
              </div>
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 waves-effect waves-light">Submit</button>
              <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
            <input type="hidden">
          </form>
        </div>
      </div>
    <!--/ DataTable with Buttons -->

  </div>
  
@endsection