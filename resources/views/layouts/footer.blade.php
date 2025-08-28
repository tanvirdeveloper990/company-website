@php
$setting = \App\Models\Setting::first();
$services = \App\Models\Service::where('status',1)->get();
@endphp


<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3 p-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-white mb-4"><i class="fas fa-star-of-life me-3"></i>{{ $setting->company_name }}</h4>
                    <p class="text-light">{{ $setting->meta_description }}</p>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-share fa-2x text-white me-2"></i>
                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1" target="_blank" href="{{ $setting->facebook }}"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1" target="_blank" href="{{ $setting->twitter }}"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1" target="_blank" href="{{ $setting->instagram }}"><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1" target="_blank" href="{{ $setting->linkedin }}"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-2 p-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Quick Links</h4>
                    <a href="{{ route('about-us') }}"><i class="fas fa-angle-right me-2"></i> About Us</a>
                    <a href="{{ route('contact') }}"><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                    <a href="{{ route('page', ['slug' => 'privacy-policy']) }}"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                    <a href="{{ route('blog') }}"><i class="fas fa-angle-right me-2"></i> Our Blog & News</a>
                    <a href="{{ route('portfolio') }}#team"><i class="fas fa-angle-right me-2"></i> Our Team</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 p-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Services</h4>
                    @foreach($services as $item)
                    <a href="{{ route('service-single',$item->title) }}"><i class="fas fa-angle-right me-2"></i>{{ $item->title }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 p-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Carrier</h4>
                    <a href=""><i class="fas fa-angle-right me-2"></i> People Management at EPH/ Career at
                        EPH</a>
                    <a href=""><i class="fas fa-angle-right me-2"></i> Who are we looking for?</a>
                    <a href=""><i class="fas fa-angle-right me-2"></i> Selection Process</a>
                    <a href=""><i class="fas fa-angle-right me-2"></i> Preparing CV/Resume</a>
                    <a href=""><i class="fas fa-angle-right me-2"></i> PREPARING FOR AN INTERVIEW</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-12 text-center mb-md-0">
                <span class="text-white"><a href="{{ url('/') }}"><i class="fas fa-copyright text-light me-2"></i>{{ $setting->copy_right}}</a>. All right reserved.</span>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->
