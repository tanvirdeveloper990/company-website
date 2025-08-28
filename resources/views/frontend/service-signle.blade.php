@extends('layouts.app')
@section('title'){{$service->title}} - {{ $setting->company_name ?? ''}} @endsection

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{$service->title}}</h1>
            <p class="my-3 text-light">{{ $service->description }}</p>
    </div>
</div>

@if($service->title=='Website Design & Development')
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center pb-5">

            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="sub-style">
                    <h4 class="sub-title px-3 mb-0">{{$title->tools_title}}</h4>
                </div>
                <p class="my-3">{{$title->tools_description}}</p>
            </div>

        </div>
        <div class="row g-4">
            @foreach($tools as $item)
            <div class="col-md-4 col-lg-3">
                <div class="tool-card">
                    <div class="tool-icon">
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" class="w-25">
                    </div>
                    <div class="tool-title">{{ $item->name }}</div>
                    <div class="tool-desc">{{ $item->short_description }}</div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>


<section class="py-5">
    <div class="container">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">{{$title->ourprocess_title}}</h4>
            </div>
            <p class="my-3">{{$title->ourprocess_description}}</p>
        </div>
        <div class="row g-4 justify-content-center text-center">
            @foreach($process as $item)
            <div class="col-6 col-md-4 col-lg-2">
                <div class="service-step d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" class="w-25">
                    <h5 class="mt-2">{{ $item->name }}</h5>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


<div class="container-fluid about website-types-section  py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center pb-5">

            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="sub-style">
                    <h4 class="sub-title px-3 mb-0">{{$title->type_ofweb_title}}</h4>
                </div>
                <p class="my-3">{{$title->type_ofweb_description}}</p>
            </div>

        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            @foreach($webbuild as $item)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" class="w-25">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->short_description }}</p>
                    </div>
                </div>
            </div>

            @endforeach







        </div>

    </div>
</div>

@elseif($service->title=='Property Preservation Work Orders Processing')
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">

        @foreach($what as $item)
        <div class="highlight-card">
            <div class="highlight-title">
                <i class="bi bi-tools"></i>{{$item->title}}
            </div>
            <p>
                {{$item->description}}
            </p>
        </div>
        @endforeach


    </div>
</div>


<section class="workflow-section">
    <div class="container">
        <div class="workflow-title">
            <i class="bi bi-arrow-repeat"></i> Our Processing Workflow
        </div>

        <div class="workflow-list">
            @foreach($workflow as $item)
            <div class="workflow-item">
                <i class="bi bi-check-circle-fill workflow-icon"></i>
                <div class="workflow-text">{{$item->title}}</div>
            </div>
            @endforeach
        </div>


    </div>
</section>


<div class="container-fluid about website-types-section py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="sub-style">
                    <h4 class="sub-title px-3 mb-0">Work Type</h4>
                </div>
            </div>
        </div>

        <div class="d-flex gap-3 justify-content-center m-auto row">

            <div class="col-lg-6 m-auto">
                <div class="row feature-list">
                    @foreach($workflow as $item)
                    <div class="col-lg-6">
                        <div class="feature-item"><span>{{ $item->title }}</span></div>
                    </div>
                    @endforeach

                </div>
            </div>



        </div>


    </div>
</div>


<div class="container-fluid about website-types-section py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="sub-style">
                    <h4 class="sub-title px-3 mb-0">Few details about our working area</h4>
                </div>
            </div>
        </div>
    </div>
</div>


<section id="hero" class="hero section light-background pb-5" style="background: #fff">

    <div class="container">
        @foreach($workarea as $item)
        <div class="row gy-5 align-items-center">
            @if($loop->iteration % 2 == 1)
            {{-- Odd (1, 3, 5 ...) → Image Left, Content Right --}}
            <div class="col-12 col-lg-6 order-1 order-lg-1 hero-img" data-aos="zoom-out" data-aos-delay="100">
                <img src="{{ Storage::url($item->image) }}" class="img-fluid w-100" alt="">
            </div>
            <div class="col-12 col-lg-6 order-2 order-lg-2 d-flex flex-column justify-content-center" data-aos="fade-up">
                <h3 class="workflow-title">{{ $item->title }}</h3>
                {!! $item->description !!}
                <div class="d-flex">
                    <a href="{{ $item->button_link }}"
                        @if($item->button_type==1) target="_blank" @endif
                        class="btn btn-primary rounded-pill text-white py-3 px-5">{{ $item->button_name }}</a>
                </div>
            </div>
            @else
            {{-- Even (2, 4, 6 ...) → Content Left, Image Right --}}
            <div class="col-12 col-lg-6 order-1 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                <h3 class="workflow-title">{{ $item->title }}</h3>
                {!! $item->description !!}
                <div class="d-flex">
                    <a href="{{ $item->button_link }}"
                        @if($item->button_type==1) target="_blank" @endif
                        class="btn btn-primary rounded-pill text-white py-3 px-5">{{ $item->button_name }}</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 order-2 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
                <img src="{{ Storage::url($item->image) }}" class="img-fluid w-100" alt="">
            </div>
            @endif
        </div>
        @endforeach



    </div>

</section>

@elseif($service->title=='Cloud Web Hosting')

<section id="features" class="features section price light-background py-5" style="background: #fff">


    <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
        <div class="sub-style">
            <h4 class="sub-title px-3 mb-0 display-3">{{$title->package_title}}</h4>
        </div>
        <p class="mt-3">{{$title->package_description}}</p>
    </div>

    <div class="container">

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
            <div class="tab-pane fade active show" id="features-tab-1" role="tabpanel">
                <div class="row g-2 justify-content-center">

                    <div class="col-md-4 col-lg-3 col-xl-3">
                        <div class="price-item shadow-lg rounded text-center">
                            <div class="price-top custom-wave-bg"
                                style="background-image:url(https://rdpnbd.com/assets/img/1.png)">
                                <p class="fs-5 fw-bold text-uppercase mb-2">BRONZE</p>
                                <div class="price d-flex justify-content-center align-items-baseline">
                                    <strong class="fs-5 me-1">৳</strong> 500 <span class="ms-1">5% VAT/MONTH</span>
                                </div>
                            </div>
                            <div class="featuresitem text-start pt-0">
                                <h4 class="text-center mb-0">10 Mbps</h4>
                                <div class="text-center">
                                    <img class="list_item_img" src="https://rdpnbd.com/assets/img/title_line.png">
                                </div>
                                <ul class="mt-3 list_item">
                                    <li>Limited YouTube Access</li>
                                    <li>Fiber Optic Connection</li>
                                    <li>Smooth Gaming Experience</li>
                                    <li>24/7 Customer Support</li>
                                </ul>
                                <div class="text-center py-3">
                                    <button class="btn btn-primary rounded-pill text-white py-3 px-5" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                                        aria-controls="offcanvasScrolling">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-3 col-xl-3">
                        <div class="price-item shadow-lg rounded text-center">
                            <div class="price-top custom-wave-bg"
                                style="background-image:url(https://rdpnbd.com/assets/img/2.png)">
                                <p class="fs-5 fw-bold text-uppercase mb-2">SILVER</p>
                                <div class="price d-flex justify-content-center align-items-baseline">
                                    <strong class="fs-5 me-1">৳</strong> 700 <span class="ms-1">5% VAT/MONTH</span>
                                </div>
                            </div>
                            <div class="featuresitem text-start pt-0">
                                <h4 class="text-center mb-0">15 Mbps</h4>
                                <div class="text-center">
                                    <img class="list_item_img" src="https://rdpnbd.com/assets/img/title_line.png">
                                </div>
                                <ul class="mt-3 list_item">
                                    <li>Unlimited YouTube, Facebook BDIX</li>
                                    <li>Optimized for Gaming</li>
                                    <li>Fiber Optic Connectivity</li>
                                    <li>24/7 customer support</li>
                                </ul>
                                <div class="text-center py-3">
                                    <button class="btn btn-primary rounded-pill text-white py-3 px-5" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                                        aria-controls="offcanvasScrolling">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-3 col-xl-3">
                        <div class="price-item shadow-lg rounded text-center">
                            <div class="price-top custom-wave-bg"
                                style="background-image:url(https://rdpnbd.com/assets/img/3.png)">
                                <p class="fs-5 fw-bold text-uppercase mb-2">GOLD</p>
                                <div class="price d-flex justify-content-center align-items-baseline">
                                    <strong class="fs-5 me-1">৳</strong> 800 <span class="ms-1">5% VAT/MONTH</span>
                                </div>
                            </div>
                            <div class="featuresitem text-start pt-0">
                                <h4 class="text-center mb-0">20 Mbps</h4>
                                <div class="text-center">
                                    <img class="list_item_img" src="https://rdpnbd.com/assets/img/title_line.png">
                                </div>
                                <ul class="mt-3 list_item">
                                    <li>Unlimited YouTube, Facebook &amp; BDIX</li>
                                    <li>Fiber Optic Connectivity</li>
                                    <li>Optimized for Gaming</li>
                                    <li>24/7 customer support</li>
                                </ul>
                                <div class="text-center py-3">
                                    <button class="btn btn-primary rounded-pill text-white py-3 px-5" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                                        aria-controls="offcanvasScrolling">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-3 col-xl-3">
                        <div class="price-item shadow-lg rounded text-center">
                            <div class="price-top custom-wave-bg"
                                style="background-image:url(https://rdpnbd.com/assets/img/4.png)">
                                <p class="fs-5 fw-bold text-uppercase mb-2">PLATINUM</p>
                                <div class="price d-flex justify-content-center align-items-baseline">
                                    <strong class="fs-5 me-1">৳</strong> 1000 <span class="ms-1">5% VAT/MONTH</span>
                                </div>
                            </div>
                            <div class="featuresitem text-start pt-0">
                                <h4 class="text-center mb-0">30 Mbps</h4>
                                <div class="text-center">
                                    <img class="list_item_img" src="https://rdpnbd.com/assets/img/title_line.png">
                                </div>
                                <ul class="mt-3 list_item">
                                    <li>Unlimited YouTube, Facebook &amp; BDIX</li>
                                    <li>Optimized for Gaming</li>
                                    <li>Fiber Optic Connectivity</li>
                                    <li>24/7 customer support</li>
                                </ul>
                                <div class="text-center py-3">
                                    <button class="btn btn-primary rounded-pill text-white py-3 px-5" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                                        aria-controls="offcanvasScrolling">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>



    </div>

</section>

@elseif($service->title=='Software Solutions')

@endif



@endsection