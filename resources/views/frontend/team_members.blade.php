@extends('main')

@section('content')

  <!-- ======= Modern Content Section ======= -->
  <section class="modern-container" style="padding-top: 100px;">
    <div class="container" data-aos="fade-up">
        
        <div class="text-center mb-5">
            <span class="text-secondary fw-bold text-uppercase letter-spacing-2">Meet The Team</span>
            <h2 class="modern-title d-block mt-2 border-0 position-static">Dedicated Professionals</h2>
            <style>.modern-title::after{display:none !important;}</style>
            <p class="modern-text mx-auto" style="max-width: 600px;">
                We are a group of innovative, experienced, and proficient individuals working together to create impact.
            </p>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
            @if(isset($team) && count($team) > 0)
                @foreach($team as $member)
                <div class="col" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="team-modern-card h-100 bg-white rounded-4 overflow-hidden text-center position-relative">
                        
                        <!-- Colorful Border Top -->
                        <div class="position-absolute top-0 start-0 w-100" style="height: 6px; background: linear-gradient(90deg, #ff9a9e 0%, #fecfef 99%, #fecfef 100%); z-index: 5;"></div>

                        <div class="team-img-wrapper position-relative overflow-hidden m-3 rounded-circle shadow-sm mx-auto" style="width: 180px; height: 180px; border: 4px solid #fff;">
                            <div class="ratio ratio-1x1 h-100">
                                @if($member->image)
                                    <img src="{{ asset('images/team_members/'.$member->image) }}" class="object-fit-cover w-100 h-100 transition-transform" alt="{{ $member->name }}">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center w-100 h-100">
                                        <i class="fa-solid fa-user fa-3x text-secondary opacity-25"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="team-content px-4 pb-4 pt-1">
                            <h5 class="fw-bold mb-1 text-dark">{{ $member->name }}</h5>
                            <span class="badge rounded-pill bg-light text-primary px-3 py-2 mb-2 shadow-sm d-inline-block">{{ $member->designation ?? 'Team Member' }}</span>
                            
                            @if($member->department)
                            <p class="text-muted small mb-3">{{ $member->department }}</p>
                            @endif

                            <div class="d-flex justify-content-center gap-2 mt-3">
                                @if(isset($member->facebook) && $member->facebook)
                                <a href="{{ $member->facebook }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle shadow-sm" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-facebook-f"></i></a>
                                @endif
                                
                                @if(isset($member->twitter) && $member->twitter)
                                <a href="{{ $member->twitter }}" target="_blank" class="btn btn-sm btn-outline-info rounded-circle shadow-sm" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-twitter"></i></a>
                                @endif
                                
                                @if(isset($member->linkedin) && $member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle shadow-sm" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-linkedin-in"></i></a>
                                @endif

                                @if(isset($member->email) && $member->email)
                                <a href="mailto:{{ $member->email }}" class="btn btn-sm btn-outline-danger rounded-circle shadow-sm" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-envelope"></i></a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">No active team members found.</p>
                </div>
            @endif
        </div>

        <style>
            .team-modern-card { transition: transform 0.3s ease, box-shadow 0.3s ease; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.04); }
            .team-modern-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
            .team-modern-card:hover img { transform: scale(1.1); }
            .btn-outline-primary:hover, .btn-outline-info:hover, .btn-outline-danger:hover { transform: translateY(-3px); }
            .transition-transform { transition: transform 0.5s ease; }
        </style>

    </div>
  </section>

@endsection
