@extends('main')

@section('content')

  <!-- ======= Modern Breadcrumbs ======= -->
  <section class="modern-breadcrumbs">
    <div class="container text-center">
      <h2>About UERD</h2>
      <ol class="d-inline-flex justify-content-center">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">About UERD</li>
      </ol>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Modern Content Section ======= -->
  <section class="modern-container">
    <div class="container" data-aos="fade-up">

      <div class="modern-card">
        <div class="row">
           <div class="col-lg-12">
              <h3 class="modern-title">About United Efforts for Rural Development</h3>
              <div class="modern-text text-justify" style="text-align: justify;">
                {!! nl2br(e($about_us->description)) !!}
              </div>
           </div>
        </div>
      </div>

    </div>
  </section>

@endsection
