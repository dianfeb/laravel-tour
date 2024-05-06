@extends('admin.layouts.template')
@section('title', 'Berita Purworejo | Update article')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update Article</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Article</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('article/'.$data->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="oldImg" value="{{$data->img}}">
                        <div class="row">


                      
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Title</label>
                                    <input type="text" class="form-control" id="basicInput" name="title"
                                        placeholder="Enter title" value="{{ old('title', $data->title) }}">
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>File upload (Max 2Mb)</label>
                                    <div class="form-file">
                                        <img src="{{asset('storage/images/article/'.$data->img)}}" alt="" width="100px"><br>
                                            <small>Gambar Lama </small><br>
                                        <input type="file" name="img" class="form-control form-file-input"
                                            id="customFile" >
                                            
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Description</label>
                                    <textarea id="ckeditor" name="desc" rows="10">{{ old('desc', $data->desc)  }}</textarea>
                                </div>
                            </div>
                        </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
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
</script>
@endpush