@extends('admin.layouts.template');
@section('title', 'Create Data')
    
@section('content')
<div class="page-title">
    <div class="row mb-4">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data</h3>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
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
                    <form class="form form-vertical" action="{{ url('testimonial') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                        <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                            <label for="first-name-vertical">Nama</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ old('name')  }}" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="first-name-vertical">Rating</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="rating" value="{{ old('rating')  }}" placeholder="Masukkan Nama">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                            <label for="first-name-vertical">Kota</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="city" value="{{ old('city')  }}" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                               <p>File upload (Max 2Mb)</p>
                               <div class="mt-1 mb-1">
                                <img src="" alt="" class="img-thumbnail img-preview" width="100px">
                              </div>
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile" name="img" value="{{ old('img')  }}">
                                
                            </div>
                           </div>
                        </div>

                       

                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Desc</label>
                                <textarea class="form-control" id="ckeditor" rows="3" name="desc" value="{{ old('desc')  }}"></textarea>
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
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
      clipboard_handleImages:false
    };
  </script>
<script>
    CKEDITOR.replace('ckeditor', options);
  

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