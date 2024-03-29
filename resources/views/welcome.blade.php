@extends('layout.landing')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="/FrontTheme/img/carousel-bg-1.jpg" alt="Image">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Bike Servicing //</h6>
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Qualified Bike Repair Service Center</h1>
                                <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                            <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                <img class="/FrontTheme/img-fluid" src="/FrontTheme/img/carousel-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="/FrontTheme/img/carousel-bg-2.jpg" alt="Image">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Bike Servicing //</h6>
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Qualified Bike Wash Service Center</h1>
                                <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                            <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                <img class="/FrontTheme/img-fluid" src="/FrontTheme/img/carousel.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Quality Servicing</h5>
                        <p>You dont need to take headache again for your bike.</p>
                        {{-- <a class="text-secondary border-bottom" href="#">Read More</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex bg-light py-5 px-4">
                    <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Expert Workers</h5>
                        <p>We have the certified, finest and excellent expert in town</p>
                        {{-- <a class="text-secondary border-bottom" href="">Read More</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-tools fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Modern Equipment</h5>
                        <p>Your bike will be diagnised by Ultra modern machines.</p>
                        {{-- <a class="text-secondary border-bottom" href="">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 pt-4" style="min-height: 400px;">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-absolute img-fluid w-100 h-100" src="/FrontTheme/img/about.jpg" style="object-fit: cover;" alt="">
                    <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                        <h1 class="display-4 text-white mb-0">15 <span class="fs-4">Years</span></h1>
                        <h4 class="text-white">Experience</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-primary text-uppercase">// About Us //</h6>
                <h1 class="mb-4"><span class="text-primary">{{ config('app.name') }}</span> Is The Best Place For Your Auto Care</h1>
                <p class="mb-4">Rely on our 15 Years of Experience in Bike Servicing for unmatched quality and precision. Your bike is in the hands of seasoned professionals who know bikes inside out, ensuring optimal performance on every ride! 🚵‍♂️🛠️</p>
                <div class="row g-4 mb-3 pb-3">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">01</span>
                            </div>
                            <div class="ps-3">
                                <h6>Professional & Expert</h6>
                                <span>We have the finest expert in town</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">02</span>
                            </div>
                            <div class="ps-3">
                                <h6>Quality Servicing Center</h6>
                                <span>You dont need to take headache again</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">03</span>
                            </div>
                            <div class="ps-3">
                                <h6>Awards Winning Workers</h6>
                                <span>7 times best garage award winner</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary py-3 px-5">Read More<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Fact Start -->
<div class="container-fluid fact bg-dark my-5 py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-check fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">15</h2>
                <p class="text-white mb-0">Years Experience</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">24</h2>
                <p class="text-white mb-0">Expert Technicians</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1000</h2>
                <p class="text-white mb-0">Satisfied Clients</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-motorcycle fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1007</h2>
                <p class="text-white mb-0">Compleate Projects</p>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->


<!-- Service Start -->
<div class="container-xxl service py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Our Services //</h6>
            <h1 class="mb-5">Explore Our Services</h1>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-lg-4">
                <div class="nav w-100 nav-pills me-4">
                    @foreach ($services as $service)
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 @if ($j == 0) active @endif" data-bs-toggle="pill" data-bs-target="#tab-pane-{{ $j = $j + 1 }}" type="button">
                        <i class="fa fa-cog fa-2x me-3"></i>
                        <h4 class="m-0">{{ $service->name }}</h4>
                    </button>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content w-100">
                    @foreach ($services as $service)
                    <div class="tab-pane fade show @if ($j % 4 == 0) active @endif" id="tab-pane-{{ $j = $j % 4 + 1 }}">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="/FrontTheme/img/service-1.jpg"
                                        style="object-fit: cover;" alt="">
                                    @if ($service->image == null)
                                    <img class="position-absolute img-fluid w-100 h-100" src="/FrontTheme/img/service-1.jpg"
                                        style="object-fit: cover;" alt="">
                                    @else
                                    <img class="position-absolute img-fluid w-100 h-100" src="{{ $service->image }}"
                                        style="object-fit: cover;" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">15 Years Of Experience In Bike Servicing</h3>
                                <p class="mb-4">{{ $service->description }}</p>
                                <p><i class="fa fa-check text-success me-3"></i>Quality Servicing</p>
                                <p><i class="fa fa-check text-success me-3"></i>Expert Workers</p>
                                <p><i class="fa fa-check text-success me-3"></i>Modern Equipment</p>
                                <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Booking Start -->
<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="text-white mb-4">Certified and Award Winning Bike Repair Service Provider</h1>
                    <p class="text-white mb-0">Join the eGarage community and access a world of bike services and solutions at your convenience.eGarage, your ultimate online destination for all things bike-related! Revolutionize your bike maintenance routine with eGarage, the virtual garage at your fingertips.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Book For A Service</h1>
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="datetime-local" name="arrival_time"
                                        class="form-control border-0 datetimepicker-input"
                                        placeholder="Service Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <textarea name="special_request" value="{{ old('special_request') }}" required class="form-control border-0" placeholder="Special Request"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="serv" style="color: whitesmoke; font-size: 30px; font-weight: bold;">Select Needed Services:</label>
                                <select id="serv" class="form-select border-0 form-control js-example-basic-multiple" name="services[]" multiple="multiple" required>
                                    @foreach ($allServices as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}: {{ $service->fee }}tk</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Our Technicians //</h6>
            <h1 class="mb-5">Our Expert Technicians</h1>
        </div>
        <div class="row g-4">
            @foreach ($employees as $employee)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $i = $i + 0.2 }}s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        @if ($employee->image == null)
                        <img style="height: 350px" class="img-fluid" src="/FrontTheme/img/team-4.jpg" alt="">
                        @else
                        <img style="height: 350px" class="img-fluid" src="{{ $employee->image }}" alt="">
                        @endif
                        <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="fw-bold mb-0">{{ $employee->name }}</h5>
                        <small>{{ $employee->designation }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="text-primary text-uppercase">// Testimonial //</h6>
            <h1 class="mb-5">Our Clients Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="/FrontTheme/img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Airsha Chowdhury</h5>
                <p>Software Engineer</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Outstanding service at Bike Garage! Knowledgeable staff, meticulous repairs, and genuine care for my bike. Highly recommend! ⭐⭐⭐⭐⭐ (5/5 stars)</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="/FrontTheme/img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Galib Hasan</h5>
                <p>Banker</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Bike Garage exceeded my expectations! Prompt service, friendly team, and my bike rides like new again. A top-notch experience! ⭐⭐⭐⭐⭐ (5/5 stars)</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="/FrontTheme/img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Rakib Chowdhury</h5>
                <p>Software Engineer</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Impressed with Bike Garage's expertise! They diagnosed and fixed the issue quickly, and their passion for cycling shines through. A must-visit for cyclists!" ⭐⭐⭐⭐⭐ (5/5 stars)</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="/FrontTheme/img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Sarah</h5>
                <p>Banker</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Outstanding service at Bike Garage! Knowledgeable staff, meticulous repairs, and genuine care for my bike. Highly recommend! ⭐⭐⭐⭐⭐ (5/5 stars)</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function()
    {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endsection
