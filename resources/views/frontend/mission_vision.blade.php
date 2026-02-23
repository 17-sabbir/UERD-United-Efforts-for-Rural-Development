@extends('main')

@section('content')

  <!-- ======= Modern Breadcrumbs ======= -->
  <section class="modern-breadcrumbs">
    <div class="container text-center">
      <h2>Mission & Vision</h2>
      <ol class="d-inline-flex justify-content-center">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Mission & Vision</li>
      </ol>
    </div>
  </section>

  <!-- ======= Modern Content Section ======= -->
  <section class="modern-container">
    <div class="container" data-aos="fade-up">
        
        <div class="row g-4 justify-content-center">
            <!-- Mission Card -->
            <div class="col-md-6 col-lg-5">
                <div class="feature-box h-100">
                    <div class="feature-icon-wrapper" style="background: rgba(230,25,50,0.1); color: #E61932;">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3 class="modern-title" style="margin-bottom: 25px;">Our Mission</h3>
                    <p class="modern-text">
                        {{ $mission_vision->mission ?? 'To improve the quality of life...' }}
                    </p>
                </div>
            </div>

            <!-- Vision Card -->
            <div class="col-md-6 col-lg-5">
                <div class="feature-box h-100">
                    <div class="feature-icon-wrapper" style="background: rgba(240,180,41,0.1); color: #F0B429;">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3 class="modern-title" style="margin-bottom: 25px;">Our Vision</h3>
                    <p class="modern-text">
                        {{ $mission_vision->vision ?? 'To see a society free from poverty...' }}
                    </p>
                </div>
            </div>
        </div>

    </div>
  </section>

@endsection
