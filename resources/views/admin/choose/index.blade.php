@extends('admin.layouts.template')

@section('content')
<section class="section">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Why Choose Us</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Why Choose Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('choose/create') }}" class="btn btn-outline-primary mb-3">Add Data</a>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="my-3">
                            <div class="alert alert-success">
                                <ul>
                                    {{ session('success') }}
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <table class='table table-striped' id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td><img src="{{ asset('storage/images/choose/' . $row->img) }}"
                                        style="width:150px">
                                    </td>
                                    <td>
                                        <a href="{{ url('choose/'.$row->id.'/edit') }}" class="btn btn-outline-warning">
                                            <i class="badge-circle badge-circle-white text-secondary font-medium-1"
                                                data-feather="edit"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-delete"  href="#" onClick="deleteChoose(this)" data-id="{{ $row->id }}">
                                            <i class="badge-circle badge-circle-white text-secondary font-medium-1"
                                                data-feather="trash-2"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
</section>


    
    
    @push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const swal = $('.swal').data('swal');
        if (swal) {
          Swal.fire({
            'title': 'Success',
            'text' : swal,
            'icon' : 'success',
            'showConfirmButton' :false,
            'timer' : 2500
          })
        }
     
        function deleteSlider(e) {
          let id = e.getAttribute('data-id');
     
          Swal.fire({
            title: 'Delete',
            text: 'Are you sure?',
            icon: 'question',
            showCancelButton: true,
            ConfirmButtonColor: '#d33',
            cancelButtonColor:  '#3885d6',
            confirmButtonText: 'Delete!',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.value) {
              $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: '/choose/' + id,
                dataType: "json",
                success: function(response) {
                  Swal.fire({
                    title: 'Success',
                    text: response.message,
                    icon: 'success',
                  }).then((result) => {
                    window.location.href = '/choose';
                  })
                },
                error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
              });
            }
          })
        }
    </script>
    @endpush

@endsection
