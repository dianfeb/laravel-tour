@extends('admin.layouts.template')
@section('title', 'Detail Wisata')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
<section class="section">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Wisata</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Wisata</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table class='table table-striped' id="table1">
                        
                        <tbody>

                            <tr>
                                <th>Image</th>
                                <td>:
                                    <a href="{{ asset('storage/images/tour/' . $data->img) }}" target="_blank">
                                        <img src="{{ asset('storage/images/tour/' . $data->img) }}"
                                            style="width:200px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>: {{ $data->category->name }}</td>
                            </tr>

                            <tr>
                                <th>Lokasi</th>
                                <td>: {{ $data->location->name }}</td>
                            </tr>

                            <tr>
                                <th>Paket Wisata</th>
                                <td>: {{ $data->name }}</td>
                            </tr>

                            <tr>
                                <th>Durasi</th>
                                <td>: {{ $data->duration }}</td>
                            </tr>

                            <tr>
                                <th>Harga</th>
                                <td>: {{ $data->price }}</td>
                            </tr>

                            <tr>
                                <th>Deskripsi</th>
                                <td>: {!! $data->desc !!}</td>
                            </tr>

                            <tr>
                                <th>Itinerary</th>
                                <td>: {!! $data->itinerary !!}</td>
                            </tr>

                            <tr>
                                <th>Fasilitas</th>
                                <td>: {!!  $data->facility !!}</td>
                            </tr>

                            <th>
                                <div class="">
                                    <a class="btn btn-danger" href="{{ url('tour') }}">Back</a>
                                   </div>
                            </th>
                     
                        </tbody>
                       
                    </table>
                </div>
            </div>
    </section>
</section>


@endsection
