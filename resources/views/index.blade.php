<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <base href="{{ config('app.url') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name', 'TnG - The Next Group') }}">
    <meta name="author" content="{{ config('app.admin') }}">
    <meta name="keyword" content="tng, TnG, TNG, The Next Group">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="The Next Group - TnG">
    <meta property="og:description" content="Join TnG for exciting bike rides and unforgettable experiences.">
    <meta property="og:image" content="{{ asset('favicon-512x512.png') }}">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:type" content="website">
    <title>{{ config('app.name', 'TnG - The Next Group') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="android-chrome" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}">
    <link rel="android-chrome" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <!-- Brand Name Section -->
                <a class="navbar-brand brand-name" href="#">The Next Group</a>

                <!-- Navbar Toggle Button for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonial">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#join_us">Join Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="home">
            <div class="intro-video-section position-relative mb-5">
                <!-- Container for text content, positioned in the center -->
                <div class="container position-absolute top-50 start-50 translate-middle ps-3 pe-3">
                    <div class="p-4 text-center text-white">
                        <h2 class="fw-bold fs-4 fs-md-5">Join the Adventure with</h2>
                        <h2 class="fw-bold fs-4 fs-md-5">TnG</h2>
                        <hr class="border border-warning border-3 mx-auto" style="width: 12%;">
                        <p class="fs-5">Discover the Thrill of Bike Rides for Upcoming Days</p>
                    </div>
                </div>

                <!-- Video Section -->
                <video id="intro_video" src="{{ asset('assets/vid/intro.mp4') }}" class="w-100 h-100 object-fit-cover"
                    autoplay muted loop playsinline></video>
            </div>
        </div>


        <div id="about">
            <!-- About Section -->
            <div class="row g-2 m-md-5 p-3 p-md-5">
                <!-- Left Column: Image -->
                <div class="col-12 col-md-4">
                    <img loading="lazy" src="{{ asset('assets/img/merchant.jpg') }}" class="img-fluid rounded"
                        alt="The Next Group">
                </div>
                <!-- Right Column: Text Content -->
                <div class="col-12 col-md-8 d-flex justify-content-center ps-md-4 pe-md-4">
                    <div class="align-content-center bg-dark text-white ps-3 pe-3 w-100 rounded">
                        <div class="about-title d-flex justify-content-center mb-4">
                            <h2>About The Next Group</h2>
                        </div>
                        <hr class="border w-25 border-warning border-3 mx-auto mb-4">
                        <div class="about-description mt-3">
                            <p class="fs-5">
                                At The Next Group (TnG), we are passionate about organizing exciting bike rides. Join us
                                for memorable biking experiences planned for the days ahead. With TnG, every ride is an
                                opportunity to discover new trails and make lasting friendships.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Upcoming Ride Section -->
            @if(empty($upcomingEvent))
            @else
            <div class="row mt-5 mb-5 g-0 bg-dark">
                <!-- Left Column: Upcoming Event Details -->
                <div class="col-12 col-md-4 d-flex justify-content-center text-white align-items-center pt-5">
                    <div class="w-75 text-center">
                        <h2>Upcoming Ride</h2>
                        <hr class="border w-25 border-warning border-3 mx-auto">
                        <p class="fs-3"><strong>{{ $upcomingEvent->title }}</strong></p>
                        <p class="fs-5">{{ $upcomingEvent->description }}</p>
                    </div>
                </div>
                <!-- Right Column: Event Banner Image -->
                <div class="col-12 col-md-8 d-flex justify-content-center">
                    <img loading="lazy" src="{{ asset('storage'.$upcomingEvent->banner_image) }}" class="img-fluid"
                        alt="">
                </div>
            </div>
            @endif
        </div>

        <div id="service" class="m-5 p-3 p-md-5">
            <!-- Reduced padding for mobile screens -->
            <!-- Service Title -->
            <div class="service-title d-flex justify-content-center">
                <div class="">
                    <h2>Services</h2>
                    <hr class="border w-100 border-warning border-3 mb-5">
                </div>
            </div>

            <!-- Service Cards -->
            <div class="d-flex justify-content-center">
                <div class="w-100 w-md-75">
                    <div class="row g-3">
                        <!-- Service Card 1 -->
                        <div class="col-12 col-md-4 pe-md-5 ps-md-5 mb-3 mb-md-0">
                            <div class="card border-0 rounded">
                                <img src="{{ asset('assets/img/merchant.jpg') }}" class="card-img-top"
                                    alt="Guided Bike Rides"> <!-- Image in card -->
                                <div class="card-body">
                                    <h5 class="card-title">Guided Bike Rides</h5>
                                    <p class="card-text fs-6">Experience the best trails with our guided bike rides,
                                        offering safety, fun, and exploration.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Service Card 2 -->
                        <div class="col-12 col-md-4 pe-md-5 ps-md-5 mb-3 mb-md-0">
                            <div class="card border-0 rounded">
                                <img src="{{ asset('assets/img/custom_ride-plan.jpg') }}" class="card-img-top" alt="Custom Ride Planning">
                                <!-- Image in card -->
                                <div class="card-body">
                                    <h5 class="card-title">Custom Ride Planning</h5>
                                    <p class="card-text fs-6">Let us create a personalized bike route that suits your
                                        preferences and skill level.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Service Card 3 -->
                        <div class="col-12 col-md-4 pe-md-5 ps-md-5 mb-3 mb-md-0">
                            <div class="card border-0 rounded">
                                <img src="{{ asset('assets/img/logo_bg_black.jpg') }}" class="card-img-top" alt="Community Events">
                                <!-- Image in card -->
                                <div class="card-body">
                                    <h5 class="card-title">Community Events</h5>
                                    <p class="card-text fs-6">Join our community events and connect with fellow biking
                                        enthusiasts.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="testimonial" class="bg-dark text-white pt-5 pb-5">
            <div class="testimonial-title d-flex justify-content-center mb-5">
                <div class="">
                    <h2>Testimonials</h2>
                    <hr class="border w-100 border-warning border-3">
                </div>
            </div>

            <!-- Testimonials Row -->
            <div class="row w-75 mx-auto">
                <!-- Testimonial 1 -->
                <div class="col-12 col-md-4 d-flex justify-content-center mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text">TnG's bike rides are simply outstanding! Every ride is well-planned and
                                filled with excitement. It's a great experience to join them on the road.</p>
                        </div>
                        <img loading="lazy" src="{{ asset('assets/img/tanjish_thapa.jpg') }}" class="card-img-top"
                            alt="Tanjish Thapa Magar">
                        <a class="ms-3 mt-2 mb-2" target="_blank" rel="noopener noreferrer"
                            href="https://www.facebook.com/tanjish.magar">Tanjish Thapa Magar</a>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-12 col-md-4 d-flex justify-content-center mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text">The Next Group's events are the highlight of my month. It's a perfect
                                way to meet new people and explore new trails.</p>
                        </div>
                        <img loading="lazy" src="{{ asset('assets/img/janjeer_thapa.jpg') }}" class="card-img-top"
                            alt="Janjeer Thapa">
                        <a class="ms-3 mt-2 mb-2" target="_blank" rel="noopener noreferrer"
                            href="https://www.facebook.com/janjeer1">Janjeer Thapa</a>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="col-12 col-md-4 d-flex justify-content-center mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text">From the organization to the execution, everything is top-notch. Highly
                                recommend TnG for anyone who loves biking!</p>
                        </div>
                        <img loading="lazy" src="{{ asset('assets/img/bikal_roka.jpg') }}" class="card-img-top"
                            alt="Bikal Roka">
                        <a class="ms-3 mt-2 mb-2" target="_blank" rel="noopener noreferrer"
                            href="https://www.facebook.com/profile.php?id=100083533886980">Bikal Roka Magar</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="join_us" class="pt-5 pb-5">
            <div class="join_us-section ps-4 pe-4">
                <div class="join_us-title d-flex justify-content-center">
                    <div>
                        <h2>Join Us</h2>
                        <hr class="border w-100 border-warning border-3">
                    </div>
                </div>

                <!-- Join Us Description -->
                <div class="join_us-description text-center mb-5 px-0 px-md-5">
                    <p class="fs-5">
                        At TnG, we believe in building a strong community of passionate individuals who love biking,
                        adventure, and exploring new trails. By joining us, you become part of an exciting journey
                        towards memorable experiences, adventures, and friendship.
                    </p>
                    <p class="fs-5">
                        Whether you're an experienced rider or just getting started, we have something for everyone. We
                        organize guided rides, custom routes, and community events that bring people together. So, why
                        wait? Join us today and become part of the movement!
                    </p>
                </div>

                <!-- Join Us Content Row -->
                <div class="join_us-contents p-md-3">
                    <div class="row text-center">
                        <!-- Facebook Link -->
                        <div class="col-12 col-md-3 mb-4 mb-md-0">
                            <div class="d-flex justify-content-center">
                                <a href="https://www.facebook.com/profile.php?id=61558305204630" target="_blank" rel="noopener noreferrer">
                                    <h1><i class="bi bi-facebook"></i></h1>
                                </a>
                            </div>
                            <span class="fs-6">Join our Facebook page</span>
                        </div>

                        <!-- Instagram Link with extra margin on mobile -->
                        <div class="col-12 col-md-3 mb-4 mb-md-0">
                            <div class="d-flex justify-content-center">
                                <a href="https://www.instagram.com/tngenfieldersnepal/" target="_blank" rel="noopener noreferrer">
                                    <h1><i class="bi bi-instagram"></i></h1>
                                </a>
                            </div>
                            <span class="fs-6">Join our Instagram page</span>
                        </div>

                        <!-- Email Link -->
                        <div class="col-12 col-md-3 mb-4 mb-md-0">
                            <div class="d-flex justify-content-center">
                                <a href="mailto:{{ config('app.email') }}">
                                    <h1><i class="bi bi-envelope-at"></i></h1>
                                </a>
                            </div>
                            <span class="fs-6">Mail us at {{ config('app.email') }}</span>
                        </div>

                        <!-- Website Link -->
                        <div class="col-12 col-md-3 mb-4 mb-md-0">
                            <div class="d-flex justify-content-center">
                                <a href="{{ config('app.url') }}" target="_blank" rel="noopener noreferrer">
                                    <h1><i class="bi bi-globe2"></i></h1>
                                </a>
                            </div>
                            <span class="fs-6">Visit our website</span>
                        </div>
                    </div>
                </div>

                <!-- Call-to-Action Section -->
                <div class="call-to-action text-center mt-5">
                    <h3>Ready to Join the Adventure?</h3>
                    <p class="fs-5 mb-4">
                        Sign up now to get the latest updates, join upcoming rides, and be part of an exciting community
                        of bikers!
                    </p>
                    <a href="{{ config('app.url') }}/login" class="btn btn-warning text-dark fs-5" target="_blank" rel="noopener noreferrer">Sign Up Now</a>
                </div>
            </div>
        </div>

        <div class="footer bg-dark text-white p-5">
            <footer>
                <div class="row text-center">
                    <!-- Brand Name and Copyright -->
                    <div class="col-12">
                        <div class="brand-name fs-5">
                            <a href="{{ config('app.url') }}" target="_blank" rel="noopener noreferrer">The Next Group</a>
                        </div>
                        <span class="d-block">
                            Copyright © 2025 All rights reserved
                        </span>
                        <span class="d-block">
                            Powered by <a href="https://www.techenfield.com" target="_blank" rel="noopener noreferrer">TechEnfield</a>
                        </span>
                    </div>
                </div>
            </footer>
        </div>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{ asset('js/index.js') }}"></script>

</html>
