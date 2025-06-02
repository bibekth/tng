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
    <div class="container-fluid-none">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid px-5">
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
                        <span class="fs-5">On <strong> {{ $upcomingEvent->event_date }}</strong> and starts at
                            <strong>{{
                                $start_at }}</strong></span>
                        <p class="fs-5">For only Rs. <strong>{{ $upcomingEvent->fee }}</strong></p>
                        <p id="event-description" class="fs-5"></p>
                        @if($esewa_exist === true)
                        <button class="btn btn-primary my-3" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Register For This Ride</button>
                        @endif
                    </div>
                    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="descriptionModalLabel">Full Description</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="overflow-y: auto;">
                                    <p id="fullDescription" class="text-dark"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade text-dark" id="registerModal" data-bs-backdrop="static" tabindex="-1"
                        aria-labelledby="registerModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="registerModalLabel">Register <strong>{{
                                            $upcomingEvent->title }}</strong> Ride</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="fs-5">Your payment ID is <strong>{{ $payment_id }}</strong></p>
                                    <p class="fs-5">Please input the <strong> payment ID</strong> and <strong> event
                                            name</strong> in remarks on payment.</p>
                                    <p class="fs-6" style="text-decoration: underline; color: blue; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#registerExampleModal">
                                        Click to view the example</p>
                                    <div class="qr-for-payment d-flex justify-content-center">
                                        <img src="{{ asset('assets/img/qr.jpg') }}" alt="" width="500" height="auto">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#formFillUpModal">Proceed for Form Fillup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade text-dark" id="registerExampleModal" tabindex="-1"
                        aria-labelledby="registerExampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="registerExampleModalLabel">Example on how to submit the
                                        payment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <img src="{{ asset('assets/img/qr-example1.jpg') }}" alt="" width="380"
                                                height="auto">
                                        </div>
                                        <div class="col-6">
                                            <img src="{{ asset('assets/img/qr-example2.jpg') }}" alt="" width="380"
                                                height="auto">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade text-dark" id="formFillUpModal" data-bs-backdrop="static" tabindex="-1"
                        aria-labelledby="formFillUpModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <form action="{{ route('event.pay') }}" method="post" class=""
                                    enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="formFillUpModalLabel">Fill up this form for
                                            <strong>{{
                                                $upcomingEvent->title }}</strong> Ride
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body" style="overflow-y: auto;">
                                            @csrf
                                            <input type="hidden" name="event_id" value="{{ $upcomingEvent->id }}">
                                            <input type="text" name="payment_id" id="payment_id"
                                                class="form-control mb-3" placeholder="Your Payment ID" required>
                                            <input type="text" name="name" id="name" class="form-control mb-3"
                                                placeholder="Your Name" required>
                                            <input type="email" name="email" id="email" class="form-control mb-3"
                                                placeholder="Your Email" required>
                                            <input type="text" name="contact" id="contact" class="form-control mb-3"
                                                placeholder="Your Phone Number" required>
                                            <input type="file" name="image" id="image" class="form-control" required>
                                            <span style="font-size: 14px;" class="mb-3 px-1">Upload the screenshot of
                                                the payment here.</span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    @endif

                                    @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @if(is_array(Session::get('error')))
                                            @foreach (Session::get('error')->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                            @else
                                            <li>{{ Session::get('error') }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                    @endif
                                    {{-- {{ session('message') }} --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column: Event Banner Image -->
                <div class="col-12 col-md-8 d-flex justify-content-center">
                    <img loading="lazy" src="{{ asset('storage'.$upcomingEvent->banner_image) }}" class="img-fluid"
                        crossorigin="anonymous" alt="">
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    let paragraph = document.getElementById("event-description");
                    let fullText = `{{ $upcomingEvent->description }}`.trim(); // Laravel dynamic content
                    let words = fullText.split(" ");

                    if (words.length > 50) {
                        let shortText = words.slice(0, 50).join(" ");
                        paragraph.innerHTML = `
                            ${shortText}
                            <span class="text-primary" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#descriptionModal">... See more</span>
                        `;

                        // Set full description inside the modal
                        document.getElementById("fullDescription").innerHTML = fullText;
                    } else {
                        paragraph.innerHTML = fullText; // Display full text if 100 words or less
                    }
                });
            </script>
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
                                <img src="{{ asset('assets/img/merchant.jpg') }}" class="img-fluid card-img-top" width="300" height="400"
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
                                <img src="{{ asset('assets/img/custom_ride-plan.jpg') }}" class="img-fluid card-img-top"
                                    alt="Custom Ride Planning">
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
                                <img src="{{ asset('assets/img/logo_bg_black.jpg') }}" class="img-fluid card-img-top" 
                                    alt="Community Events">
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
                        <img loading="lazy" src="{{ asset('assets/img/tanjish_thapa.jpg') }}" class="img-fluid card-img-top"
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
                        <img loading="lazy" src="{{ asset('assets/img/janjeer_thapa.jpg') }}" class="img-fluid card-img-top"
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
                        <img loading="lazy" src="{{ asset('assets/img/bikal_roka.jpg') }}" class="img-fluid card-img-top"
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
                                <a href="https://www.facebook.com/profile.php?id=61558305204630" target="_blank" aria-label="Join our Facebook page"
                                    rel="noopener noreferrer">
                                    <h1><i class="bi bi-facebook"></i></h1>
                                </a>
                            </div>
                            <span class="fs-6">Join our Facebook page</span>
                        </div>

                        <!-- Instagram Link with extra margin on mobile -->
                        <div class="col-12 col-md-3 mb-4 mb-md-0">
                            <div class="d-flex justify-content-center">
                                <a href="https://www.instagram.com/tngenfieldersnepal/" target="_blank" aria-label="Join our Instagram page"
                                    rel="noopener noreferrer">
                                    <h1><i class="bi bi-instagram"></i></h1>
                                </a>
                            </div>
                            <span class="fs-6">Join our Instagram page</span>
                        </div>

                        <!-- Email Link -->
                        <div class="col-12 col-md-3 mb-4 mb-md-0">
                            <div class="d-flex justify-content-center">
                                <a href="mailto:{{ config('app.email') }}" aria-label="Mail us at {{ config('app.email') }}">
                                    <h1><i class="bi bi-envelope-at"></i></h1>
                                </a>
                            </div>
                            <span class="fs-6">Mail us at {{ config('app.email') }}</span>
                        </div>

                        <!-- Website Link -->
                        <div class="col-12 col-md-3 mb-4 mb-md-0">
                            <div class="d-flex justify-content-center">
                                <a href="{{ config('app.url') }}" target="_blank" rel="noopener noreferrer" aria-label="Visit our website">
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
                    <a href="{{ config('app.url') }}/login" class="btn btn-warning text-dark fs-5" target="_blank" aria-label="Sign Up now"
                        rel="noopener noreferrer">Sign Up Now</a>
                </div>
            </div>
        </div>

        <div class="footer bg-dark text-white p-5">
            <footer>
                <div class="row text-center">
                    <!-- Brand Name and Copyright -->
                    <div class="col-12">
                        <div class="brand-name fs-5">
                            <a href="{{ config('app.url') }}" target="_blank" rel="noopener noreferrer" aria-label="The Next Group">The Next
                                Group</a>
                        </div>
                        <span class="d-block">
                            Copyright © 2025 All rights reserved
                        </span>
                        <span class="d-block">
                            Powered by <a href="https://www.techenfield.com" target="_blank" aria-label="Tech Enfield - We take the tech upto your work field"
                                rel="noopener noreferrer">TechEnfield</a>
                        </span>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    @if(Session::has('success') || Session::has('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('messageModal'));
            myModal.show();
        });
    </script>
    @endif
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{ asset('js/index.js') }}"></script>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        let paragraph = document.getElementById("event-description");
        let fullText = `{{ $upcomingEvent->description }}`.trim(); // Laravel dynamic content
        let words = fullText.split(" ");

        if (words.length > 50) {
            let shortText = words.slice(0, 50).join(" ");
            paragraph.innerHTML = `
                ${shortText}
                <span class="text-primary" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#descriptionModal">... See more</span>
            `;

            // Set full description inside the modal
            document.getElementById("fullDescription").innerHTML = fullText;
        } else {
            paragraph.innerHTML = fullText; // Display full text if 100 words or less
        }
    });
</script> --}}

</html>
