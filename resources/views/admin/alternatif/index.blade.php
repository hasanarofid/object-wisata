@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Alternatif /</span> Tables</h4>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="card-header flex-column flex-md-row">
              <div class="head-label text-center">
                <h5 class="card-title mb-0">Data Alternatif</h5>
              </div>
              <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                
                    <a href="{{ route('alternatif.create') }}" class="btn btn-sm btn-primary" role="button">
                        <i class="ti ti-plus me-sm-1"></i> Add New Record
                    </a>
               
                </div>
              </div>
            </div>
            
           
            
            <table class="datatables-basic table dataTable no-footer dtr-column" id="data_tabel"  style="width: 961px;">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Alternatif</th>
                    <th>K1</th>
                    <th>K2</th>
                    <th>K3</th>
                    <th>K4</th>
                    <th>K5</th>
                    <th>K6</th>
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
                        <td> {{ $item->pantai->nama}} </td>
                        <td> {{ $item->k1}} </td>
                        <td> {{ $item->k2}} </td>
                        <td> {{ $item->k3}} </td>
                        <td> {{ $item->k4}} </td>
                        <td> {{ $item->k5}} </td>
                        <td> {{ $item->k6}} </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Action Buttons">
                                <a href="{{ route('alternatif.show', $item->id) }}" class="btn btn-sm btn-info" role="button">
                                    <i class="fas fa-info-circle"></i> Detail
                                </a>
                                <a href="{{ route('alternatif.edit', $item->id) }}"  class="btn btn-sm btn-warning" role="button">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                        
                                <form method="POST" action="{{ route('alternatif.destroy', $item->id) }}" id="deleteForm{{ $item->id }}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $item->id }}')">
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

  </div>
  
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(itemId) {
        Swal.fire({
            title: 'Apakah anda yakin menghapus data ini?',
            text: 'Klik Yakin untuk melanjutkan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yakin'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form when the user confirms
                document.getElementById('deleteForm' + itemId).submit();
            }
        });
    }
</script>
@endsection
