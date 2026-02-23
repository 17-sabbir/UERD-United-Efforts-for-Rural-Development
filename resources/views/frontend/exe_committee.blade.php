@extends('main')

@section('content')

  <!-- ======= Modern Content Section: Enhanced Layout ======= -->
  <section class="modern-container" style="background-color: #fafafa; padding-top: 100px;">
    <div class="container" data-aos="fade-up">

      <!-- Text Intro -->
      <div class="row justify-content-center mb-5">
          <div class="col-lg-10">
              <div class="bg-white p-5 shadow-sm rounded-4 border-top border-4 border-info position-relative overflow-hidden" style="background: linear-gradient(135deg, #ffffff 0%, #f0fdfa 100%);">
                  <div class="row align-items-center">

                      <div class="col-lg-8">
                           <h2 class="fw-bold text-dark mb-3">Governance Consiousness</h2>
                           <p class="text-secondary text-justify mb-4" style="line-height: 1.8;">
                               The general body of UERD comprises 21 renowned women rights activists. The Executive Committee (EC), consisting of 07 members, guides our strategic direction. Our structure ensures transparency, accountability, and no conflict of interest.
                           </p>
                           <a href="{{ asset('frontend/file/UERD_Organogram.pdf') }}" target="_blank" class="btn btn-primary rounded-pill px-4">
                               <i class="fa-solid fa-sitemap me-2"></i> View Organogram
                            </a>
                      </div>
                      <div class="col-lg-4 d-none d-lg-block text-center">
                          <i class="fa-solid fa-users-gear text-primary text-opacity-10" style="font-size: 10rem;"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Committee Members: Hover Reveal Grid -->
      @if(isset($committee) && count($committee) > 0)
      <div class="row g-4 justify-content-center">
        <div class="col-12 text-center mb-4">
             <span class="d-block text-uppercase text-secondary fw-bold letter-spacing-2 small mb-2">Our Leaders</span>
             <h2 class="fw-bold display-6">Executive Committee</h2>
        </div>

        @foreach($committee as $member)
        <div class="col-lg-3 col-md-6 col-sm-6 col-12" data-aos="flip-left" data-aos-delay="{{ $loop->iteration * 100 }}">
          <div class="member-card position-relative overflow-hidden rounded-4 shadow-lg h-100" style="min-height: 420px; background: #0f172a;">
            
            <!-- Colorful Border Bottom -->
            <div class="position-absolute bottom-0 start-0 w-100" style="height: 6px; background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%); z-index: 10;"></div>
            
            <!-- Image Background -->
            @if($member->photo)
                <img src="{{ asset('images/executive_committee/'.$member->photo) }}" class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; transition: all 0.6s cubic-bezier(0.19, 1, 0.22, 1); opacity: 0.9;" alt="{{ $member->name }}">
            @else
                <div class="w-100 h-100 position-absolute top-0 start-0 bg-dark d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-user fa-4x text-white opacity-25"></i>
                </div>
            @endif

            <!-- Overlay Gradient -->
            <div class="position-absolute w-100 h-100 top-0 start-0" style="background: linear-gradient(to top, rgba(15, 23, 42, 0.95) 10%, rgba(15, 23, 42, 0.4) 50%, rgba(15, 23, 42, 0) 100%); pointer-events: none;"></div>

            <!-- Content Bottom -->
            <div class="member-info position-absolute bottom-0 start-0 w-100 p-4 text-white z-2 members-content-shift">
                <h4 class="fw-bold mb-1 name-text">{{ $member->name }}</h4>
                <p class="text-info small text-uppercase fw-bold letter-spacing-1 mb-3">{{ $member->designation }}</p>
                
                <div class="member-bio opacity-0" style="height: 0; overflow: hidden; transition: all 0.5s ease;">
                    <p class="small text-white-50 mb-3" style="line-height: 1.6;">{{ Str::limit($member->bio, 120) }}</p>
                    <div class="d-flex gap-3 justify-content-center pt-2 border-top border-white border-opacity-10">
                        @if(isset($member->facebook) && $member->facebook) <a href="{{ $member->facebook }}" class="text-white hover-social fs-5"><i class="fa-brands fa-facebook-f"></i></a> @endif
                        @if(isset($member->twitter) && $member->twitter) <a href="{{ $member->twitter }}" class="text-white hover-social fs-5"><i class="fa-brands fa-twitter"></i></a> @endif
                        @if(isset($member->linkedin) && $member->linkedin) <a href="{{ $member->linkedin }}" class="text-white hover-social fs-5"><i class="fa-brands fa-linkedin-in"></i></a> @endif
                    </div>
                </div>
            </div>

          </div>
        </div>
        @endforeach
      </div>

      <style>
          .member-card:hover img { transform: scale(1.1) rotate(1deg); opacity: 0.5; }
          .member-card:hover .member-bio { height: auto; opacity: 1; max-height: 300px; padding-bottom: 10px; }
          .member-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(79, 172, 254, 0.2) !important; }
          .member-card:hover .members-content-shift { padding-bottom: 2rem !important; }
          .hover-social:hover { color: #00f2fe !important; transform: scale(1.2); transition: all 0.2s; }
          .name-text { text-shadow: 0 2px 10px rgba(0,0,0,0.5); }
      </style>
      @endif

    </div>
  </section>
@endsection
