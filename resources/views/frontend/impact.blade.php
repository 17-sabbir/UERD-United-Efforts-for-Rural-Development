@extends('main')

@section('content')

  <!-- ======= Modern Breadcrumbs ======= -->
  <section class="modern-breadcrumbs">
    <div class="container text-center">
      <h2>Our Impact</h2>
      <ol class="d-inline-flex justify-content-center">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Impact</li>
      </ol>
    </div>
  </section>

  <!-- ======= Modern Impact Section ======= -->
  <section class="modern-container" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
              <span class="d-inline-block py-1 px-3 rounded-pill bg-white text-primary fw-bold text-uppercase shadow-sm mb-3" style="letter-spacing: 1px;">
                  <i class="fa-solid fa-chart-line me-2"></i> Measurable Change
              </span>
              <h2 class="display-4 fw-bold text-dark mb-3">Empowering Communities, <br><span class="text-primary">One Step at a Time</span></h2>
              <p class="lead text-secondary mx-auto" style="max-width: 700px;">
                  Since our inception, UERD has been dedicated to creating sustainable development. Here is the tangible impact of our collective efforts.
              </p>
          </div>
      </div>

      @if(isset($impact) && count($impact) > 0)
      <div class="row g-4">
          @foreach($impact as $item)
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card h-100 border-0 shadow-lg impact-card overflow-hidden">
                <!-- Top gradient bar -->
                <div class="card-header border-0 p-0" style="height: 6px; background: linear-gradient(90deg, var(--modern-primary), var(--modern-accent));"></div>
                
                <div class="card-body p-4 text-center position-relative z-1">
                    
                    <!-- Floating Icon Background -->
                    <div class="position-absolute top-50 start-50 translate-middle opacity-5 z-n1">
                         @if($item->icon)
                            <i class="{{ $item->icon }}" style="font-size: 8rem; color: var(--modern-primary);"></i>
                        @else
                            <i class="fa-solid fa-chart-simple" style="font-size: 8rem; color: var(--modern-primary);"></i>
                        @endif
                    </div>

                    <!-- Icon Circle -->
                    <div class="mb-4 d-inline-flex align-items-center justify-content-center bg-white shadow-sm rounded-circle position-relative" style="width: 80px; height: 80px; z-index: 2;">
                        <i class="fa-solid fa-circle position-absolute top-0 start-0 w-100 h-100 text-light opacity-25" style="transform: scale(1.2);"></i>
                        @if($item->icon)
                        <i class="{{ $item->icon }} text-primary" style="font-size: 2.2rem;"></i>
                        @else
                        <i class="fa-solid fa-chart-pie text-primary" style="font-size: 2.2rem;"></i>
                        @endif
                    </div>
                    
                    <div class="counter-wrapper mb-2">
                        <h2 class="fw-bold text-dark display-5 mb-0 counter" data-target="{{ preg_replace('/[^0-9]/', '', $item->metric_value) }}">
                            {{ $item->metric_value }}
                        </h2>
                    </div>
                    
                    <p class="text-secondary fw-bold text-uppercase small letter-spacing-1 mb-3 pb-3 border-bottom border-light">
                        {{ $item->metric_unit }}
                    </p>
                    
                    <h5 class="fw-bold text-dark mb-2">{{ $item->title }}</h5>
                    
                    @if($item->description)
                    <p class="text-muted small mb-0">{{ Str::limit($item->description, 80) }}</p>
                    @endif
                    
                    @if($item->year)
                    <div class="mt-3">
                        <span class="badge bg-light text-dark border border-light px-3 py-2 rounded-pill">
                            <i class="fa-regular fa-calendar me-1 text-secondary"></i> {{ $item->year }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
          </div>
          @endforeach
      </div>
      @else
      <div class="col-12 text-center py-5">
        <div class="d-inline-block p-5 bg-white shadow rounded-pill">
            <i class="fa-solid fa-chart-line display-4 text-muted mb-3 opacity-50"></i>
            <h3 class="fw-bold text-dark">Data Update in Progress</h3>
            <p class="text-secondary mb-0">We are currently compiling our latest impact reports.</p>
        </div>
      </div>
      @endif

    </div>
  </section>

  <style>
      .impact-card {
          transition: transform 0.3s ease, box-shadow 0.3s ease;
          background: white;
      }
      .impact-card:hover {
          transform: translateY(-10px);
          box-shadow: 0 1rem 3rem rgba(0,0,0,0.15) !important;
      }
      .text-secondary {
            color: #6c757d !important;
      }
      /* Optional: Animation for counters if JS library not present */
      .counter-wrapper {
          position: relative;
          display: inline-block;
      }
      .counter-wrapper::after {
          content: '';
          position: absolute;
          bottom: -5px;
          left: 50%;
          transform: translateX(-50%);
          width: 40px;
          height: 3px;
          background: var(--modern-accent);
          border-radius: 2px;
      }
  </style>
@endsection
