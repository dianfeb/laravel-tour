@extends('admin.layouts.template')
@section('title', 'Gallery')

@section('content')
<section class="section">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Gallery</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-outline-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#inlineForm">Add
                        Data</button>
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
                                    <td><img src="{{ asset('storage/images/gallery/'. $row->img) }}" style="width: 150px" alt=""></td>
                                    <td>
                                        <button class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#inlineFormUpdate{{ $row->id }}">
                                            <i class="badge-circle badge-circle-white text-secondary font-medium-1"
                                                data-feather="edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-delete"  href="#" onClick="deleteGallery(this)" data-id="{{ $row->id }}">
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
                    <h4 class="modal-title" id="myModalLabel33">Add Gallery</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form class="form form-vertical" action="{{ url('gallery') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Nama</label>
                                <input type="text" id="first-name-vertical" class="form-control"
                                    name="name" value="{{ old('name') }}"
                                    placeholder="Masukkan Nama Slider">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <p>File upload (Max 2Mb)</p>
                                <div class="mt-1 mb-1">
                                    <img src="" alt="" class="img-thumbnail img-preview"
                                        width="100px">
                                </div>
                                <div class="form-file">
                                    <input type="file" class="form-file-input" id="customFile"
                                        name="img" value="{{ old('img') }}">

                                </div>
                            </div>
                        </div>


                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>


    {{-- modal update data --}}

    @foreach ($data as $row)
    <div class="modal fade text-left" id="inlineFormUpdate{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Add Category </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ url('gallery/'.$row->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="oldImg" value="{{$row->img}}">
                <div class="modal-body">
                    <label class="mb-2">Category </label>
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $row->name) }}">
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>File upload (Max 2Mb)</label>
                            <div class="form-file">
                                <img src="{{asset('storage/images/gallery/'.$row->img)}}" alt="" width="100px"><br>
                                    <small>Gambar Lama </small><br>
                                <input type="file" name="img" class="form-control form-file-input"
                                    id="customFile" >
                                    
                            </div>
                        </div>
                    </div>
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
    @endforeach
    <!--login form Modal -->
    
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
     
        function deleteCategory(e) {
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
                url: '/category/' + id,
                dataType: "json",
                success: function(response) {
                  Swal.fire({
                    title: 'Success',
                    text: response.message,
                    icon: 'success',
                  }).then((result) => {
                    window.location.href = '/category';
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
    <script>
      
        $("#customFile").change(function() {
          previewImage(this);
        });
    
        function previewImage(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function(e) {
              $('.img-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
    </script>
    @endpush

@endsection
