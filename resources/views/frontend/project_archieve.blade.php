@extends('main')

@section('content')

  <div class="container pt-5 pb-3 text-center">
      <h1 class="display-3 fw-bold text-uppercase" style="background: linear-gradient(to right, #009688, #8bc34a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
          Project Archive
      </h1>
  </div>

  <!-- ======= Minimalist Archive List Section ======= -->
  <section class="modern-container bg-white">
    <div class="container" data-aos="fade-up">

      <div class="row mb-5 justify-content-center">
          <div class="col-lg-8 text-center">
              <span class="d-inline-block py-1 px-3 rounded-pill bg-light text-secondary fw-bold text-uppercase shadow-sm mb-3" style="letter-spacing: 1px;">
                  Legacy of Impact
              </span>
              <h2 class="display-5 fw-bold text-dark mb-4">Completed Projects</h2>
              <p class="text-muted lead">
                  Exploring the history of our dedication. A comprehensive list of projects we have successfully delivered for our communities.
              </p>
          </div>
      </div>

      <div class="row g-4 justify-content-center">
        <div class="col-lg-10">
            <div class="list-group list-group-flush border-top">
                @foreach ($project as $key => $proj)
                @php
                  // Safe data access
                  $projectName = data_get($proj, 'project_name') ?? data_get($proj, 'name') ?? data_get($proj, 'title');
                  $projectDonors = data_get($proj, 'donors') ?? data_get($proj, 'partners');
                  $fromDate = data_get($proj, 'from_date');
                  $toDate = data_get($proj, 'to_date');
                  $projectPeriod = project_period($proj) ?: trim(($fromDate ?? '').(($fromDate || $toDate) ? ' - ' : '').($toDate ?? ''));
                @endphp
                
                <div class="list-group-item p-4 border-bottom border-light hover-bg-light transition-all">
                    <div class="row align-items-center">
                        <div class="col-md-1 d-none d-md-block text-center">
                            <span class="fs-4 fw-bold text-light text-stroke">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        
                        <div class="col-md-7 mb-3 mb-md-0">
                            <h5 class="fw-bold text-dark mb-1">{{ $projectName }}</h5>
                            @if($projectDonors)
                            <div class="d-flex align-items-center mt-2">
                                <span class="badge bg-light text-secondary border fw-normal me-2">
                                    <i class="fa-solid fa-handshake me-1"></i> Partner
                                </span>
                                <span class="small text-muted">{{ $projectDonors }}</span>
                            </div>
                            @endif
                        </div>
                        
                        <div class="col-md-4 text-md-end">
                            <div class="d-inline-flex align-items-center bg-light px-3 py-2 rounded-pill">
                                <i class="fa-regular fa-calendar-check text-success me-2"></i>
                                <span class="small fw-bold text-dark">{{ $projectPeriod }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      </div>

    </div>
  </section>

  <style>
      .text-stroke {
          -webkit-text-stroke: 1px #dee2e6;
          color: transparent;
      }
      .hover-bg-light:hover {
          background-color: #f8f9fa;
          transform: translateX(5px);
          border-left: 3px solid var(--modern-primary);
      }
      .transition-all {
          transition: all 0.3s ease;
      }
      /* Custom list group item styling */
      .list-group-item {
          border-left: 3px solid transparent;
      }
  </style>
@endsection
