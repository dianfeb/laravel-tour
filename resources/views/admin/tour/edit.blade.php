@extends('admin.layouts.template');
@section('title', 'Create Data')
    
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
                    <form class="form form-vertical" action="{{ url('tour/'.$data->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="oldImg" value="{{$data->img}}">
                        <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first-category-vertical">Kategori</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="category_id" value="{{ old('category_id', $data->category_id)  }}">
                                        <option value="" hidden>-- choose --</option>
                                        @foreach ($category as $row)
                                        @if ($row->id == $data->category_id)
                                        <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                        @else
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endif
                                        
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="first-category-vertical mb-4">Lokasi</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="location_id" value="{{ old('location_id', $data->location_id)  }}">
                                        <option value="" hidden>-- choose --</option>
                                        @foreach ($location as $row)
                                        @if ($row->id == $data->location_id)
                                        <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                        @else
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endif
                                        
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="first-name-vertical">Paket Wisata</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ old('name', $data->name)  }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="harga-id-vertical">harga</label>
                            <input type="text" id="harga-id-vertical" class="form-control" name="price" value="{{ old('price', $data->price)  }}">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File upload (Max 2Mb)</label>
                                <div class="form-file">
                                    <img src="{{asset('storage/images/tour/'.$data->img)}}" alt="" width="100px"><br>
                                        <small>Gambar Lama </small><br>
                                    <input type="file" name="img" class="form-control form-file-input"
                                        id="customFile" >
                                        
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                            <label for="first-name-vertical">Duration</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="duration" value="{{ old('duration', $data->duration)  }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Desc</label>
                                <textarea class="form-control" id="ckeditor" rows="3" name="desc">{{ old('desc', $data->desc) }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Itinerary</label>
                                <textarea class="form-control" id="ckeditor2" rows="3" name="itinerary">{{ old('itinerary', $data->itinerary)  }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Facility</label>
                                <textarea class="form-control" id="ckeditor3" rows="3" name="facility">{{ old('facilty', $data->facility)  }}</textarea>
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
    CKEDITOR.replace('ckeditor2', options);
    CKEDITOR.replace('ckeditor3', options);
    

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