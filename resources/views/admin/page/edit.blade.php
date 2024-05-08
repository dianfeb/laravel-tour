@extends('admin.layouts.template')
@section('title', 'Laravel Tour | Update ' . $data->name)
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update {{ $data->name }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update {{ $data->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

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
                            {{ session('success')}}
                        </ul>
                    </div>
                </div>
                @endif
            </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('page/'.$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Assuming you are updating a resource, adjust accordingly -->
                        <input type="hidden" name="oldImg" value="{{$data->img}}">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="basicInput" name="name"
                                        placeholder="Enter name" value="{{ old('name', $data->name)  }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            @if ($data['type']=='text')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Value</label>
                                    <input type="text" class="form-control @error('value') is-invalid @enderror" id="basicInput" name="value"
                                        placeholder="Enter value" value="{{ old('value', $data->value)  }}">
                                        @error('value')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            @endif

                            @if ($data['type'] == 'images')
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>File upload (Max 2Mb)</label>
                                    <div class="form-file">
                                        <img src="{{asset('storage/images/page/'. $data->img)}}" alt="" width="100px"><br>
                                            <small>Gambar Lama </small><br>
                                        <input type="file" name="img" class="form-control form-file-input"
                                            id="customFile" >
                                            
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($data['type'] == 'desc')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Description</label>
                                    <textarea id="ckeditor" name="value" rows="10">{{ old('value', $data->value)  }}</textarea>
                                </div>
                            </div>
                                
                            @endif

                         


                          


                        </div>

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