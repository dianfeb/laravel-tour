@extends('admin.layouts.template');
@section('title', 'Update Data')
    
@section('content')
<div class="page-title">
    <div class="row mb-4">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Update Data</h3>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Data</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
    
<section class="section">
    <div class="row">
      
        <div class="col-md-12 col-12">
            <div class="card">
            
    
                <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ url('car/'.$data->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="oldImg" value="{{$data->img}}">
                        <div class="form-body">
                        <div class="row">
                       
                      
                        <div class="col-6">
                            <div class="form-group">
                            <label for="name-id-vertical">Name</label>
                            <input type="text"  class="form-control" name="name" value="{{ old('name', $data->name)  }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                            <label for="harga-id-vertical">Harga</label>
                            <input type="text" class="form-control" name="price" value="{{ old('price', $data->price)  }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                            <label for="kapasitas-id-vertical">Kapasitas</label>
                            <input type="text" class="form-control" name="capacity" value="{{ old('capacity', $data->capacity)  }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                            <label for="durasi-id-vertical">Durasi</label>
                            <input type="text" class="form-control" name="duration" value="{{ old('duration', $data->duration)  }}">
                            </div>
                        </div>

                        
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File upload (Max 2Mb)</label>
                                <div class="form-file">
                                    <img src="{{asset('storage/images/car/'.$data->img)}}" alt="" width="100px"><br>
                                        <small>Gambar Lama </small><br>
                                    <input type="file" name="img" class="form-control form-file-input"
                                        id="customFile" >
                                        
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
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
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