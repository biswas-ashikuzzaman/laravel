@extends('layouts.master')
@section('title', 'About us')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section class="py-5  text-center bg-light">
      <div class="container">
        <h1 class="fw-bold text-primary mt-4">About Us</h1>
        <p class="lead text-muted">Discover who we are and what makes your journey unforgettable.</p>
      </div>
    </section>

    <!-- ======= About Content ======= -->
    <section class="py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-4">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=900&q=80" 
                class="img-fluid rounded shadow" alt="About TravelEase">
          </div>
          <div class="col-lg-6">
            <h2 class="fw-bold text-primary mb-3">Welcome to TravelEase</h2>
            <p class="text-muted">
              At TravelEase, we believe that travel is more than visiting new places — it’s about creating stories,
              memories, and lifelong experiences. Established in 2020, we’ve helped thousands of travelers explore 
              the world with comfort and confidence.
            </p>
            <p class="text-muted">
              Whether you seek adventure, relaxation, or cultural immersion, our expert team crafts tailored packages 
              to fit your dream journey. We handle everything — from planning to booking — so you can focus on enjoying 
              the moments that matter.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Mission & Vision ======= -->
    <section class="py-5 bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-4">
            <h3 class="fw-bold text-primary">Our Mission</h3>
            <p class="text-muted">
              To deliver affordable, reliable, and memorable travel experiences for every customer, 
              making global travel accessible to everyone.
            </p>
          </div>
          <div class="col-md-6">
            <h3 class="fw-bold text-primary">Our Vision</h3>
            <p class="text-muted">
              To become a leading travel platform that connects people, cultures, and destinations 
              through innovation and exceptional service.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Our Team Section ======= -->
    <section class="py-5 text-center">
      <div class="container">
        <h2 class="fw-bold text-primary mb-5">Meet Our Team</h2>
        <div class="row g-4">
          <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm">
              <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="CEO">
              <div class="card-body">
                <h5 class="card-title mb-0">Sarah Khan</h5>
                <p class="text-muted">Founder & CEO</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm">
              <img src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Manager">
              <div class="card-body">
                <h5 class="card-title mb-0">Amit Roy</h5>
                <p class="text-muted">Operations Manager</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm">
              <img src="https://images.unsplash.com/photo-1603415526960-f7e0328a16d3?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Guide">
              <div class="card-body">
                <h5 class="card-title mb-0">Maria Lopez</h5>
                <p class="text-muted">Travel Guide</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm">
              <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Support">
              <div class="card-body">
                <h5 class="card-title mb-0">Ravi Patel</h5>
                <p class="text-muted">Customer Support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection