@extends('admin.layouts.template')
@section('title', 'Berita Purworejo | Create article')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Article</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Article</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('article') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="basicInput" name="title"
                                        placeholder="Enter title" value="{{ old('title')  }}">
                                </div>
                            </div>

                            @error('title')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>File upload (Max 2Mb)</label>
                                    <div class="mt-1">
                                        <img src="" alt="" class="img-thumbnail img-preview" width="100px">
                                      </div>
                                    <div class="form-file">
                                        <input type="file" name="img" class="form-control form-file-input @error('img') is-invalid @enderror"
                                            id="customFile">
                                    </div>
                                </div>
                            </div>

                            @error('img')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Description</label>
                                    <textarea id="ckeditor" class="@error('img') is-invalid @enderror" name="desc" rows="10" value="{{ old('desc')  }}"></textarea>
                                </div>
                            </div>
                        </div>

                        @error('desc')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="submit" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        </section>
        <!-- Basic Inputs end -->


    </div>

    </div>
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