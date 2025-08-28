@php 
$services = \App\Models\Service::where('status',1)->get();
$setting = \App\Models\Setting::first();
@endphp

<!-- Navbar & Hero Start -->
 <div class="container-fluid position-relative p-0">
     <!-- <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0"> -->
     <div class="d-lg-block d-none" id="sticky-header">
         <nav class="navbar navbar-expand-lg bg-light px-4 px-lg-5 py-3 py-lg-0">

             <a href="/" class="navbar-brand p-0">
                 <!-- <h1 class="text-primary m-0"><i class="fas fa-star-of-life me-3"></i>Terapia</h1> -->
                 <img src="{{ Storage::url($setting->header_logo) }}" alt="{{ $setting->company_name }}" class="logo">
             </a>

             <div class="collapse navbar-collapse" id="navbarCollapse">
                 <div class="navbar-nav ms-auto py-0">
                     <a href="/" class="nav-item nav-link active">Home</a>
                     <!-- <a href="whyeph.html" class="nav-item nav-link">Why EPH</a> -->
                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                         <div class="dropdown-menu m-0">
                            @foreach($services as $item)
                             <a href="{{ route('service-single',$item->title) }}" class="dropdown-item">- {{ $item->title }}</a>
                             @endforeach
                         </div>
                     </div>
                     <a href="{{ route('portfolio') }}" class="nav-item nav-link">Portfolio</a>
                     <a href="{{route('faq')}}" class="nav-item nav-link">FAQ</a>
                     <a href="{{ route('blog') }}" class="nav-item nav-link">Blog</a>
                     <div class="nav-item dropdown me-4">
                         <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Get In Touch</a>
                         <div class="dropdown-menu m-0">
                             <a href="{{ route('about-us')}}" class="dropdown-item">- About Us</a>
                             <!-- <a href="ceo.html" class="dropdown-item">- Messege From CEO</a> -->
                             <a href="{{ route('page', ['slug' => 'career']) }}" class="dropdown-item">- Career</a>
                             <a href="{{route('contact')}}" class="dropdown-item">- Contact Us</a>
                         </div>
                     </div>
                 </div>
             </div>
             <a href="https://wa.me/{{$setting->phone_one}}" target="_blank" 
            class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">
            Chat With Us
            </a>

         </nav>
     </div>

     <nav class="navbar navbar-expand-lg bg-light px-3 py-2 d-lg-none">
         <div class="container-fluid d-flex justify-content-between align-items-center">
             <!-- Left: Hamburger Icon -->
             <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas"
                 data-bs-target="#offcanvasMenu">
                 <i class="fa fa-bars fa-lg"></i>
             </button>

             <!-- Center: Logo -->
             <a href="/" class="navbar-brand mx-auto p-0">
                 <img src="{{ Storage::url($setting->header_logo) }}" alt="{ $setting->company_name }}" class="logo" style="height: 40px;">
             </a>

             <!-- Right: Chat Button -->
             <a href="https://wa.me/{{$setting->phone_one}}" class="btn btn-primary rounded-pill text-white py-1 px-3">Chat With Us</a>
         </div>
     </nav>

     <!-- Offcanvas Menu Start -->
     <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
         <div class="offcanvas-header border-bottom">
             <h5 class="offcanvas-title">Menu</h5>
             <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
         </div>
         <div class="offcanvas-body p-0">
             <ul class="list-unstyled m-0">
                 <li class="border-bottom">
                     <a href="/" class="d-block px-3 py-2 text-dark text-decoration-none">Home</a>
                 </li>
                 <!-- <li class="border-bottom">
                     <a href="whyeph.html" class="d-block px-3 py-2 text-dark text-decoration-none">Why EPH</a>
                 </li> -->
                 <li class="border-bottom">
                     <button
                         class="w-100 d-flex justify-content-between align-items-center px-3 py-2 border-0 bg-transparent toggle-submenu">
                         <span>Services</span>
                         <i class="fa fa-chevron-down"></i>
                     </button>
                     <ul class="submenu list-unstyled ps-4" style="display: none;">

                            @foreach($services as $item)
                             <li><a href="{{ route('service-single',$item->title) }}" class="d-block py-2 text-dark text-decoration-none">- {{ $item->title }}</a></li>
                             @endforeach

                     </ul>
                 </li>
                 <li class="border-bottom">
                     <a href="{{ route('portfolio') }}" class="d-block px-3 py-2 text-dark text-decoration-none">Portfolio</a>
                 </li>
                 <li class="border-bottom">
                     <a href="{{route('faq')}}" class="d-block px-3 py-2 text-dark text-decoration-none">FAQ</a>
                 </li>
                 <li class="border-bottom">
                     <button
                         class="w-100 d-flex justify-content-between align-items-center px-3 py-2 border-0 bg-transparent toggle-submenu">
                         <span>Get In Touch</span>
                         <i class="fa fa-chevron-down"></i>
                     </button>
                     <ul class="submenu list-unstyled ps-4" style="display: none;">
                         <li><a href="{{ route('about-us')}}" class="d-block py-2 text-dark text-decoration-none">About Us</a>
                         </li>
                         <li><a href="{{ route('page', ['slug' => 'career']) }}" class="d-block py-2 text-dark text-decoration-none">Career</a>
                         </li>
                         <li><a href="{{route('contact')}}" class="d-block py-2 text-dark text-decoration-none">Contact
                                 Us</a></li>
                     </ul>
                 </li>
             </ul>
         </div>
     </div>
     <!-- Offcanvas Menu End -->
 </div>
 <!-- Navbar & Hero End -->