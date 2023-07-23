@extends('layout.landing')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(/FrontTheme/img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->


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
                                    @foreach ($services as $service)
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

<!-- Call To Action Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8 col-md-6">
                <h6 class="text-primary text-uppercase">// Call To Action //</h6>
                <h1 class="mb-4">Have Any Pre Booking Question?</h1>
                <p class="mb-0">Is The Best Place For Your Auto Care</h1>
                    <p class="mb-4">Rely on our 15 Years of Experience in Bike Servicing for unmatched quality and precision. Your bike is in the hands of seasoned professionals who know bikes inside out, ensuring optimal performance on every ride! 🚵‍♂️🛠️</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bg-primary d-flex flex-column justify-content-center text-center h-100 p-4">
                    <h3 class="text-white mb-4"><i class="fa fa-phone-alt me-3"></i>+012 345 6789</h3>
                    <a href="#" class="btn btn-secondary py-3 px-5">Contact Us<i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call To Action End -->
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
