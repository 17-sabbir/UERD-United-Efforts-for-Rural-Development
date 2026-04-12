@extends('main')

@section('content')

  <!-- ======= Modern Breadcrumbs ======= -->
  <section class="modern-breadcrumbs">
    <div class="container text-center">
      <h2>Origin and Legal Affiliation</h2>
      <ol class="d-inline-flex justify-content-center">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Origin and Legal Affiliation</li>
      </ol>
    </div>
  </section>

  <!-- ======= Modern Content Section: Split Layout ======= -->
  <section class="modern-container">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">
        <!-- ORIGIN STORY (Left Column) -->
        <div class="col-lg-6">
           <div class="pe-lg-4">
               <span class="d-inline-block py-1 px-3 rounded-pill bg-light text-primary fw-bold text-uppercase shadow-sm mb-3" style="letter-spacing: 1px;">
                  Overview
               </span>
               <h2 class="display-5 fw-bold text-dark mb-4">Origin and Legal Affiliation</h2>
               
               <div class="origin-content text-muted lead">
                   <p class="mb-4" style="line-height: 1.8;">
                       UERD is registered with the <strong>NGO Affairs Bureau (NGOAB)</strong> of the Prime Minister’s Office, Government of the People's Republic of Bangladesh (Registration No. 2443).
                   </p>
                   <p class="mb-4" style="line-height: 1.8;">
                       We also hold registration from the <strong>Directorate of Women’s Affairs (DWA)</strong>
                   </p>
                   <p class="mb-4" style="line-height: 1.8;">
                       Additionally, UERD is registered with the <strong>Directorate of Youth Development</strong>, Government of Bangladesh.
                   </p>
                   <p class="mb-0" style="line-height: 1.8;">
                       These legal affiliations empower us to operate transparently and effectively across our project areas.
                   </p>
               </div>

           </div>
        </div>

        <!-- AFFILIATION CERTIFICATES (Right Column - List View) -->
        <div class="col-lg-6">
            <h3 class="fw-bold text-dark mb-4 pb-2 border-bottom">Certificates & Documents</h3>
            <div class="d-flex flex-column gap-3">
                @foreach ($affilation as $key => $data)
                <a href="{{ asset('images/legal_affilation/'.$data->file) }}" target="_blank" class="text-decoration-none group-hover-effect">
                    <div class="card border-0 shadow-sm p-3 d-flex flex-row align-items-center bg-white transition-all hover-translate">
                        <div class="rounded-circle bg-light p-3 me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="fa-solid fa-file-contract text-primary fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold text-dark mb-1">{{ $data->name }}</h6>
                            <small class="text-muted"><i class="fa-solid fa-download me-1"></i> Click to view document</small>
                        </div>
                        <div class="text-secondary">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
      </div>

    </div>
  </section>

  <style>
      .hover-translate {
          transition: transform 0.2s ease, box-shadow 0.2s ease;
      }
      .hover-translate:hover {
          transform: translateX(5px);
          box-shadow: 0 .5rem 1rem rgba(0,0,0,0.1) !important;
      }
  </style>
@endsection
