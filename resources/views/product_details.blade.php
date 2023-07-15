@extends('layout.landing')

@section('style')

@endsection

@section('content')
 <!-- Page Header Start -->
 <div class="container-fluid page-header mb-5 p-0" style="background-image: url(/FrontTheme/img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">eGarage Shop</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 pt-4" style="min-height: 400px;">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ $product->image }}" style="object-fit: cover;" alt="">
                    @if ($product->discount != null)
                    <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                        <h1 class="display-4 text-white mb-0">{{ $product->discount->percentage }} <span class="fs-4">%</span></h1>
                        <h4 class="text-white">Free</h4>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-primary text-uppercase">// About Product //</h6>
                <h1 class="mb-4"><span class="text-primary">{{ $product->name }}</span></h1>
                <p class="mb-4">{{ $product->description }}</p>
                <div class="row g-4 mb-3 pb-3">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">01</span>
                            </div>
                            <div class="ps-3">
                                @if ($product->discount != null)
                                <h6>Discount Type: </h6>
                                <span>{{ $product->discount->name }}</span>
                                @else
                                <h6>Discount Type:</h6>
                                <span>No Discount</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">02</span>
                            </div>
                            <div class="ps-3">
                                <h6>Price:</h6>
                                <span>{{ $product->price }}tk</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">03</span>
                            </div>
                            <div class="ps-3">
                                <h6>Total sold unit:</h6>
                                <span>{{ $product->sold + 10 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" class="btn btn-primary py-3 px-5">Buy now<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Fact Start -->
<div class="container-fluid fact bg-dark my-5 py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-check fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">{{ $product->sold }}</h2>
                <p class="text-white mb-0">Total sold</p>
            </div>
            <div class="col-md-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-check fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">{{$product->quantity - $product->sold }}</h2>
                <p class="text-white mb-0">Stock unit</p>
            </div>
            <div class="col-md-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-check fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">{{ $product->price }}</h2>
                <p class="text-white mb-0">Unit Price</p>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Same Products //</h6>
            <h1 class="mb-5">Related Products</h1>
        </div>
        <div class="row g-4">
            @for ($i = 0; $i < count($category->products); $i++)
            @if ($i == 4)
                @break
            @endif
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img style="height: 350px" class="/FrontTheme/img-fluid" src="{{ $category->products[$i]->image }}" alt="">
                        <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                            <a class="btn mx-1" href="">Buy now</a>
                            <a class="btn mx-1" href="{{ route('product.details', ['product' => $category->products[$i]->id]) }}">Details</a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="fw-bold mb-0">{{ $category->products[$i]->name }}</h5>
                        <small>price: {{ $category->products[$i]->price }}</small>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        <br>
        <a style="float: right" class="btn btn-rounded btn-primary float-right" href="{{ route('category.product', ['category' => $category->id]) }}">
            See more...
        </a>
    </div>
</div>
<!-- Team End -->
@endsection

@section('script')

@endsection
