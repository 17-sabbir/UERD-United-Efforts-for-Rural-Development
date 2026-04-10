@extends('main')

@section('content')

  <!-- ======= Modern Breadcrumbs ======= -->
  <section class="modern-breadcrumbs">
    <div class="container text-center">
            <h2>Mission, Vision & Values</h2>
      <ol class="d-inline-flex justify-content-center">
        <li><a href="{{ url('/') }}">Home</a></li>
                <li class="current">Mission, Vision & Values</li>
      </ol>
    </div>
  </section>

  <!-- ======= Modern Content Section ======= -->
  <section class="modern-container">
    <div class="container" data-aos="fade-up">
        
        <div class="row g-4 justify-content-center">
            <!-- Mission Card -->
            <div class="col-md-6 col-lg-4">
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
            <div class="col-md-6 col-lg-4">
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

            <!-- Focus Area Card -->
            <div class="col-md-6 col-lg-4">
                <div class="feature-box h-100">
                    <div class="feature-icon-wrapper" style="background: rgba(46,139,87,0.1); color: #2E8B57;">
                        <i class="fa-solid fa-crosshairs"></i>
                    </div>
                    <h3 class="modern-title" style="margin-bottom: 25px;">Our Values</h3>
                    <p class="modern-text">
                        {{ $mission_vision->key_focus ?? 'Women Empowerment...' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Our Objectives Section -->
        <div class="row justify-content-center mt-5 pt-3">
            <div class="col-lg-10">
                <h2 class="fw-bold mb-4" style="color: #1a2b4c;">Our Objectives</h2>
                
                <div class="d-flex flex-column gap-3">
                    
                    @if(isset($objectives) && count($objectives) > 0)
                        @foreach($objectives as $objective)
                        <!-- Objective -->
                        <div class="bg-white p-4 border" style="border-radius: 4px;">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-4" style="color: #0a58ca; font-size: 1.5rem;">
                                    <i class="{{ $objective->icon ?? 'fa-solid fa-check' }}"></i>
                                </div>
                                <div class="text-secondary" style="font-size: 15px; font-weight: 500;">
                                    {{ $objective->description }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Fallback/Default Objective -->
                        <div class="alert alert-info text-center w-100">
                            No objectives found. Please add objectives from the admin panel.
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
  </section>

@endsection
