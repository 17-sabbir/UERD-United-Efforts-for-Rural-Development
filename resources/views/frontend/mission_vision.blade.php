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

  <!-- ======= Key Focus Area ======= -->
  @if(isset($focus_areas) && count($focus_areas) > 0)
  <section class="modern-container" id="key-focus">
    <div class="container" data-aos="fade-up">
      <div class="text-center mb-4">
        <h2 class="modern-title">Key Focus Areas</h2>
        <p class="modern-text">Our primary focus areas where UERD concentrates its efforts to create lasting impact.</p>
      </div>

      <div class="row g-4">
        @foreach($focus_areas as $area)
          <div class="col-md-6 col-lg-3">
            <div class="feature-box h-100">
              <div class="feature-icon-wrapper" style="background: rgba(21, 131, 104, 0.06); color: #158364;">
                @if(!empty($area->icon_class))
                  <i class="{{ $area->icon_class }}"></i>
                @else
                  <i class="fa-solid fa-check-double"></i>
                @endif
              </div>
              <h4 class="modern-subtitle" style="margin-top:12px;">{{ $area->title }}</h4>
              <p class="modern-text small">{{ Str::limit(strip_tags($area->description ?? ''), 140) }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif

@endsection
