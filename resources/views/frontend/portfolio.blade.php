@extends('layouts.app')
@section('title')Portfolio - {{ $setting->company_name ?? ''}} @endsection


@section('css')
<style>
    .hidden {
        display: none !important;
    }
</style>
@endsection



@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Portfolio </h1>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active">Portfolio</li>
            </ol>
    </div>
</div>


<!-- About Start -->
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">{{ $title->portfolio_title }}</h4>
            </div>
            <p class="mt-3">
                {{ $title->portfolio_description }}
            </p>
        </div>
        <div class="row g-5 align-items-center">
            <!-- Portfolio Filter Buttons -->
            <div class="portfolio-filter">
                <button class="filter-btn mb-2 active" data-filter="all">All</button>
                @foreach($data as $category)
                @php $slug = strtolower(str_replace(' ', '-', $category->title)); @endphp
                <button class="filter-btn mb-2" data-filter="{{ $slug }}">
                    {{ $category->title }}
                </button>
                @endforeach
            </div>

            <!-- Portfolio Gallery -->
            <div class="portfolio-gallery">
                @foreach($data as $category)
                @php $slug = strtolower(str_replace(' ', '-', $category->title)); @endphp
                @foreach($category->portfolio as $item)
                <div class="portfolio-item {{ $slug }}">
                    <a href="{{ $item->link }}" target="_blank">
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $category->title ?? 'Portfolio Item' }}">
                    </a>
                </div>
                @endforeach
                @endforeach
            </div>

        </div>

    </div>
</div>
<!-- About End -->


<!-- Team Start -->
<div class="container-fluid bg-light team py-5" id="team">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">{{ $title->team_title }}</h4>
            </div>
            <p class="my-3">{{ $title->team_description }}</p>
        </div>
        <div class="row g-4 justify-content-center">

            @foreach($teams as $item)
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded">
                    <div class="team-img rounded-top h-100">
                        <img src="{{ Storage::url($item->image) }}" class="img-fluid rounded-top w-100" alt="">
                        <div class="team-icon d-flex justify-content-center">
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="{{ $item->facebook }}"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="{{ $item->twitter }}"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="{{ $item->instagram }}"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="{{ $item->linkedin }}"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="team-content text-center border border-primary border-top-0 rounded-bottom p-4">
                        <h5>{{ $item->name }}</h5>
                        <p class="mb-0">{{ $item->designation }}t</p>
                        <p class="mb-0">{{ $item->bio }}t</p>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
<!-- Team End -->
@endsection


@section('js')

<script>
    const filterButtons = document.querySelectorAll('.filter-btn');
    const items = document.querySelectorAll('.portfolio-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter').toLowerCase();

            items.forEach(item => {
                if (filterValue === 'all' || item.classList.contains(filterValue)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
</script>
@endsection