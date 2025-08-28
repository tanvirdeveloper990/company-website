@php
$setting = \App\Models\Setting::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="author" content="{{ $setting->meta_title }}">
    <meta property="og:title" content="{{ $setting->meta_title }}">
    <meta property="og:description" content="{{ $setting->meta_description }}">
    <meta property="og:image" content="{{ Storage::url($setting->meta_image) }}">
    <meta property="og:url" content="https://elite.com">
    <meta property="og:type" content="{{ $setting->meta_title }}">
    <meta name="twitter:card" content="{{ Storage::url($setting->meta_image) }}">
    <meta name="twitter:title" content="{{ $setting->meta_title }}">
    <meta name="twitter:description" content="{{ $setting->meta_description }}">
    <meta name="twitter:image" content="{{ Storage::url($setting->meta_image) }}g">
    <meta name="twitter:card" content="{{ Storage::url($setting->meta_image) }}">
    <meta name="twitter:title" content="{{ $setting->meta_title }}">
    <meta name="twitter:description" content="{{ $setting->meta_description }}">
    <meta name="twitter:image" content="{{ Storage::url($setting->meta_image) }}">
    <link rel="icon" href="{{ Storage::url($setting->favicon) }}" type="image/x-icon">



    <title>@yield('title')</title>
    <meta content="@yield('description')" name="description">
    <meta content="@yield('keyword')" name="keywords">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
    @yield('css')
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid top-bar px-5 d-none d-lg-block">
        <div class="row gx-0 align-items-center" style="height: 45px;">
            <div class="col-lg-9 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <a href="#" class="text-light me-4"><i class="fas fa-map-marker-alt me-2"></i>{{ $setting->address }}</a>
                    <a href="https://wa.me/{{$setting->phone_one}}" class="text-light me-4"><i class="fas fa-phone-alt me-2"></i>{{ $setting->phone_one }}</a>
                    <a href="mailto:{{ $setting->email_one }}" class="text-light me-0">
                        <i class="fas fa-envelope me-2"></i>{{ $setting->email_one }}
                    </a>

                </div>
            </div>
            <div class="col-lg-3 text-center text-lg-end social">
                <div class="d-flex align-items-center justify-content-end">
                    <a target="_blank" href="{{ $setting->facebook }}" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i
                            class="fab fa-facebook-f"></i></a>
                    <a target="_blank" href="{{ $setting->twitter }}" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i
                            class="fab fa-twitter"></i></a>
                    <a target="_blank" href="{{ $setting->instagram }}" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i
                            class="fab fa-instagram"></i></a>
                    <a target="_blank" href="{{ $setting->linkedin }}" class="btn btn-light btn-square border rounded-circle nav-fill me-0"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- Template Javascript -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80
                },
                "size": {
                    "value": 3
                },
                "color": {
                    "value": "#ffffff"
                },
                "line_linked": {
                    "enable": true,
                    "opacity": 0.2
                },
                "move": {
                    "direction": "none",
                    "speed": 1
                }
            },
            "interactivity": {
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    }
                }
            }
        });
    </script>

    @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>
    @endif

    <script>
        const faqs = document.querySelectorAll('.faq');

        faqs.forEach(faq => {
            faq.querySelector('button').addEventListener('click', () => {
                faq.classList.toggle('active');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-submenu').forEach(button => {
                button.addEventListener('click', function() {
                    const submenu = this.nextElementSibling;
                    const icon = this.querySelector('i');

                    // Toggle submenu
                    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';

                    // Rotate icon
                    icon.classList.toggle('rotate');
                });
            });
        });
    </script>
    <script>
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 200) {
                $('#sticky-header').css({
                    'position': 'fixed',
                    'top': '0'
                });
            } else {
                $('#sticky-header').css({
                    'position': 'relative',
                    'top': 'auto'
                });
            }
        });
    </script>



    @yield('js')
</body>

</html>