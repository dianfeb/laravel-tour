@extends('front.layouts.template')

@section('content')

<section class="bd-breadcrumb-area p-relative fix">
    <!-- breadcrumb background image -->
    <div class="bd-breadcrumb-bg" data-background="{{ asset('storage/images/breadcrumb-bg.png') }}" style="background-image: url(&quot;{{ asset('storage/images/breadcrumb-bg.png') }}&quot;);"></div>
    <div class="bd-breadcrumb-wrapper p-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                        <div class="bd-breadcrumb-content text-center">
                            <h1 class="bd-breadcrumb-title">{{ $category }}</h1>
                            <div class="bd-breadcrumb-list">
                                <span><a href="index.html"><i class="icon-home"></i>Paket Wisata</a></span>
                                <span>{{ $category }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================ Popular Venues Start ================================== -->
<section class="gray-simple">
    <div class="container">

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                <div class="secHeading-wrap text-center mb-5">
                    <h2>Hot & Trending Venues</h2>
                    <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gy-4 gx-xl-3 gx-3">

            @foreach ($data as $item)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="pop-touritem">
                    <div class="card rounded-3 border m-0">
                        <div class="flight-thumb-wrapper">
                            <div class="popFlights-item-overHidden">
                                <img src="{{ asset('storage/images/tour/' . $item->img) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="touritem-middle position-relative p-3">
                            <div class="touritem-flexxer">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="city fs-6 m-0 fw-bold">
                                        <span>{{ $item->name }}</span>
                                    </h4>
                                    
                                </div>
                                <div class="detail ellipsis-container mt-2">
                                    <p class="m-0 text-md">Cicero famously orated against his political opponent Lucius Sergius
                                        Catilina.</p>
                                </div>
                                <div class="flight-footer">
                                    <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span class="price">{{ $item->price }}</span></h5>
                                    <div class="rates">
                                        <div class="rat-reviews">
                                            <span>{{ $item->duration }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-wrapes d-flex align-items-center mt-3">
                                <button class="btn btn-md btn-light-primary fw-medium rounded full-width me-2">Request Book<i
                                        class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                <button class="btn btn-md btn-light-success fs-5 px-3 rounded ms-1"><i
                                        class="fa-solid fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        
            
        </div>
    </div>
</section>
<!-- ============================ Popular Venues Start ================================== -->

    
@endsection