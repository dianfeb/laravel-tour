@extends('front.layouts.template')
@section('title', 'Our Blog')
@section('content')
<section class="box-section box-breadcrumb background-100">
    <div class="container"> 
      <ul class="breadcrumbs"> 
        <li> <a href="/">Home</a><span class="arrow-right"> 
            <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></span></li>
        
        <li> <span class="text-breadcrumb">Our Blog</span></li>
      </ul>
    </div>
  </section>

  <section class="section-box box-news box-news-blog-2 ">
    <div class="container"> 
      <div class="box-list-news wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> 
        <div class="row">
          @foreach ($data as $item)
          <div class="col-lg-4 col-md-6 ">
            <div class="card-news background-card hover-up">
              <div class="card-image"> 
               <a class="wish" href="#">
                  <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></a><img src="{{ asset('storage/images/article/'. $item->img) }}" alt="Travila">
              </div>
              <div class="card-info"> 
                <div class="card-meta"> <span class="post-date neutral-1000">{{ $item->formatted_created_at  }}</span></div>
                <div class="card-title"> <a class="text-xl-bold neutral-1000" href="/blog-detail">{{ $item->title }}</a></div>
                <div class="card-desc"> 
                  <p class="text-md-medium neutral-500"> {!! Str::limit($item->desc, 100) !!}</p>
                </div>
                <div class="card-program"> 
                  <div class="endtime"> 
                    <div class="card-author">
                      <p class="text-sm-bold neutral-1000">Admin</p>
                    </div>
                    <div class="card-button"> <a class="btn btn-gray" href="/blog-detail">Keep Reading</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
         
        </div>
      </div>
    </div>
  </section>
@endsection