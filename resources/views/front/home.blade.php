@extends('front.layouts.template')

@section('title', 'Home | Laravel Tour')


@section('content')

    <section class="section-box box-banner-home7 background-body">
        <div class="container"></div>
        <div class="container-banner-home7">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-1">
                    <div class="swiper-wrapper">
						@foreach ($slider as $item)
						<div class="swiper-slide">
                            <div class="item-banner-slide"
                                style="background-image: url({{ asset('storage/images/slider/' .$item->img) }})">
                                <div class="container"> 
									
                                    <h1 class="mt-20 mb-20 color-white">{{ $item->name }}</h1>
                                    <h5 class="color-white">{!! $item->desc !!}</h5>
                                </div>
                            </div>
                        </div>
						@endforeach
                       
                        
                    </div>
                    <div class="swiper-pagination swiper-pagination-group-1 swiper-pagination-style-2"></div>
                </div>
            </div>
        </div>
        <div class="container-search-advance">
            <div class="container">
                <div class="box-search-advance background-card wow fadeInUp">
                    <div class="box-top-search">
                        <div class="left-top-search">
							<a class="category-link btn-click active" href="#">Tours</a></div>
                        <div class="right-top-search"><a class='text-sm-medium need-some-help' href='/help-center'>Need some
                                help?</a></div>
                    </div>
                    <div class="box-bottom-search background-card">
                        <div class="item-search">
                            <label class="text-sm-bold neutral-500">Location</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-dropdown-search location-search"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">New York, USA</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Paris, France</a></li>
                                    <li><a class="dropdown-item" href="#">Tokyo, Japan</a></li>
                                    <li><a class="dropdown-item" href="#">New York City, USA</a></li>
                                </ul>
                            </div>
                        </div>
						<div class="item-search">
                            <label class="text-sm-bold neutral-500">Location</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-dropdown-search location-search"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">New York, USA</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Paris, France</a></li>
                                    <li><a class="dropdown-item" href="#">Tokyo, Japan</a></li>
                                    <li><a class="dropdown-item" href="#">New York City, USA</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item-search bd-none d-flex justify-content-end">
                            <button class="btn btn-black-lg">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 19L14.6569 14.6569M14.6569 14.6569C16.1046 13.2091 17 11.2091 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17C11.2091 17 13.2091 16.1046 14.6569 14.6569Z"
                                        stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <section class="section-box box-flights background-body">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-9 mb-30 wow fadeInUp">
                    <h2 class="title-svg neutral-1000 mb-15">
                        <svg width="27" height="39" viewbox="0 0 27 39" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.9721 38.9991C8.7171 38.9991 4.81518 36.9218 2.26676 33.3001C-2.75855 26.158 2.51539 14.3625 2.74208 13.8636C2.9258 13.4594 3.52612 13.5316 3.60747 13.9699C3.76126 14.8015 4.29256 16.7779 5.15293 17.7806C5.10151 14.7925 5.50964 5.77322 11.837 0.116751C12.0555 -0.0784021 12.5434 -0.0722321 12.6046 0.489233C12.7694 2.00841 13.5182 7.07279 16.2396 8.45395C16.5072 8.59014 19.041 11.7859 19.4825 14.7516C19.9265 14.1746 20.5412 12.9299 20.8221 10.3182C20.8639 9.92925 21.3458 9.7702 21.6118 10.0561C21.708 10.1596 31.1506 20.547 24.5663 32.0572C22.0801 36.4045 17.7458 38.9991 12.9718 38.9991H12.9721Z"
                                fill="#FFA725"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.6808 35.7816C16.2031 35.7816 18.5162 34.5504 20.0269 32.4035C23.0058 28.1695 19.8795 21.1774 19.7451 20.8817C19.6361 20.642 19.2803 20.6849 19.2321 20.9448C19.1409 21.4377 18.826 22.6093 18.316 23.2036C18.3464 21.4322 18.1046 16.0858 14.3538 12.7326C14.2242 12.6169 13.9351 12.6206 13.8988 12.9533C13.801 13.8539 13.3572 16.8559 11.7439 17.6747C11.5853 17.7554 10.0832 19.65 9.82136 21.408C9.5581 21.0659 9.19362 20.328 9.02726 18.7798C9.00235 18.5492 8.71671 18.4548 8.55926 18.6244C8.50213 18.6859 2.90484 24.8435 6.80791 31.6665C8.28184 34.2435 10.8511 35.7816 13.6812 35.7816H13.6808Z"
                                fill="#FF871E"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.85986 33.1274C9.45699 33.1274 9.24767 32.6357 9.53674 32.3471L16.8513 25.0323C17.2775 24.6061 17.9233 25.2537 17.498 25.6787L10.1832 32.9935C10.0939 33.0829 9.97709 33.1274 9.85986 33.1274Z"
                                fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.1965 28.6139C8.66976 28.6139 8.66816 24.77 11.196 24.77C13.7241 24.77 13.7229 28.6139 11.1965 28.6139ZM11.1965 25.6834C10.3041 25.6834 9.84959 26.7698 10.4835 27.4041C11.4056 28.3264 12.8596 26.93 11.9092 25.9789C11.7189 25.7881 11.4659 25.6834 11.1965 25.6834Z"
                                fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.839 33.2555C13.3121 33.2555 13.3109 29.4119 15.839 29.4119C18.3668 29.4119 18.3666 33.2555 15.839 33.2555ZM15.839 30.3252C14.9464 30.3252 14.4923 31.4116 15.1262 32.046C16.0481 32.9685 17.5021 31.5713 16.552 30.6207C16.3616 30.4299 16.1082 30.3252 15.839 30.3252Z"
                                fill="white"></path>
                        </svg>Best Deal Package Tour
                    </h2>
                    <p class="text-xl-medium neutral-500">Quality as judged by customers. Book at the ideal price!</p>
                </div>
                <div class="col-md-3 position-relative mb-30 wow fadeInUp">
                    <div class="box-button-slider box-button-slider-team justify-content-end">
                        <div class="swiper-button-prev swiper-button-prev-style-1 swiper-button-prev-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M7.99992 3.33325L3.33325 7.99992M3.33325 7.99992L7.99992 12.6666M3.33325 7.99992H12.6666"
                                    stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="swiper-button-next swiper-button-next-style-1 swiper-button-next-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                fill="none">
                                <path d="M7.99992 12.6666L12.6666 7.99992L7.99992 3.33325M12.6666 7.99992L3.33325 7.99992"
                                    stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-flights wow fadeInUp">
                <div class="box-swiper mt-30">
                    <div class="swiper-container swiper-group-2 swiper-group-journey">
                        <div class="swiper-wrapper">
							@foreach ($tour->chunk(2) as $row)
                            <div class="swiper-slide">
								@foreach ($row as $item)
                                <div class="card-flight card-tour background-card">
                                    <div class="card-image"> <a class="wish" href="#">
                                            <svg width="20" height="18" viewbox="0 0 20 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z"
                                                    stroke="" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg></a><img src="{{ asset('storage/images/tour/' .$item->img) }}" alt="Travila">
                                    </div>
                                    <div class="card-info">
                                        <a class="btn btn-label-tag background-1"
                                            href="#">{{ $item->category->name }} </a>
                                        <div class="card-title"> <a class='heading-6 neutral-1000'
                                                href='/hotel-detail-2'>{{ $item->name }}</a>
                                        </div>
                                        <div class="card-program">
                                            <div class="card-location">
                                                <p class="text-location text-md-medium neutral-500">{{ $item->location->name }}</p>
												
                                            </div>
											<div class="card-duration">
												<p class="text-duration text-md-medium neutral-500">{{ $item->duration }}</p>
                                            </div>
                                            <div class="endtime">
                                                <div class="card-price">
                                                    <h6 class="heading-6 neutral-1000">{{ $item->price }}</h6>
                                                </div>
                                                <div class="card-button"> <a class='btn btn-gray'
                                                        href='/hotel-detail-2'>Book Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								@endforeach
                            </div>
							@endforeach

							
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box box-top-rated-3 background-body">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-6 wow fadeInUp">
                    <h2 class="neutral-1000">Top Rated Car</h2>
                    <p class="text-xl-medium neutral-500">Quality as judged by customers. Book at the ideal price!</p>
                </div>
                <div class="col-md-6 wow fadeInUp">
                    <div class="d-flex justify-content-end"><a class="btn btn-black-lg" href="#">View More
                            <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></a></div>
                </div>
            </div>
        </div>
        <div class="container-slider box-swiper-padding wow fadeInUp">
            <div class="box-swiper mt-30">
                <div class="swiper-container swiper-group-animate swiper-group-journey">
                    <div class="swiper-wrapper">
						@foreach ($car as $item)
						<div class="swiper-slide">
                            <div class="card-journey-small background-card">
                                <div class="card-image"> <a class="wish" href="#">
                                        <svg width="20" height="18" viewbox="0 0 20 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z"
                                                stroke="" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg></a><img src="{{ asset('storage/images/car/'.$item->img) }}" alt="Travila"></div>
                                <div class="card-info">
                                    <div class="card-rating">
                                        <div class="card-left"> </div>
                                       
                                    </div>
                                    <div class="card-title"> <a class='heading-6 neutral-1000'
                                            href='/hotel-detail'>{{ $item->name }}</a></div>
                                    <div class="card-program">
                                      
										<div class="card-facilities"> 
											<div class="item-facilities"> 
											  <p class="speed text-md-medium">{{ $item->duration }}</p>
											</div>
											
											<div class="item-facilities"> 
											  <p class="seats text-md-medium">{{ $item->capacity }}</p>
											</div>
										  </div>
                                        <div class="endtime">
                                            <div class="card-price">
                                                <h6 class="heading-6 neutral-1000">{{ $item->price }}</h6>
                                               
                                            </div>
                                            <div class="card-button"> <a class='btn btn-gray' href='/hotel-detail'>Book
                                                    Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						@endforeach
                      
                        
						
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box box-why-book-travila-4 background-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card-why wow fadeInUp hover-up">
                        <div class="card-image">
                            <svg width="48" height="46" viewbox="0 0 48 46" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_403_10133)">
                                    <mask id="mask0_403_10133" style="mask-type:luminance" maskunits="userSpaceOnUse"
                                        x="0" y="0" width="48" height="46">
                                        <path
                                            d="M44.819 32.7853C42.7514 37.691 38.9274 41.3068 33.347 43.6326C27.7666 45.9585 22.5864 45.6066 17.8064 42.5772C13.0264 39.5478 8.40207 35.932 3.93332 31.7298C-0.535422 27.5277 -0.980074 22.9347 2.59937 17.9507C6.17881 12.9668 10.8032 8.35425 16.4725 4.11303C22.1418 -0.128193 28.8227 -1.01748 36.5151 1.44516C44.2076 3.90781 48.0316 8.52038 47.9871 15.2829C47.9427 22.0454 46.8866 27.8795 44.819 32.7853Z"
                                            fill="white"></path>
                                    </mask>
                                    <g mask="url(#mask0_403_10133)">
                                        <path
                                            d="M44.819 32.7853C42.7514 37.691 38.9274 41.3068 33.347 43.6326C27.7666 45.9585 22.5864 45.6066 17.8064 42.5772C13.0264 39.5478 8.40207 35.932 3.93332 31.7298C-0.535422 27.5277 -0.980074 22.9347 2.59937 17.9507C6.17881 12.9668 10.8032 8.35425 16.4725 4.11303C22.1418 -0.128193 28.8227 -1.01748 36.5151 1.44516C44.2076 3.90781 48.0316 8.52038 47.9871 15.2829C47.9427 22.0454 46.8866 27.8795 44.819 32.7853Z"
                                            fill="#FFF0EC"></path>
                                    </g>
                                </g>
                                <g clip-path="url(#clip1_403_10133)">
                                    <path
                                        d="M36.7991 19.6497C37.6729 17.7727 38.3125 15.8059 38.3125 14.0681C38.3125 10.1707 35.1428 7 31.2468 7C28.502 7 26.1179 8.57373 24.9485 10.8665C24.5408 10.8313 24.1284 10.8125 23.7188 10.8125C15.9292 10.8125 9.625 17.116 9.625 24.9062C9.625 32.6958 15.9285 39 23.7188 39C31.5083 39 37.8125 32.6965 37.8125 24.9062C37.8125 23.1501 37.4973 21.3953 36.7991 19.6497ZM31.2468 8.875C34.1089 8.875 36.4375 11.2046 36.4375 14.0681C36.4375 17.7637 32.8066 23.0515 31.2166 25.1899C29.1726 22.4116 26.0562 17.511 26.0562 14.0681C26.0559 11.2046 28.3845 8.875 31.2468 8.875ZM14.7444 16.6235L21.0342 19.7683L20.3132 23.3728L17.8237 25.0325C17.563 25.2063 17.4062 25.499 17.4062 25.8125V29.8315L13.2817 31.2539C12.1519 29.4026 11.5 27.2292 11.5 24.9062C11.5 21.7131 12.7319 18.8025 14.7444 16.6235ZM14.4338 32.8398L18.6494 31.3862C19.0276 31.2559 19.2812 30.8999 19.2812 30.5V26.3142L21.6763 24.7175C21.8831 24.5796 22.0269 24.3652 22.0754 24.1213L23.0129 19.4338C23.0959 19.0193 22.8911 18.6006 22.5129 18.4116L16.2207 15.2654C18.5173 13.4751 21.3608 12.5608 24.314 12.7024C23.7209 15.7197 25.3665 19.3184 26.8965 22.0059L24.3076 24.1533C23.9229 24.4727 23.8562 25.0376 24.1562 25.4375L25.8438 27.6875H22.0938C21.5759 27.6875 21.1562 28.1072 21.1562 28.625V34.25C21.1562 34.7678 21.5759 35.1875 22.0938 35.1875H26.3855L27.2642 36.5999C22.7056 37.9846 17.655 36.604 14.4338 32.8398ZM29.0398 35.9043L27.7021 33.7546C27.531 33.4797 27.2302 33.3125 26.9062 33.3125H23.0312V29.5625H27.7188C28.4895 29.5625 28.9319 28.6799 28.4688 28.0625L26.1919 25.0266L27.8745 23.6309C29.1873 25.7019 30.3716 27.1838 30.4824 27.3213C30.8562 27.7852 31.563 27.7871 31.9392 27.3252C32.0793 27.1533 33.918 24.8787 35.5845 21.9771C35.8188 22.9292 35.9375 23.9092 35.9375 24.9062C35.9375 29.7375 33.1189 33.9226 29.0398 35.9043Z"
                                        fill="black"></path>
                                    <path
                                        d="M31.2483 17.3633C33.0615 17.3633 34.5366 15.8877 34.5366 14.0742C34.5366 12.2605 33.0613 10.7849 31.2483 10.7849C29.4351 10.7849 27.96 12.2605 27.96 14.0742C27.96 15.8877 29.4351 17.3633 31.2483 17.3633ZM31.2483 12.6599C32.0276 12.6599 32.6616 13.2944 32.6616 14.0742C32.6616 14.8538 32.0276 15.4883 31.2483 15.4883C30.469 15.4883 29.835 14.8538 29.835 14.0742C29.835 13.2944 30.469 12.6599 31.2483 12.6599Z"
                                        fill="black"></path>
                                </g>
                                <defs>
                                    <clippath id="clip0_403_10133">
                                        <rect width="48" height="45.2958" fill="white"></rect>
                                    </clippath>
                                    <clippath id="clip1_403_10133">
                                        <rect width="32" height="32" fill="white" transform="translate(8 7)">
                                        </rect>
                                    </clippath>
                                </defs>
                            </svg>
                        </div>
                        <div class="card-info">
                            <h6 class="text-xl-bold neutral-1000">300,000+ Experiences</h6>
                            <p class="text-lg-medium neutral-500">Make memories around the world.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-why wow fadeInUp hover-up">
                        <div class="card-image">
                            <svg width="48" height="46" viewbox="0 0 48 46" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_21_10174)">
                                    <mask id="mask0_21_10174" style="mask-type:luminance" maskunits="userSpaceOnUse"
                                        x="0" y="0" width="48" height="46">
                                        <path
                                            d="M44.819 32.7853C42.7514 37.691 38.9274 41.3068 33.347 43.6326C27.7666 45.9585 22.5864 45.6066 17.8064 42.5772C13.0264 39.5478 8.40207 35.932 3.93332 31.7298C-0.535422 27.5277 -0.980074 22.9347 2.59937 17.9507C6.17881 12.9668 10.8032 8.35425 16.4725 4.11303C22.1418 -0.128193 28.8227 -1.01748 36.5151 1.44516C44.2076 3.90781 48.0316 8.52038 47.9871 15.2829C47.9427 22.0454 46.8866 27.8795 44.819 32.7853Z"
                                            fill="white"></path>
                                    </mask>
                                    <g mask="url(#mask0_21_10174)">
                                        <path
                                            d="M44.819 32.7853C42.7514 37.691 38.9274 41.3068 33.347 43.6326C27.7666 45.9585 22.5864 45.6066 17.8064 42.5772C13.0264 39.5478 8.40207 35.932 3.93332 31.7298C-0.535422 27.5277 -0.980074 22.9347 2.59937 17.9507C6.17881 12.9668 10.8032 8.35425 16.4725 4.11303C22.1418 -0.128193 28.8227 -1.01748 36.5151 1.44516C44.2076 3.90781 48.0316 8.52038 47.9871 15.2829C47.9427 22.0454 46.8866 27.8795 44.819 32.7853Z"
                                            fill="#E4F9F9"></path>
                                    </g>
                                </g>
                                <path
                                    d="M35.5625 21.75V7.9375C35.5625 7.41975 35.1428 7 34.625 7H13.375C12.8572 7 12.4375 7.41975 12.4375 7.9375V21.75C12.4375 21.9986 12.5363 22.2371 12.7121 22.4129L13.2992 23L12.7121 23.5871C12.5363 23.7629 12.4375 24.0014 12.4375 24.25V38.0625C12.4375 38.5803 12.8572 39 13.375 39H34.625C35.1428 39 35.5625 38.5803 35.5625 38.0625V24.25C35.5625 24.0014 35.4637 23.7629 35.2879 23.5871L34.7008 23L35.2879 22.4129C35.4637 22.2371 35.5625 21.9986 35.5625 21.75ZM33.6875 21.3617L32.7121 22.3371C32.346 22.7032 32.346 23.2968 32.7121 23.6629L33.6875 24.6383V37.125H14.3125V24.6383L15.2879 23.6629C15.654 23.2967 15.654 22.7032 15.2879 22.3371L14.3125 21.3617V8.875H33.6875V21.3617Z"
                                    fill="black"></path>
                                <path
                                    d="M17.7672 17.1101L19.2459 18.4214C19.5478 18.6891 19.9872 18.7336 20.3367 18.5318L24.7735 15.9702L24.5962 18.7197C24.5629 19.2364 24.9548 19.6822 25.4715 19.7156C25.9882 19.749 26.434 19.3571 26.4674 18.8404L26.7252 14.8435L30.0795 12.9069C30.5279 12.648 30.6815 12.0746 30.4226 11.6262C30.1637 11.1778 29.5903 11.0242 29.142 11.2831L25.7877 13.2197L22.1973 11.4446C21.7332 11.2151 21.171 11.4053 20.9414 11.8694C20.7119 12.3336 20.9022 12.8959 21.3663 13.1254L23.836 14.3466L19.9843 16.5703L19.0112 15.7073C18.6238 15.3639 18.0313 15.3994 17.6877 15.7867C17.3442 16.1741 17.3798 16.7666 17.7672 17.1101Z"
                                    fill="black"></path>
                                <path
                                    d="M17.125 27.75H30.875C31.3928 27.75 31.8125 27.3303 31.8125 26.8125C31.8125 26.2947 31.3928 25.875 30.875 25.875H17.125C16.6072 25.875 16.1875 26.2947 16.1875 26.8125C16.1875 27.3303 16.6072 27.75 17.125 27.75Z"
                                    fill="black"></path>
                                <path
                                    d="M17.125 31.5H24C24.5178 31.5 24.9375 31.0803 24.9375 30.5625C24.9375 30.0447 24.5178 29.625 24 29.625H17.125C16.6072 29.625 16.1875 30.0447 16.1875 30.5625C16.1875 31.0803 16.6072 31.5 17.125 31.5Z"
                                    fill="black"></path>
                                <path
                                    d="M17.125 35.25H24C24.5178 35.25 24.9375 34.8303 24.9375 34.3125C24.9375 33.7947 24.5178 33.375 24 33.375H17.125C16.6072 33.375 16.1875 33.7947 16.1875 34.3125C16.1875 34.8303 16.6072 35.25 17.125 35.25Z"
                                    fill="black"></path>
                                <path
                                    d="M18.375 23.9375H19.625C20.1428 23.9375 20.5625 23.5178 20.5625 23C20.5625 22.4822 20.1428 22.0625 19.625 22.0625H18.375C17.8572 22.0625 17.4375 22.4822 17.4375 23C17.4375 23.5178 17.8572 23.9375 18.375 23.9375Z"
                                    fill="black"></path>
                                <path
                                    d="M24.625 22.0625H23.375C22.8572 22.0625 22.4375 22.4822 22.4375 23C22.4375 23.5178 22.8572 23.9375 23.375 23.9375H24.625C25.1428 23.9375 25.5625 23.5178 25.5625 23C25.5625 22.4822 25.1428 22.0625 24.625 22.0625Z"
                                    fill="black"></path>
                                <path
                                    d="M29.625 22.0625H28.375C27.8572 22.0625 27.4375 22.4822 27.4375 23C27.4375 23.5178 27.8572 23.9375 28.375 23.9375H29.625C30.1428 23.9375 30.5625 23.5178 30.5625 23C30.5625 22.4822 30.1428 22.0625 29.625 22.0625Z"
                                    fill="black"></path>
                                <path
                                    d="M29 29.625C27.4492 29.625 26.1875 30.8867 26.1875 32.4375C26.1875 33.9883 27.4492 35.25 29 35.25C30.5508 35.25 31.8125 33.9883 31.8125 32.4375C31.8125 30.8867 30.5508 29.625 29 29.625ZM29 33.375C28.4831 33.375 28.0625 32.9544 28.0625 32.4375C28.0625 31.9206 28.4831 31.5 29 31.5C29.5169 31.5 29.9375 31.9206 29.9375 32.4375C29.9375 32.9544 29.5169 33.375 29 33.375Z"
                                    fill="black"></path>
                                <defs>
                                    <clippath id="clip0_21_10174">
                                        <rect width="48" height="45.2958" fill="white"></rect>
                                    </clippath>
                                </defs>
                            </svg>
                        </div>
                        <div class="card-info">
                            <h6 class="text-xl-bold neutral-1000">Reserve now, Pay later</h6>
                            <p class="text-lg-medium neutral-500">Book your spot first, pay later.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-why wow fadeInUp hover-up">
                        <div class="card-image">
                            <svg width="48" height="46" viewbox="0 0 48 46" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_21_16353)">
                                    <mask id="mask0_21_16353" style="mask-type:luminance" maskunits="userSpaceOnUse"
                                        x="0" y="0" width="48" height="46">
                                        <path
                                            d="M44.819 32.7853C42.7514 37.691 38.9274 41.3068 33.347 43.6326C27.7666 45.9585 22.5864 45.6066 17.8064 42.5772C13.0264 39.5478 8.40207 35.932 3.93332 31.7298C-0.535422 27.5277 -0.980074 22.9347 2.59937 17.9507C6.17881 12.9668 10.8032 8.35425 16.4725 4.11303C22.1418 -0.128193 28.8227 -1.01748 36.5151 1.44516C44.2076 3.90781 48.0316 8.52038 47.9871 15.2829C47.9427 22.0454 46.8866 27.8795 44.819 32.7853Z"
                                            fill="white"></path>
                                    </mask>
                                    <g mask="url(#mask0_21_16353)">
                                        <path
                                            d="M44.819 32.7853C42.7514 37.691 38.9274 41.3068 33.347 43.6326C27.7666 45.9585 22.5864 45.6066 17.8064 42.5772C13.0264 39.5478 8.40207 35.932 3.93332 31.7298C-0.535422 27.5277 -0.980074 22.9347 2.59937 17.9507C6.17881 12.9668 10.8032 8.35425 16.4725 4.11303C22.1418 -0.128193 28.8227 -1.01748 36.5151 1.44516C44.2076 3.90781 48.0316 8.52038 47.9871 15.2829C47.9427 22.0454 46.8866 27.8795 44.819 32.7853Z"
                                            fill="#E3F0FF"></path>
                                    </g>
                                </g>
                                <path
                                    d="M29.6484 14.5312H26.8203V8.875H27.7656C28.2834 8.875 28.7031 8.45525 28.7031 7.9375C28.7031 7.41975 28.2834 7 27.7656 7H20.2344C19.7166 7 19.2969 7.41975 19.2969 7.9375C19.2969 8.45525 19.7166 8.875 20.2344 8.875H21.1797V14.5312H18.3516C16.7964 14.5312 15.5312 15.7964 15.5312 17.3516V32.4141C15.5312 33.7144 16.4161 34.8114 17.615 35.1362C17.4859 35.4592 17.4141 35.8111 17.4141 36.1797C17.4141 37.7348 18.6793 39 20.2344 39C21.7895 39 23.0547 37.7348 23.0547 36.1797C23.0547 35.8482 22.9968 35.5301 22.8912 35.2344H25.1087C25.0032 35.5301 24.9452 35.8482 24.9452 36.1797C24.9452 37.7348 26.2104 39 27.7656 39C29.3207 39 30.5859 37.7348 30.5859 36.1797C30.5859 35.8111 30.5141 35.4592 30.3849 35.1362C31.5839 34.8114 32.4687 33.7144 32.4687 32.4141V17.3516C32.4687 15.7964 31.2036 14.5312 29.6484 14.5312ZM23.0547 8.875H24.9453V14.5312H23.0547V8.875ZM21.1797 36.1797C21.1797 36.7009 20.7556 37.125 20.2344 37.125C19.7131 37.125 19.2891 36.7009 19.2891 36.1797C19.2891 35.6584 19.7131 35.2344 20.2344 35.2344C20.7556 35.2344 21.1797 35.6584 21.1797 36.1797ZM27.7656 37.125C27.2444 37.125 26.8203 36.7009 26.8203 36.1797C26.8203 35.6584 27.2444 35.2344 27.7656 35.2344C28.2869 35.2344 28.7109 35.6584 28.7109 36.1797C28.7109 36.7009 28.2869 37.125 27.7656 37.125ZM30.5938 32.4141C30.5938 32.9353 30.1697 33.3594 29.6484 33.3594H18.3516C17.8303 33.3594 17.4062 32.9353 17.4062 32.4141V17.3516C17.4062 16.8303 17.8303 16.4062 18.3516 16.4062H29.6484C30.1697 16.4062 30.5938 16.8303 30.5938 17.3516V32.4141Z"
                                    fill="black"></path>
                                <path
                                    d="M20.2344 18.2969C19.7166 18.2969 19.2969 18.7166 19.2969 19.2344V30.5312C19.2969 31.049 19.7166 31.4688 20.2344 31.4688C20.7521 31.4688 21.1719 31.049 21.1719 30.5312V19.2344C21.1719 18.7166 20.7521 18.2969 20.2344 18.2969Z"
                                    fill="black"></path>
                                <path
                                    d="M24 18.2969C23.4822 18.2969 23.0625 18.7166 23.0625 19.2344V30.5312C23.0625 31.049 23.4822 31.4688 24 31.4688C24.5178 31.4688 24.9375 31.049 24.9375 30.5312V19.2344C24.9375 18.7166 24.5178 18.2969 24 18.2969Z"
                                    fill="black"></path>
                                <path
                                    d="M27.7656 18.2969C27.2479 18.2969 26.8281 18.7166 26.8281 19.2344V30.5312C26.8281 31.049 27.2479 31.4688 27.7656 31.4688C28.2834 31.4688 28.7031 31.049 28.7031 30.5312V19.2344C28.7031 18.7166 28.2834 18.2969 27.7656 18.2969Z"
                                    fill="black"></path>
                                <defs>
                                    <clippath id="clip0_21_16353">
                                        <rect width="48" height="45.2958" fill="white"></rect>
                                    </clippath>
                                </defs>
                            </svg>
                        </div>
                        <div class="card-info">
                            <h6 class="text-xl-bold neutral-1000">Trusted Reviews</h6>
                            <p class="text-lg-medium neutral-500">4.8 stars from 160,000+ Trustpilot reviews.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-why wow fadeInUp hover-up">
                        <div class="card-image">
                            <svg width="48" height="46" viewbox="0 0 48 46" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_21_15576)">
                                    <mask id="mask0_21_15576" style="mask-type:luminance" maskunits="userSpaceOnUse"
                                        x="0" y="0" width="48" height="46">
                                        <path
                                            d="M44.819 32.7853C42.7514 37.691 38.9274 41.3068 33.347 43.6326C27.7666 45.9585 22.5864 45.6066 17.8064 42.5772C13.0264 39.5478 8.40207 35.932 3.93332 31.7298C-0.535422 27.5277 -0.980074 22.9347 2.59937 17.9507C6.17881 12.9668 10.8032 8.35425 16.4725 4.11303C22.1418 -0.128193 28.8227 -1.01748 36.5151 1.44516C44.2076 3.90781 48.0316 8.52038 47.9871 15.2829C47.9427 22.0454 46.8866 27.8795 44.819 32.7853Z"
                                            fill="white"></path>
                                    </mask>
                                    <g mask="url(#mask0_21_15576)">
                                        <path
                                            d="M44.819 32.7853C42.7514 37.691 38.9274 41.3068 33.347 43.6326C27.7666 45.9585 22.5864 45.6066 17.8064 42.5772C13.0264 39.5478 8.40207 35.932 3.93332 31.7298C-0.535422 27.5277 -0.980074 22.9347 2.59937 17.9507C6.17881 12.9668 10.8032 8.35425 16.4725 4.11303C22.1418 -0.128193 28.8227 -1.01748 36.5151 1.44516C44.2076 3.90781 48.0316 8.52038 47.9871 15.2829C47.9427 22.0454 46.8866 27.8795 44.819 32.7853Z"
                                            fill="#F6F3FC"></path>
                                    </g>
                                </g>
                                <g clip-path="url(#clip1_21_15576)">
                                    <path
                                        d="M23.9999 7C17.3643 7 11.9658 12.3984 11.9658 19.034V26.966C11.9658 33.6015 17.3643 38.9999 23.9999 38.9999C30.6354 38.9999 36.0339 33.6015 36.0339 26.966V19.034C36.0339 12.3984 30.6354 7 23.9999 7ZM34.1581 26.966C34.1581 32.5672 29.6011 37.1242 23.9999 37.1242C18.3986 37.1242 13.8416 32.5672 13.8416 26.966V19.034C13.8416 13.4328 18.3986 8.87578 23.9999 8.87578C29.6011 8.87578 34.1581 13.4328 34.1581 19.034V26.966Z"
                                        fill="black"></path>
                                    <path
                                        d="M32.2822 19.034C32.2822 14.4671 28.5667 10.7516 23.9997 10.7516C19.4328 10.7516 15.7173 14.4671 15.7173 19.034V26.966C15.7173 31.5329 19.4328 35.2484 23.9997 35.2484C27.358 35.2484 30.2558 33.2392 31.5545 30.3598C31.5552 30.3582 31.5558 30.3567 31.5566 30.3551C32.0226 29.32 32.2823 28.1728 32.2823 26.966V24.712C32.2823 24.7067 32.2823 24.7015 32.2823 24.6962V19.034H32.2822ZM24.1923 25.9264C24.1973 24.9977 24.9545 24.2436 25.8843 24.2436C26.7104 24.2436 27.429 24.8577 27.5559 25.6719C27.6144 26.0474 27.8936 26.3504 28.2631 26.4394C28.6322 26.5283 29.0191 26.3856 29.242 26.0779C29.5172 25.6981 29.9405 25.4781 30.4064 25.4706V26.9661C30.4064 27.6968 30.2831 28.3992 30.0567 29.054H23.1368C22.5445 29.054 22.0626 28.5721 22.0626 27.9798C22.0626 27.3875 22.5445 26.9056 23.1368 26.9056H23.2552C23.5058 26.9056 23.746 26.8053 23.9222 26.6271C24.0983 26.4489 24.1959 26.2076 24.193 25.957C24.1929 25.9473 24.1926 25.9374 24.1923 25.9264ZM23.9997 12.6274C27.4052 12.6274 30.1982 15.2982 30.3949 18.6552H17.6046C17.8013 15.2982 20.5943 12.6274 23.9997 12.6274ZM23.9997 33.3727C20.4671 33.3727 17.5931 30.4987 17.5931 26.9661V20.531H30.4064V23.5949C29.865 23.5989 29.3385 23.735 28.8701 23.9827C28.6891 23.7063 28.4694 23.4541 28.2157 23.2349C27.5684 22.6758 26.7405 22.3679 25.8843 22.3679C24.1975 22.3679 22.7802 23.5446 22.4105 25.1203C21.134 25.4448 20.1868 26.6038 20.1868 27.9799C20.1868 29.6065 21.5102 30.9298 23.1368 30.9298H29.0295C27.8553 32.4166 26.0371 33.3727 23.9997 33.3727Z"
                                        fill="black"></path>
                                    <path
                                        d="M22.935 16.7794H25.0647C25.5826 16.7794 26.0026 16.3595 26.0026 15.8415C26.0026 15.3236 25.5826 14.9036 25.0647 14.9036H22.935C22.417 14.9036 21.9971 15.3236 21.9971 15.8415C21.9971 16.3595 22.417 16.7794 22.935 16.7794Z"
                                        fill="black"></path>
                                </g>
                                <defs>
                                    <clippath id="clip0_21_15576">
                                        <rect width="48" height="45.2958" fill="white"></rect>
                                    </clippath>
                                    <clippath id="clip1_21_15576">
                                        <rect width="32" height="32" fill="white" transform="translate(8 7)">
                                        </rect>
                                    </clippath>
                                </defs>
                            </svg>
                        </div>
                        <div class="card-info">
                            <h6 class="text-xl-bold neutral-1000">Security Assurance</h6>
                            <p class="text-lg-medium neutral-500">Data security through encryption </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box box-banner-ads background-body">
        <div class="container">
            <div class="text-center wow fadeInUp"> <img src="assets/imgs/page/homepage7/banner-ads.png" alt="Travila">
            </div>
        </div>
    </section>
   
  
    <section class="section-box box-testimonials-2 box-testimonials-4 background-body">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="d-flex justify-content-center">
                    <div class="box-author-testimonials"> <img src="assets/imgs/page/homepage1/testimonial.png"
                            alt="Travila"><img src="assets/imgs/page/homepage1/testimonial2.png" alt="Travila"><img
                            src="assets/imgs/page/homepage1/testimonial3.png" alt="Travila">Testimonials</div>
                </div>
                <h2 class="mt-8 mb-35 neutral-1000">Don't take our word for it</h2>
            </div>
            <div class="row align-items-center wow fadeInUp">
                <div class="col-lg-6 mb-30"><img class="light-mode"
                        src="assets/imgs/page/homepage7/img-testimonial.png" alt="Travila"><img class="dark-mode"
                        src="assets/imgs/page/homepage7/img-testimonial-dark.png" alt="Travila"></div>
                <div class="col-lg-6 mb-30">
                    <div class="box-swiper box-swiper-home7">
                        <div class="swiper-container swiper-group-testimonials-1 swiper-group-journey pb-0">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card-testimonial background-card">
                                        <div class="card-info">
                                            <p class="text-xl-bold card-title neutral-1000">The best booking system</p>
                                            <p class="neutral-500">I've been using the hotel booking system for several
                                                years now, and it's become my go-to platform for planning my trips. The
                                                interface is user-friendly, and I appreciate the detailed information and
                                                real-time availability of hotels.</p>
                                        </div>
                                        <div class="card-top">
                                            <div class="card-author">
                                                <div class="card-image"> <img
                                                        src="assets/imgs/page/homepage1/author.png" alt="Travila">
                                                </div>
                                                <div class="card-info">
                                                    <p class="text-lg-bold neutral-1000">Sara Mohamed</p>
                                                    <p class="text-sm neutral-1000">Jakatar</p>
                                                </div>
                                            </div>
                                            <div class="card-rate"> <img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-testimonial background-card">
                                        <div class="card-info">
                                            <p class="text-xl-bold card-title neutral-1000">The best booking system</p>
                                            <p class="neutral-500">I've been using the hotel booking system for several
                                                years now, and it's become my go-to platform for planning my trips. The
                                                interface is user-friendly, and I appreciate the detailed information and
                                                real-time availability of hotels.</p>
                                        </div>
                                        <div class="card-top">
                                            <div class="card-author">
                                                <div class="card-image"> <img
                                                        src="assets/imgs/page/homepage1/author2.png" alt="Travila">
                                                </div>
                                                <div class="card-info">
                                                    <p class="text-lg-bold neutral-1000">Atend John</p>
                                                    <p class="text-sm neutral-1000">Califonia</p>
                                                </div>
                                            </div>
                                            <div class="card-rate"> <img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-testimonial background-card">
                                        <div class="card-info">
                                            <p class="text-xl-bold card-title neutral-1000">The best booking system</p>
                                            <p class="neutral-500">I've been using the hotel booking system for several
                                                years now, and it's become my go-to platform for planning my trips. The
                                                interface is user-friendly, and I appreciate the detailed information and
                                                real-time availability of hotels.</p>
                                        </div>
                                        <div class="card-top">
                                            <div class="card-author">
                                                <div class="card-image"> <img
                                                        src="assets/imgs/page/homepage1/author.png" alt="Travila">
                                                </div>
                                                <div class="card-info">
                                                    <p class="text-lg-bold neutral-1000">Sara Mohamed</p>
                                                    <p class="text-sm neutral-1000">Jakatar</p>
                                                </div>
                                            </div>
                                            <div class="card-rate"> <img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-testimonial background-card">
                                        <div class="card-info">
                                            <p class="text-xl-bold card-title neutral-1000">The best booking system</p>
                                            <p class="neutral-500">I've been using the hotel booking system for several
                                                years now, and it's become my go-to platform for planning my trips. The
                                                interface is user-friendly, and I appreciate the detailed information and
                                                real-time availability of hotels.</p>
                                        </div>
                                        <div class="card-top">
                                            <div class="card-author">
                                                <div class="card-image"> <img
                                                        src="assets/imgs/page/homepage1/author2.png" alt="Travila">
                                                </div>
                                                <div class="card-info">
                                                    <p class="text-lg-bold neutral-1000">Sara Mohamed</p>
                                                    <p class="text-sm neutral-1000">Jakatar</p>
                                                </div>
                                            </div>
                                            <div class="card-rate"> <img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"><img src="assets/imgs/template/icons/star.svg"
                                                    alt="Travila"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-prev swiper-button-prev-style-1 swiper-button-prev-group-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewbox="0 0 16 16" fill="none">
                                <path
                                    d="M7.99992 3.33325L3.33325 7.99992M3.33325 7.99992L7.99992 12.6666M3.33325 7.99992H12.6666"
                                    stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="swiper-button-next swiper-button-next-style-1 swiper-button-next-group-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewbox="0 0 16 16" fill="none">
                                <path d="M7.99992 12.6666L12.6666 7.99992L7.99992 3.33325M12.6666 7.99992L3.33325 7.99992"
                                    stroke="" stroke-linecap="round" stroke-linejoin="round"> </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <section class="section-box box-media background-body">
        <div class="container-media wow fadeInUp"> <img src="assets/imgs/page/homepage5/media.png" alt="Travila"><img
                src="assets/imgs/page/homepage5/media2.png" alt="Travila"><img
                src="assets/imgs/page/homepage5/media3.png" alt="Travila"><img
                src="assets/imgs/page/homepage5/media4.png" alt="Travila"><img
                src="assets/imgs/page/homepage5/media5.png" alt="Travila"><img
                src="assets/imgs/page/homepage5/media6.png" alt="Travila"><img
                src="assets/imgs/page/homepage5/media7.png" alt="Travila"></div>
    </section>

@endsection
