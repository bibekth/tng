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
        <nav class="navbar sticky-top navbar-expand-lg bg-light ps-5 pe-5">
            <div class="row g-2 w-100">
                <div class="left-section col-6 pt-1">
                    <a class="navbar-brand brand-name" href="#">The Next Group</a>
                </div>
                <div class="right-section col-6 d-flex justify-content-end">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
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
            </div>
        </nav>
        <div id="home">
            <div class="intro-video-section position-relative mb-5">
                <div class="container position-absolute top-50 start-0 translate-middle-y ps-10">
                    <div class="p-4">
                        <h2 class="fw-bold">Join the Adventure with</h2>
                        <h2 class="fw-bold">TnG</h2>
                        <hr class="border border-warning border-3" style="width: 12%;">
                        <p class="fs-5">Discover the Thrill of Bike Rides for Upcoming Days</p>
                    </div>
                </div>
                <video id="intro_video" src="{{ asset('assets/vid/intro.mp4') }}" class="w-100 h-100 object-fit-cover"
                    autoplay muted loop playsinline></video>
            </div>
        </div>
        <div id="about">
            <div class="row g-2 m-5 p-5">
                <div class="col-4">
                    <img loading="lazy" src="{{ asset('assets/img/merchant.jpg') }}" height="auto" width="100%" alt="" srcset="">
                </div>
                <div class="col-8 d-flex justify-content-center ps-5 pe-5">
                    <div class="align-content-center bg-dark text-white ps-3 pe-3">
                        <div class="about-title d-flex justify-content-center mb-3">
                            <h2>About The Next Group</h2>
                        </div>
                        <hr class="border w-25 border-warning border-3" style="margin: 0 auto;">
                        <div class="about-description mt-5 ps-5 pe-5">
                            <p class="fs-5">
                                At The Next Group (TnG), we are passionate about organizing exciting bike rides. Join us
                                for
                                memorable biking experiences planned for the days ahead. With TnG, every ride is an
                                opportunity to discover new trails and make lasting friendships.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-5 g-0 bg-dark">
                <div class="col-4 d-flex justify-content-center text-white align-items-center">
                    <div class="w-75">
                        <h2>Upcoming Ride</h2>
                        <hr class="border w-25 border-warning border-3">
                        <p class="fs-3"><strong>{{ $upcomingEvent->title }}</strong></p>
                        <p class="fs-5">{{ $upcomingEvent->description }}</p>
                    </div>
                </div>
                <div class="col-8 d-flex justify-content-center">
                    <img loading="lazy" src="{{ asset('storage'.$upcomingEvent->banner_image) }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div id="service" class="m-5 p-5">
            <div class="service-title d-flex justify-content-center">
                <div class="">
                    <h2>Services</h2>
                    <hr class="border w-100 border-warning border-3">
                </div>
            </div>
            <div class="d-flex judtif-content-center">
                <div class="w-75 row g-3" style="margin: 0 auto;">
                    <div class="col-4 ps-5 pe-5">
                        <div class="service-image mb-5">
                            <img loading="lazy" src="{{ asset('assets/img/merchant.jpg') }}" class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="">
                            <h5>Guided Bike Riders</h5>
                            <p class="fs-6">Experience the best trails with our guided bike rides, offering safety, fun,
                                and exploration.</p>
                        </div>
                    </div>
                    <div class="col-4 ps-5 pe-5">
                        <div class="service-image mb-5">
                            <img loading="lazy" src="{{ asset('logo.png') }}" class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="">
                            <h5>Custom Ride Planning</h5>
                            <p class="fs-6">Let us create a personalized bike route that suits your preferences and
                                skill level.</p>
                        </div>
                    </div>
                    <div class="col-4 ps-5 pe-5">
                        <div class="service-image mb-5">
                            <img loading="lazy" src="{{ asset('logo.png') }}" class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="">
                            <h5>Community Events</h5>
                            <p class="fs-6">Join our community events and connect with fellow biking enthusiasts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="testimonial" class="bg-dark text-white pt-10 pb-5">
            <div class="testimonial-title d-flex justify-content-center mb-5">
                <div class="">
                    <h2>Testimonials</h2>
                    <hr class="border w-100 border-warning border-3">
                </div>
            </div>
            <div class="row w-75" style="margin: 0 auto;">
                <div class="col-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text"> TnG's bike rides are simply outstanding! Every ride is well-planned
                                and filled with excitement. It's a great experience to join them on the road.
                            </p>
                        </div>
                        <img loading="lazy" src="{{ asset('assets/img/tanjish_thapa.jpg') }}" class="card-img-top"
                            alt="Tanjish Thapa Magar">
                        <a class="ms-3 mt-2 mb-2" target="_blank" rel="noopener noreferrer"
                            href="https://www.facebook.com/tanjish.magar">Tanjish Thapa Magar</a>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text"> The Next Group's events are the highlight of my month. It's a perfect
                                way to meet new people and explore new trails.</p>
                        </div>
                        <img loading="lazy" src="{{ asset('assets/img/janjeer_thapa.jpg') }}" class="card-img-top" alt="Janjeer Thapa">
                        <a class="ms-3 mt-2 mb-2" target="_blank" rel="noopener noreferrer"
                            href="https://www.facebook.com/janjeer1">Janjeer Thapa</a>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text"> From the organization to the execution, everything is top-notch.
                                Highly recommend TnG for anyone who loves biking!
                            </p>
                        </div>
                        <img loading="lazy" src="{{ asset('assets/img/bikal_roka.jpg') }}" class="card-img-top" alt="Bikal Roka">
                        <a class="ms-3 mt-2 mb-2" target="_blank" rel="noopener noreferrer"
                            href="https://www.facebook.com/profile.php?id=100083533886980">Bikal Roka Magar</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="join_us" class="pt-10 pb-5">
            <div class="join_us-section ps-5 pe-5">
                <div class="join_us-title d-flex justify-content-center">
                    <div class="">
                        <h2>Join Us</h2>
                        <hr class="border w-100 border-warning border-3">
                    </div>
                </div>
                <div class="join_us-contents p-5">
                    <div class="row">
                        <div class="col-3">
                            <div class=" d-flex justify-content-center">
                                <a href="https://www.facebook.com/profile.php?id=61558305204630">
                                    <h1><i class="bi bi-facebook"></i></h1>
                                </a>
                            </div><span class="fs-6 d-flex justify-content-center">Join our Facebook page</span>
                        </div>
                        <div class="col-3">
                            <div class=" d-flex justify-content-center">
                                <a href="https://www.instagram.com/tngenfieldersnepal/">
                                    <h1><i class="bi bi-instagram"></i></h1>
                                </a>
                            </div><span class="fs-6 d-flex justify-content-center">Join our Instagram page</span>
                        </div>
                        <div class="col-3">
                            <div class=" d-flex justify-content-center">
                                <a href="mailto:{{ config('app.email') }}">
                                    <h1><i class="bi bi-envelope-at"></i></h1>
                                </a>
                            </div>
                            <span class="fs-6 d-flex justify-content-center">Mail us at {{ config('app.email') }}</span>
                        </div>
                        <div class="col-3">
                            <div class=" d-flex justify-content-center">
                                <a href="{{ config('app.url') }}">
                                    <h1><i class="bi bi-globe2"></i></h1>
                                </a>
                            </div> <span class="fs-6 d-flex justify-content-center">Visit our website</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer bg-dark text-white p-5">
            <footer>
                <div class="row">
                    <div class="">
                        <div class="brand-name fs-5 d-flex justify-content-center">The Next Group</div>
                        <span class="d-flex justify-content-center">
                            Copyright © 2025 All rights reserved
                        </span>
                        <span class="d-flex justify-content-center">
                            Powered by TechEnfield
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
