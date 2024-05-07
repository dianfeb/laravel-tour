@extends('admin.layouts.template')

@section('content')
<section class="section">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Slider</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Slider</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('slider/create') }}" class="btn btn-outline-primary mb-3">Add Data</a>
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
                                    <td><img src="{{ asset('storage/images/slider/' . $row->img) }}"
                                        style="width:150px">
                                    </td>
                                    <td>
                                        <a href="{{ url('slider/'.$row->id.'/edit') }}" class="btn btn-outline-warning">
                                            <i class="badge-circle badge-circle-white text-secondary font-medium-1"
                                                data-feather="edit"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-delete"  href="#" onClick="deleteSlider(this)" data-id="{{ $row->id }}">
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

{{-- modal create data --}}

    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Add slider </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('slider') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="mb-2">slider </label>
                        <div class="form-group">
                            <input type="text" placeholder="Please input slider"
                                class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    
    
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
                url: '/slider/' + id,
                dataType: "json",
                success: function(response) {
                  Swal.fire({
                    title: 'Success',
                    text: response.message,
                    icon: 'success',
                  }).then((result) => {
                    window.location.href = '/slider';
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
