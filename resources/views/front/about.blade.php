@extends('front.layouts.template')
@section('title', 'About Us')
@section('content')
<section class="box-section box-breadcrumb background-100">
    <div class="container"> 
      <ul class="breadcrumbs"> 
        <li> <a href="/">Home</a><span class="arrow-right"> 
            <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></span></li>
        
        <li> <span class="text-breadcrumb">About Us</span></li>
      </ul>
    </div>
  </section>

  <section class="about-section">
    <div class="container">

        <div class="row align-items-center justify-content-between g-4">

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="">
                    <h2 class="lh-base fs-1 fw-bold mb-3">Tentang Kami</h2>
                    {!! $data->value !!}
                </div>
            </div>

            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="position-relative">
                    <img src="{{ asset('storage/images/config/'. $data->img) }}" class="img-fluid" alt="">
                </div>
            </div>

        </div>

    </div>
</section>

  @endsection