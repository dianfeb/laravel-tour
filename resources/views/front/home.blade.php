
	@extends('front.layouts.template')

	@section('title', 'Home | Laravel Tour')
		

    @section('content')

    
		<!-- ============================ Hero Banner  Start================================== -->
		<div id="myCarousel" class="carousel slide carousel-fade mb-6">
			<div class="carousel-inner">
				@foreach($slider as $key => $item)
					<div class="carousel-item {{ $key == 0 ? 'active' : '' }} bg-cover" style="background:url({{ asset('storage/images/slider/' . $item->img) }})no-repeat;" data-overlay="6">
						<div class="container">
							<div class="carousel-caption">
								<h1>{{ $item->name }}</h1>
								<p class="fs-5 fw-light">{!! $item->desc !!}</p>
								
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<!-- ============================ Hero Banner End ================================== -->

		<!-- ============================ Hero Search Start ================================== -->
		<div class="search-explore-wrap">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">

						<div class="search-wrap with-label overio">
							<div class="row">

								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="fliore">
										<div class="rounded-top-3 d-inline-flex overflow-hidden">
											<ul class="nav nav-tabs simple-tabs medium border-0 justify-content-center" id="tour-pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#tour"><i class="fa-solid fa-hotel me-2"></i>Pencarian Wisata</a>
												</li>
												
											</ul>
										</div>

										<div class="tab-content bg-white rounded-bottom-3 shadow-wrap p-3">
											<div class="tab-pane show active" id="tour">
												<div class="row gy-3 gx-md-3 gx-sm-2">

													<div class="col-xl-9 col-lg-7 col-md-12">
														<div class="row gy-3 gx-md-3 gx-sm-2">
															<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
																<div class="form-group hdd-arrow mb-0">
																	<select class="goingto form-control fw-bold hdd-arrow">
																		<option value="">Select</option>
																		<option value="ny">New York</option>
																		<option value="sd">San Diego</option>
																		<option value="sj">San Jose</option>
																		<option value="ph">Philadelphia</option>
																		<option value="nl">Nashville</option>
																		<option value="sf">San Francisco</option>
																		<option value="hu">Houston</option>
																		<option value="sa">San Antonio</option>
																	</select>
																</div>
															</div>
															<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
																<div class="form-group mb-0">
																	<input type="text" class="form-control fw-bold" placeholder="Check-In & Check-Out"
																		id="checkinout" readonly="readonly">
																</div>
															</div>
														</div>
													</div>
													<div class="col-xl-3 col-lg-5 col-md-12">
														<div class="row gy-3 gx-md-3 gx-sm-2">
															
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
																<div class="form-group mb-0">
																	<button type="button" class="btn btn-primary full-width fw-medium"><i
																			class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
																</div>
															</div>
														</div>
													</div>

												</div>	
											</div>
											
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================ Hero Search End ================================== -->



		<!-- ============================ Popular Attraction Start ================================== -->
		<section>
			<div class="container">

				<div class="row align-items-center justify-content-center">
					<div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
						<div class="secHeading-wrap text-center mb-5">
							<h2>Best Attraction In USA</h2>
							<p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
						</div>
					</div>
				</div>
				<div class="row justify-content-center gy-4 gx-xl-3 gx-lg-4 gx-4">
					@foreach ($location as $item)
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
						<div class="pop-touritem">
							<a href="#" class="card rounded-3 border br-dashed m-0">
								<div class="touritem-middle position-relative p-3">
									<div class="touritem-flexxer">
										<div class="explot">
											<h4 class="city fs-6 m-0 fw-bold">
												<span>{{ $item->name }}</span>
											</h4>
											<div class="rates">
												<div class="rat-reviews">
													<span>{{ $item->total_tours }} Paket Wisata</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					@endforeach
					

					

				</div>

				<div class="row align-items-center justify-content-center">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="text-center position-relative mt-5">
							<button type="button" class="btn btn-light-primary fw-medium px-5">Explore More<i
									class="fa-solid fa-arrow-trend-up ms-2"></i></button>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- ============================ Popular Attraction Start ================================== -->


		
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

					@foreach ($tour as $item)
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


		<!-- ============================ Video Helps End ================================== -->
		<section class="bg-cover" style="background:url(assets/img/bg-3.jpg)no-repeat;" data-overlay="5">
			<div class="ht-150"></div>
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-xl-12 col-lg-12 col-md-12">

						<div class="video-play-wrap text-center">
							<div class="video-play-btn d-flex align-items-center justify-content-center">
								<a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-bs-toggle="modal" data-bs-target="#popup-video" class="square--90 circle bg-white fs-2 text-primary"><i class="fa-solid fa-play"></i></a>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="ht-150"></div>
		</section>
		<!-- ============================ Video Helps End ================================== -->



		<!-- ================================ Article Section Start ======================================= -->
		<section>
			<div class="container">

				<div class="row align-items-center justify-content-center">
					<div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
						<div class="secHeading-wrap text-center mb-5">
							<h2>Trending & Popular Articles</h2>
							<p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
						</div>
					</div>
				</div>


				<div class="row justify-content-center g-4">

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="blogGrid-wrap d-flex flex-column h-100">
							<div class="blogGrid-pics">
								<a href="#" class="d-block"><img src="assets/img/blog-1.jpg" class="img-fluid rounded" alt="Blog image"></a>
							</div>
							<div class="blogGrid-caps pt-3">
								<div class="d-flex align-items-center mb-1"><span
										class="label text-success bg-light-success">Destination</span></div>
								<h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi To Paris in
										Comfirtable And Best Price</a></h4>
								<p class="mb-3">Think of a news blog that's filled with content hourly on the Besides, random text risks
									to be unintendedly humorous or offensive day of going live.</p>
								<a class="text-primary fw-medium" href="#">Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="blogGrid-wrap d-flex flex-column h-100">
							<div class="blogGrid-pics">
								<a href="#" class="d-block"><img src="assets/img/blog-2.jpg" class="img-fluid rounded" alt="Blog image"></a>
							</div>
							<div class="blogGrid-caps pt-3">
								<div class="d-flex align-items-center mb-1"><span
										class="label text-success bg-light-success">Journey</span></div>
								<h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi To Paris in
										Comfirtable And Best Price</a></h4>
								<p class="mb-3">Think of a news blog that's filled with content hourly on the Besides, random text risks
									to be unintendedly humorous or offensive day of going live.</p>
								<a class="text-primary fw-medium" href="#">Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="blogGrid-wrap d-flex flex-column h-100">
							<div class="blogGrid-pics">
								<a href="#" class="d-block"><img src="assets/img/blog-3.jpg" class="img-fluid rounded" alt="Blog image"></a>
							</div>
							<div class="blogGrid-caps pt-3">
								<div class="d-flex align-items-center mb-1"><span
										class="label text-success bg-light-success">Business</span></div>
								<h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi To Paris in
										Comfirtable And Best Price</a></h4>
								<p class="mb-3">Think of a news blog that's filled with content hourly on the Besides, random text risks
									to be unintendedly humorous or offensive day of going live.</p>
								<a class="text-primary fw-medium" href="#">Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- ================================ Article Section Start ======================================= -->


		<!-- ============================ Call To Action Start ================================== -->
		<div class="position-relative bg-cover py-5 bg-primary" style="background:url(assets/img/bg.jpg)no-repeat;"
			data-overlay="5">
			<div class="container">
				<div class="row align-items-center justify-content-between">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="calltoAction-wraps position-relative py-5 px-4">
							<div class="ht-40"></div>
							<div class="row align-items-center justify-content-center">
								<div class="col-xl-8 col-lg-9 col-md-10 col-sm-11 text-center">

									<div class="calltoAction-title mb-5">
										<h4 class="text-light fs-2 fw-bold lh-base m-0">Subscribe & Get<br>Special Discount with GeoTrip.com
										</h4>
									</div>
									<div class="newsletter-forms mt-md-0 mt-4">
										<form>
											<div class="row align-items-center justify-content-between bg-white rounded-3 p-2 gx-0">

												<div class="col-xl-9 col-lg-8 col-md-8">
													<div class="form-group m-0">
														<input type="text" class="form-control bold ps-1 border-0" placeholder="Enter Your Mail!">
													</div>
												</div>
												<div class="col-xl-3 col-lg-4 col-md-4">
													<div class="form-group m-0">
														<button type="button" class="btn btn-dark fw-medium full-width">Submit<i
																class="fa-solid fa-arrow-trend-up ms-2"></i></button>
													</div>
												</div>

											</div>
										</form>
									</div>

								</div>
							</div>
							<div class="ht-40"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================ Call To Action Start ================================== -->

        @endsection