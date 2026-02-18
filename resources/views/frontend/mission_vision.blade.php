@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About us</li>
      </ol>
      <h2>Mission & Vision</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5 px-3" data-aos="fade-up">
        <div class="row g-4 justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center"><i class="fa-solid fa-bullseye text-danger"></i></h1>
                <h3 class="text-center">Our <strong class="text-danger">Mission</strong></h3>
                <p class="text-secondary" style="text-align: justify;">
                  {{ $mission_vision->mission ?? '' }}
                </p>
            </div>
            <div class="col-md-5 border-start">
                <h1 class="text-center"><i class="fa-solid fa-eye text-danger"></i></h1>
                <h3 class="text-center">Our <strong class="text-danger">Vision</strong></h3>
                <p class="text-secondary" style="text-align: justify;">
                  {{ $mission_vision->vision ?? '' }}
                </p>
            </div>
        </div>

    </div>
  </section><!-- End Contact Section -->

@endsection
