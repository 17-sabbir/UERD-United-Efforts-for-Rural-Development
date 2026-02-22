@extends('main')

@section('body_class', 'is-home')

@section('title')
United Efforts for Rural Development (UERD)
@endsection

@section('content')
{{-- slider --}}
<style>
    .hero-subtitle {
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        padding: 8px 20px;
        border-radius: 9999px; /* Pill */
        display: inline-block;
        font-size: 0.85rem;
        letter-spacing: 2px;
        color: var(--brand-gold); /* Highlight */
        border: 1px solid rgba(252, 211, 47, 0.3);
        margin-bottom: 25px;
        text-transform: uppercase;
        font-weight: 700;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    
    .hero-title {
        font-family: 'Playfair Display', serif; 
        font-size: 4.5rem; 
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 25px;
        letter-spacing: -0.02em;
        max-width: 900px;
        text-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .hero-indented {
        padding-left: 60px; /* Only the 2nd part moves right */
    }

    @@media (max-width: 575.98px) {
        .hero-indented { padding-left: 0; }
        .hero-title { font-size: 3rem; }
    }

    .typewriter-cursor {
        display: inline;
        position: relative;
    }

    .typewriter-cursor::after {
        content: "";
        display: inline-block;
        width: 3px;
        height: 1em;
        margin-left: 8px;
        background: var(--accent-color);
        vertical-align: -0.12em;
        animation: tw-blink 0.9s step-end infinite;
    }

    @@keyframes tw-blink {
        50% { opacity: 0; }
    }
    
    .hero-desc {
        font-size: 1.25rem;
        max-width: 700px;
        margin-bottom: 40px;
        line-height: 1.6;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }
    
    .btn-hero-primary {
        background-color: var(--brand-orange);
        color: white;
        border: none;
        border-radius: 9999px;
        padding: 14px 32px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 14px 0 rgba(249, 116, 21, 0.39);
    }
    
    .btn-hero-primary:hover {
        background-color: #ff8c3a;
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 6px 20px rgba(249, 116, 21, 0.23);
    }
    
    .btn-hero-secondary {
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 9999px;
        padding: 14px 32px;
        font-weight: 600;
        font-size: 1rem;
        margin-left: 20px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .btn-hero-secondary:hover {
        background-color: white;
        color: #1a202c;
        transform: translateY(-2px);
    }

    /* Slider Arrows */
    .carousel-control-prev, .carousel-control-next {
        width: 50px;
        height: 50px;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        backdrop-filter: blur(5px);
        opacity: 0.8;
        margin: 0 20px;
    }
    .carousel-control-prev:hover, .carousel-control-next:hover {
        background-color: rgba(255, 255, 255, 0.4);
        opacity: 1;
    }
    
    /* Dots at bottom */
    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 0 5px;
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
    }
    .carousel-indicators .active {
        background-color: var(--accent-color);
        width: 25px;
        border-radius: 5px; /* Pill shape for active */
    }
</style>

{{-- Home design tokens (color + spacing consistency) --}}
<style>
    :root {
        --uerd-green: var(--primary-color);
        --uerd-accent: var(--accent-color);
        --uerd-accent-strong: #E6660D; /* Darker Orange */
        --uerd-soft-bg: rgba(21, 131, 104, 0.04); /* Soft Teal Bg */
        --uerd-muted: #64748b; /* Slate 500 */
        --uerd-card-border: rgba(255, 255, 255, 0.6);
        --uerd-card-shadow: 0 10px 30px -4px rgba(0, 0, 0, 0.05); /* Softer, larger shadow */
    }

    .uerd-section {
        padding: 4rem 0; /* More white space */
    }
    @@media (min-width: 992px) {
        .uerd-section {
            padding: 6rem 0;
        }
    }

    .uerd-soft-section {
        background-color: var(--uerd-soft-bg);
    }

    .uerd-btn-pill {
        border-radius: 9999px;
        padding: 14px 32px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        letter-spacing: 0.3px;
    }

    .uerd-btn-pill:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
    }

    .uerd-card-hover {
        border-radius: 0.875rem; /* Rounded xl */
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid var(--uerd-card-border);
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(8px);
    }
    .uerd-card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px -4px rgba(21, 131, 104, 0.08); /* Colored shadow hint */
        border-color: rgba(21, 131, 104, 0.15);
    }
</style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($slider as $skey => $slider_item)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $skey }}" class="{{ $skey == 0 ? 'active' : '' }}" aria-current="{{ $skey == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $skey + 1 }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach ($slider as $skey => $slider)
        <div class="carousel-item @if($skey == 0) active @endif">
            <div style="position: relative; height: 100vh; overflow: hidden;"> <!-- Full viewport height -->
                <img src="{{ asset('images/slider/'.$slider->image) }}" class="d-block w-100" alt="UERD" style="object-fit: cover; height: 100%; width: 100%;">
                
                {{-- Dark Gradient Overlay --}}
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to right, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);"></div>

                <div class="container-fluid h-100 position-absolute top-0 start-0 px-lg-3">
                    <div class="d-flex flex-column justify-content-start h-100 text-white" style="padding-top: 106px;">
                        <div>
                            <span class="hero-subtitle">UNITED EFFORTS FOR RURAL DEVELOPMENT</span>
                        </div>
                        <div class="hero-indented"> <!-- Indented Content -->
                            <h2 class="hero-title">
                                <span class="js-typewriter typewriter-cursor hero-title-text" data-text="{{ e($slider->title) }}">{{ $slider->title }}</span>
                            </h2>
                            
                            <p class="hero-desc">
                                <span class="js-typewriter hero-desc-text" data-text="{{ e($slider->description) }}">{{ $slider->description }}</span>
                            </p>
                            
                            <div class="d-flex align-items-center">
                                <a href="{{ route('donate') }}" class="btn btn-hero-primary">
                                    <i class="fa-regular fa-heart me-2"></i> Donate Now
                                </a>
                                <a href="{{ route('programs.all') }}" class="btn btn-hero-secondary">
                                    Our Programs
                                </a>
                            </div>
                        </div> <!-- End Indented Content -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- end of slide --}}

{{-- Who we are (Empowering Lives moved to Highlights section) --}}
<!-- <div class="bg-light"> ... moved below ... </div> -->
{{-- End of who we are --}}

{{-- Highlights (from provided design) --}}
<div class="uerd-soft-section uerd-section">
    <style>
        /* Highlights cards (matches provided screenshot) */
        .uerd-highlights-card {
            border-radius: 2.25rem;
        }
        .uerd-highlights-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
        }
        .uerd-highlights-underline {
            width: 72px;
            height: 5px;
            border-radius: 3px;
            background-color: var(--uerd-accent-strong);
        }
    </style>

    {{-- Removed bg-white from container to let card backgrounds show --}}
    <div class="container px-2">
        <div class="row g-4 d-flex align-items-stretch">
            {{-- 1. Empowering Lives (Dynamic) --}}
            <div class="col-lg-6 d-flex">
                <div class="bg-white p-5 shadow-sm w-100 d-flex flex-column h-100 uerd-highlights-card">
                    <div class="mb-4">
                        <div class="uerd-highlights-icon bg-success text-white shadow-sm">
                            <i class="fa-solid fa-seedling fs-4"></i>
                        </div>
                    </div>
                    @if(isset($empoweringLives))
                        <div class="mb-4">
                            <h2 class="fw-bold text-dark mb-3" style="font-size: 3rem; letter-spacing: -0.5px;">{{ $empoweringLives->title }}</h2>
                            <div class="uerd-highlights-underline"></div>
                        </div>
                        <div class="text-secondary mb-0 flex-grow-1" style="text-align: justify; font-size: 1.1rem; line-height: 1.75;">
                            {!! nl2br(e($empoweringLives->description)) !!}
                        </div>
                    @else
                        <div class="mb-4">
                            <h2 class="fw-bold text-dark mb-3" style="font-size: 3rem; letter-spacing: -0.5px;">Empowering Lives</h2>
                            <div class="uerd-highlights-underline"></div>
                        </div>
                        <p class="text-secondary flex-grow-1 mb-0" style="text-align: justify; font-size: 1.1rem; line-height: 1.75;">
                            Our organization has helped countless people overcome poverty and achieve their dreams through our various development programs.
                        </p>
                    @endif
                </div>
            </div>

            {{-- 2. Development & Sustainability (Dynamic) --}}
            <div class="col-lg-6 d-flex">
                <div class="bg-success text-white p-5 shadow-sm w-100 d-flex flex-column h-100 uerd-highlights-card">
                    <div class="mb-4">
                        <div class="uerd-highlights-icon" style="background-color: rgba(255,255,255,0.18);">
                            <i class="fa-solid fa-globe fs-4"></i>
                        </div>
                    </div>
                    @if(isset($devSustainability))
                        <div class="mb-4">
                            @php
                                $safeTitle = e($devSustainability->title);
                                $safeTitle = preg_replace('/(Sustainability)/i', '<span style="color: var(--accent-color);">$1</span>', $safeTitle);
                            @endphp
                            <h2 class="fw-bold mb-3" style="font-size: 3rem; letter-spacing: -0.5px;">{!! $safeTitle !!}</h2>
                            <div class="uerd-highlights-underline"></div>
                        </div>
                        <div class="text-white mb-0 flex-grow-1" style="text-align: justify; font-size: 1.1rem; line-height: 1.75; opacity: 0.9;">
                            {!! nl2br(e($devSustainability->description)) !!}
                        </div>
                    @else
                        <div class="mb-4">
                            <h2 class="fw-bold mb-3" style="font-size: 3rem; letter-spacing: -0.5px;">Development &amp; <span style="color: var(--accent-color);">Sustainability</span></h2>
                            <div class="uerd-highlights-underline"></div>
                        </div>
                        <p class="text-white mb-0 flex-grow-1" style="text-align: justify; font-size: 1.1rem; line-height: 1.75; opacity: 0.9;">
                            We believe that everyone deserves the opportunity to live a happy and fulfilling life, and we are committed to working with rural communities to create a better future for all.
                        </p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Buttons Section (Moved outside the card to a new row) --}}
        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('programs.all') }}" class="btn btn-success text-white d-inline-flex align-items-center gap-2 uerd-btn-pill" style="background-color: var(--primary-color); border: none;">
                    Our Programs <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="{{ route('invoked.career') }}" class="btn btn-outline-success d-inline-flex align-items-center uerd-btn-pill" style="border-width: 2px;">
                    Get Involved
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-success d-inline-flex align-items-center uerd-btn-pill" style="border-width: 2px;">
                    Contact Us
                </a>
            </div>
        </div>

    </div>
</div>
{{-- End Highlights --}}

{{-- Mission Vision--}}
@php
    $missionBg = isset($mission_vision) && !empty($mission_vision->background_image)
        ? asset('images/mission_vision/'.$mission_vision->background_image)
        : asset('img/slider/slider-2.jpg');
@endphp
<div class="py-5" style="background-image: url('{{ $missionBg }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
    <div style="background: rgba(0,0,0,0.55);">
    <div class="container px-2 py-4">
        <div class="row g-3 align-items-stretch" style="min-height: 320px;">
            <div class="col-md-4 col-12 mx-auto">
                <div class="h-100 p-3 rounded" style="background: rgba(255,255,255,0.10);">
                    <h3 class="text-center text-white"><span style="border-bottom:3px solid #e00324;">Mission</span> <i class="fa-solid fa-bullseye text-danger"></i></h3>
                    <p style="text-align: justify;" class="text-white mb-0">
                        {{ $mission_vision->mission ?? '' }}
                    </p>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="h-100 rounded" style="overflow:hidden; background: rgba(255,255,255,0.10);">
                    <img src="{{ asset('img/mission.jpg') }}" class="img-fluid" alt="Mission and Vision" style="width: 100%; height: 100%; min-height: 320px; object-fit: cover; object-position: center; display:block;">
                </div>
            </div>
            <div class="col-md-4 col-12 mx-auto">
                <div class="h-100 p-3 rounded" style="background: rgba(255,255,255,0.10);">
                    <h3 class="text-center text-white"><span style="border-bottom:3px solid #0073ff;">Vision</span> <i class="fa-solid fa-eye-low-vision text-primary"></i></h3>
                    <p style="text-align: justify;" class="text-white mb-0">
                        {{ $mission_vision->vision ?? '' }}
                    </p>
                </div>
            </div>
        </div>
        {{-- <hr class="py-3 m-0"> --}}
    </div>
    </div>
</div>
{{-- End of Mission Vision --}}

{{-- Featured Programs --}}
<div class="bg-light">
    <div class="container bg-white px-2">
        <div class="pt-5 pb-3">
            <h3 class="text-center"> Program <span class="text-danger">Highlights</span></h3>
            <p class="text-center text-secondary">Elevating Lives, Empowering Futures: UERD's Program Highlights brings transformative opportunities to communities in northern Bangladesh.</p>
        </div>

        <div class="row p-3">
            @if(isset($programs) && count($programs) > 0)
                @foreach($programs as $program)
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                    <a href="{{ route('programs.view', $program->id) }}">
                        <div class="featuredImage">
                            @if($program->image)
                            <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}">
                            @else
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $program->title }}">
                            @endif
                            <div class="overlay">
                                <p class="h4">{{ $program->title }}</p>
                                <p class="textmuted">{{ Str::limit($program->description, 150) }}</p>
                                @if($program->status)
                                <span class="badge badge-{{ $program->status == 'active' ? 'success' : ($program->status == 'completed' ? 'secondary' : 'info') }}">{{ ucfirst($program->status) }}</span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            @else
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                <a href="#">
                    <div class="featuredImage">
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        <div class="overlay">
                            <p class="h4">Women's Empowerment Initiative</p>
                            <p class="textmuted"> Promoting gender equality and empowerment through education, skill-building, and advocacy for women's rights.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                <a href="#">
                    <div class="featuredImage">
                        <img src="https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        <div class="overlay">
                            <p class="h4">Youth Development Project</p>
                            <p class="textmuted"> Empowering the next generation through mentorship, education, and community engagement to foster leadership.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                <a href="#">
                    <div class="featuredImage">
                        <img src="https://images.pexels.com/photos/4388165/pexels-photo-4388165.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        <div class="overlay">
                            <p class="h4">Healthcare Access Program</p>
                            <p class="textmuted">Providing essential healthcare services, awareness campaigns, and medical assistance to underserved communities in Bangladesh.</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>

        {{-- Removed 'View all Programs' button as requested --}}
        
    </div>
</div>
{{-- End of Featured Programs --}}

{{-- Ongoing Project --}}
<div class="uerd-soft-section uerd-section">
    <style>
        .uerd-ongoing-card {
            border-radius: 1.25rem;
            border: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }
        .uerd-ongoing-card.is-mint {
            background: linear-gradient(180deg, rgba(25, 135, 84, 0.10) 0%, rgba(255, 255, 255, 0.92) 70%);
        }
        .uerd-ongoing-card.is-sand {
            background: linear-gradient(180deg, rgba(240, 180, 41, 0.12) 0%, rgba(255, 255, 255, 0.92) 70%);
        }
        .uerd-ongoing-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
        }
        .uerd-ongoing-readmore {
            color: #198754;
            text-decoration: none;
            font-weight: 700;
        }
        .uerd-ongoing-readmore:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container px-2">
        <div class="pt-2 pb-3 text-center">
            <h3 class="text-center">Ongoing <span class="text-danger">Projects</span></h3>
            <p class="text-center text-secondary mb-0">UERD's ongoing projects actively address community needs, fostering sustainable development in northern Bangladesh.</p>
        </div>

        <div class="row g-4">
            @foreach ($project as $key => $item)
                @php($bgClass = $key % 2 === 0 ? 'is-mint' : 'is-sand')
                <div class="col-lg-4 col-md-6">
                    <div class="uerd-ongoing-card uerd-card-hover {{ $bgClass }} p-4 h-100 d-flex flex-column">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="uerd-ongoing-icon bg-success text-white shadow-sm">
                                <i class="fa-regular fa-folder-open"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-1" style="font-weight: 800; letter-spacing: -0.2px;">
                                    {{ Str::limit($item->project_name, 32, '...') }}
                                </h5>
                                <div class="small text-secondary" style="opacity: 0.9;">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ date('d/m/Y', strtotime($item->created_at ?? now())) }}
                                </div>
                            </div>
                        </div>

                        <div class="pt-3">
                            <p class="mb-0" style="color: #6c757d; line-height: 1.65;">
                                {{ Str::limit($item->objectives, 120, '...') }}
                            </p>
                        </div>

                        <div class="mt-auto pt-3">
                            <a href="{{ route('ongoing.project.view', $item->id) }}" class="uerd-ongoing-readmore d-inline-flex align-items-center gap-2">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center pt-5">
            <a href="{{ route('ongoing.project') }}" class="btn btn-outline-success uerd-btn-pill d-inline-flex align-items-center gap-2" style="border-width: 2px;">
                View All Projects <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

{{-- Sponsor --}}
<div class="bg-white uerd-section">
    <style>
        .uerd-sponsor-badge {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: var(--uerd-accent-strong);
            color: #fff;
            box-shadow: 0 12px 24px rgba(234, 153, 24, 0.28);
        }
        .uerd-sponsor-title {
            font-weight: 800;
            letter-spacing: -0.6px;
        }
        .uerd-sponsor-desc {
            max-width: 820px;
            margin: 0 auto;
            color: #6c757d;
            line-height: 1.8;
            font-size: 1.05rem;
        }
        .uerd-btn-orange {
            background-color: var(--uerd-accent-strong);
            border: none;
            color: #fff;
        }
        .uerd-btn-orange:hover {
            background-color: #d88912;
            color: #fff;
        }
    </style>

    <div class="container px-2">
        <div class="text-center">
            <div class="mb-4">
                <div class="uerd-sponsor-badge">
                    <i class="fa-regular fa-heart fs-4"></i>
                </div>
            </div>

            <h2 class="uerd-sponsor-title mb-3">Sponsor for a Growing Fund</h2>
            <p class="uerd-sponsor-desc mb-4">
                Sponsor UERD's growing fund to fuel impactful initiatives in northern Bangladesh. Your support drives essential programs in healthcare, education,
                and community resilience — making a lasting difference in lives.
            </p>

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('contact') }}" class="btn uerd-btn-pill uerd-btn-orange d-inline-flex align-items-center gap-2">
                    <i class="fa-regular fa-heart"></i> Become a Sponsor
                </a>
                <a href="{{ route('programs.all') }}" class="btn btn-outline-success uerd-btn-pill d-inline-flex align-items-center gap-2" style="border-width: 2px;">
                    Learn About Our Work <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
{{-- End of Sponsor --}}

{{-- Latest News and Events --}}
<div class="uerd-soft-section uerd-section">
    <style>
        .uerd-news-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: rgba(25, 135, 84, 0.12);
            color: var(--uerd-green);
            font-weight: 700;
            letter-spacing: 0.5px;
            font-size: 0.65rem;
            text-transform: uppercase;
        }
        .uerd-news-subtitle {
            max-width: 820px;
            margin: 0 auto;
            color: var(--uerd-muted);
            line-height: 1.7;
            font-size: 0.95rem;
        }
        .uerd-news-card {
            border-radius: 14px;
            background-color: #ffffff;
            border: 1px solid var(--uerd-card-border);
            box-shadow: var(--uerd-card-shadow);
        }

        .uerd-news-thumb {
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            background: rgba(16, 42, 67, 0.06);
            aspect-ratio: 16 / 9;
        }
        .uerd-news-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 260ms ease;
        }
        .uerd-news-card:hover .uerd-news-thumb img {
            transform: scale(1.04);
        }
        .uerd-news-badge {
            background-color: rgba(25, 135, 84, 0.10);
            color: var(--uerd-green);
            border: 1px solid rgba(25, 135, 84, 0.18);
            font-weight: 700;
        }
        .uerd-news-title {
            font-weight: 800;
            letter-spacing: -0.25px;
        }
        .uerd-news-link {
            color: var(--uerd-green);
            text-decoration: none;
            font-weight: 700;
        }
        .uerd-news-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container px-2">
        <div class="text-center mb-4">
            <div class="mb-2">
                <span class="uerd-news-pill">Stay informed</span>
            </div>
            <h2 class="uerd-sponsor-title mb-2">Latest News &amp; Events</h2>
            <p class="uerd-news-subtitle mb-0">
                The sole meaning of life is to serve humanity — stay connected with our latest stories and announcements.
            </p>
        </div>

        <div class="row g-4">
            @foreach ($news as $key => $data)
                <div class="col-lg-4 col-md-6">
                    <div class="uerd-news-card uerd-card-hover p-4 h-100 d-flex flex-column">
                        <div class="uerd-news-thumb mb-3">
                            <img
                                src="{{ !empty($data->image) ? asset('images/news/'.$data->image) : asset('img/mission.jpg') }}"
                                alt="{{ $data->title ?? 'News image' }}"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('img/mission.jpg') }}';"
                            >
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge rounded-pill uerd-news-badge">
                                {{ (property_exists($data, 'category') && !empty($data->category)) ? $data->category : 'News' }}
                            </span>
                            <div class="small text-secondary" style="white-space: nowrap;">
                                <i class="fa-regular fa-calendar"></i>
                                {{ date('d M Y', strtotime((property_exists($data, 'created_at') && !empty($data->created_at)) ? $data->created_at : now())) }}
                            </div>
                        </div>

                        <h5 class="uerd-news-title mb-2">{{ Str::limit($data->title ?? '', 55, '...') }}</h5>
                        <p class="mb-0" style="color: #6c757d; line-height: 1.65;">
                            {{ Str::limit(strip_tags($data->description ?? ''), 120, '...') }}
                        </p>

                        <div class="mt-auto pt-3">
                            <a href="{{ route('latest.news.view', $data->id) }}" class="uerd-news-link d-inline-flex align-items-center gap-2">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center pt-5">
            <a href="{{ route('latest.news.all') }}" class="btn btn-outline-success uerd-btn-pill d-inline-flex align-items-center gap-2" style="border-width: 2px;">
                View All News &amp; Events <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
{{-- End of Latest News and Events --}}


{{-- Volunteer part --}}
<div class="uerd-volunteer uerd-section" style="background-image: url('{{ asset('img/slider/slider-1.jpg') }}');">
    <style>
        .uerd-volunteer {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        .uerd-volunteer::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(234, 153, 24, 0.92) 0%, rgba(234, 153, 24, 0.78) 45%, rgba(234, 153, 24, 0.35) 100%);
        }
        .uerd-volunteer-inner {
            position: relative;
            z-index: 1;
        }
        .uerd-volunteer-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 999px;
            background-color: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.28);
            color: rgba(255, 255, 255, 0.95);
            font-weight: 800;
            letter-spacing: 0.6px;
            font-size: 0.7rem;
            text-transform: uppercase;
        }
        .uerd-volunteer-title {
            color: #fff;
            font-weight: 900;
            letter-spacing: -0.6px;
        }
        .uerd-volunteer-desc {
            color: rgba(255, 255, 255, 0.92);
            max-width: 560px;
            line-height: 1.7;
        }
        .uerd-volunteer-btn {
            background-color: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.35);
            color: #fff;
        }
        .uerd-volunteer-btn:hover {
            background-color: rgba(255, 255, 255, 0.28);
            color: #fff;
        }
    </style>

    <div class="uerd-volunteer-inner">
        <div class="container px-2">
            <div class="row align-items-center" style="min-height: 220px;">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <span class="uerd-volunteer-pill"><i class="fa-solid fa-people-group"></i> Join the cause</span>
                    </div>
                    <h2 class="uerd-volunteer-title mb-2">Become a Volunteer</h2>
                    <p class="uerd-volunteer-desc mb-4">
                        Support UERD's initiatives in northern Bangladesh by joining as a volunteer. Your time and skills help strengthen healthcare, education,
                        and community resilience.
                    </p>
                    <a href="{{ route('volunterr.opportunities') }}" class="btn uerd-btn-pill uerd-volunteer-btn d-inline-flex align-items-center gap-2">
                        Register Now <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of volunteer part --}}

{{-- Photo Gallery --}}
<div class="uerd-soft-section uerd-section">
    <style>
        .uerd-gallery-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: rgba(234, 153, 24, 0.14);
            color: #EA9918;
            font-weight: 800;
            letter-spacing: 0.5px;
            font-size: 0.65rem;
            text-transform: uppercase;
        }
        .uerd-gallery-subtitle {
            max-width: 820px;
            margin: 0 auto;
            color: #6c757d;
            line-height: 1.7;
            font-size: 0.95rem;
        }
        .uerd-gallery-card {
            border-radius: 16px;
            overflow: hidden;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06);
        }
        .uerd-gallery-cover {
            width: 100%;
            height: 210px;
            object-fit: cover;
            object-position: center;
            display: block;
        }
        .uerd-gallery-album-title {
            font-weight: 800;
            letter-spacing: -0.2px;
        }
        .uerd-gallery-meta {
            font-size: 12px;
            color: #6c757d;
        }
        .uerd-gallery-more {
            color: #198754;
            font-weight: 700;
            text-decoration: none;
        }
        .uerd-gallery-more:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container px-2">
        <div class="text-center mb-4">
            <div class="mb-2">
                <span class="uerd-gallery-pill">Photo gallery</span>
            </div>
            <h2 class="uerd-sponsor-title mb-2">Photo Gallery</h2>
            <p class="uerd-gallery-subtitle mb-0">
                Explore moments from UERD’s field activities, community programs, and events across northern Bangladesh.
            </p>
        </div>

        @if (!empty($hasMoreAlbums))
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('gallery.albums') }}" class="uerd-gallery-more d-inline-flex align-items-center gap-2">
                    Show more <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        @endif

        <div class="row g-4">
            @foreach (($albumsPreview ?? []) as $album)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('gallery.album', ['album' => $album->name]) }}" class="text-decoration-none text-dark">
                        <div class="uerd-gallery-card uerd-card-hover h-100">
                            <img src="{{ asset('images/gallery/'.($album->cover_image ?? '')) }}" class="uerd-gallery-cover" alt="{{ $album->name }}">
                            <div class="p-3">
                                <div class="d-flex align-items-start justify-content-between gap-3">
                                    <div class="uerd-gallery-album-title">{{ $album->name }}</div>
                                    <div class="uerd-gallery-meta" style="white-space: nowrap;">
                                        <i class="fa-regular fa-images"></i> {{ $album->photo_count }} Photos
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center pt-5">
            <a href="{{ route('photo.all') }}" class="btn btn-outline-success uerd-btn-pill d-inline-flex align-items-center gap-2" style="border-width: 2px;">
                All Photos <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
{{-- End of Photo Gallery --}}

{{-- Impact part --}}
<div class="uerd-impact uerd-section" style="background-color: var(--uerd-green);">
    <style>
        .uerd-impact-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: rgba(234, 153, 24, 0.16);
            color: #EA9918;
            font-weight: 800;
            letter-spacing: 0.5px;
            font-size: 0.65rem;
            text-transform: uppercase;
        }
        .uerd-impact-title {
            color: #ffffff;
            font-weight: 900;
            letter-spacing: -0.7px;
            line-height: 1.05;
        }
        .uerd-impact-underline {
            width: 72px;
            height: 5px;
            border-radius: 3px;
            background-color: #EA9918;
        }
        .uerd-impact-desc {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.75;
            max-width: 520px;
        }
        .uerd-impact-stat {
            border-radius: 14px;
            background-color: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
        }
        .uerd-impact-stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.14);
            border: 1px solid rgba(234, 153, 24, 0.35);
            color: #EA9918;
        }
        .uerd-impact-stat-value {
            color: #ffffff;
            font-weight: 900;
            letter-spacing: -0.4px;
            line-height: 1.1;
        }
        .uerd-impact-stat-label {
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.85rem;
        }
    </style>

    <div class="container px-2">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="mb-2">
                    <span class="uerd-impact-pill">Our impact</span>
                </div>
                <h2 class="uerd-impact-title mb-3">Over 25 Years of Changing Lives</h2>
                <div class="uerd-impact-underline mb-3"></div>
                <p class="uerd-impact-desc mb-0">
                    Transforming lives and communities in northern Bangladesh through sustainable development initiatives — empowering individuals and fostering
                    positive change. Join us in making a lasting difference for a brighter future.
                </p>
            </div>

            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="uerd-impact-stat p-4 text-center h-100">
                            <div class="mb-2">
                                <span class="uerd-impact-stat-icon"><i class="fa-regular fa-calendar-check"></i></span>
                            </div>
                            <div class="uerd-impact-stat-value" style="font-size: 1.9rem;">1998</div>
                            <div class="uerd-impact-stat-label">Founded</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="uerd-impact-stat p-4 text-center h-100">
                            <div class="mb-2">
                                <span class="uerd-impact-stat-icon"><i class="fa-solid fa-map-location-dot"></i></span>
                            </div>
                            <div class="uerd-impact-stat-value" style="font-size: 1.9rem;">03</div>
                            <div class="uerd-impact-stat-label">Districts</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="uerd-impact-stat p-4 text-center h-100">
                            <div class="mb-2">
                                <span class="uerd-impact-stat-icon"><i class="fa-solid fa-hands-holding-circle"></i></span>
                            </div>
                            <div class="uerd-impact-stat-value" style="font-size: 1.9rem;">41+</div>
                            <div class="uerd-impact-stat-label">Projects</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="uerd-impact-stat p-4 text-center h-100">
                            <div class="mb-2">
                                <span class="uerd-impact-stat-icon"><i class="fa-solid fa-users-viewfinder"></i></span>
                            </div>
                            <div class="uerd-impact-stat-value" style="font-size: 1.9rem;">1.3M+</div>
                            <div class="uerd-impact-stat-label">Lives Impacted</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Impact part --}}

<!-- Success Stories -->
<?php if (isset($stories) && count($stories) > 0): ?>
<div class="uerd-soft-section uerd-section">
    <style>
        .uerd-story-filter {
            border-radius: 999px;
            padding: 8px 14px;
            font-weight: 800;
            border: 1px solid rgba(0, 0, 0, 0.10);
            background: rgba(255, 255, 255, 0.70);
        }
        .uerd-story-filter.active {
            background-color: #198754 !important;
            border-color: #198754 !important;
            color: #ffffff !important;
        }
        .uerd-story-wrap {
            max-width: 920px;
            margin: 0 auto;
        }
        .uerd-story-card {
            background: #ffffff;
            border-radius: 22px;
            border: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.08);
            padding: 44px 28px;
        }

        .uerd-story-layout {
            display: flex;
            align-items: flex-start;
            gap: 22px;
            text-align: left;
        }
        .uerd-story-left {
            width: 170px;
            flex: 0 0 170px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .uerd-story-right {
            flex: 1 1 auto;
            min-width: 0;
        }
        .uerd-story-text {
            max-width: 100%;
            margin: 0;
            color: #6c757d;
            font-style: italic;
            line-height: 1.85;
            font-size: 1.05rem;
        }
        .uerd-story-avatar {
            width: 130px;
            height: 130px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #198754;
            color: #ffffff;
            font-weight: 900;
            font-size: 2.2rem;
        }
        .uerd-story-avatar-img {
            width: 130px;
            height: 130px;
            border-radius: 999px;
            object-fit: cover;
            object-position: center;
            display: block;
            border: 2px solid rgba(25, 135, 84, 0.25);
        }
        .uerd-story-name {
            font-weight: 900;
            letter-spacing: -0.2px;
        }
        .uerd-story-role {
            color: #6c757d;
            font-size: 0.9rem;
        }

        @@media (max-width: 575.98px) {
            .uerd-story-layout {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .uerd-story-left {
                width: auto;
                flex-basis: auto;
            }
            .uerd-story-right {
                width: 100%;
                text-align: center;
            }
            .uerd-story-text { text-align: center; }
        }
        /* Carousel controls & indicators to match screenshot */
        #testimonialCarousel .carousel-control-prev,
        #testimonialCarousel .carousel-control-next {
            width: auto;
            opacity: 1;
            top: auto;
            bottom: 26px;
            transform: none;
        }
        #testimonialCarousel .carousel-control-prev { left: calc(50% - 130px); }
        #testimonialCarousel .carousel-control-next { left: calc(50% + 92px); }
        .uerd-story-navbtn {
            width: 42px;
            height: 42px;
            border-radius: 999px;
            border: 1px solid rgba(0, 0, 0, 0.12);
            background: rgba(255, 255, 255, 0.85);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #198754;
        }
        #testimonialCarousel .carousel-control-prev-icon,
        #testimonialCarousel .carousel-control-next-icon {
            filter: none;
            width: 18px;
            height: 18px;
        }
        #testimonialCarousel .carousel-indicators {
            margin-bottom: 32px;
        }
        #testimonialCarousel .carousel-indicators [data-bs-target] {
            width: 6px;
            height: 6px;
            border-radius: 999px;
            border: 0;
            margin: 0 4px;
            background-color: rgba(0, 0, 0, 0.18);
            opacity: 1;
        }
        #testimonialCarousel .carousel-indicators .active {
            width: 18px;
            background-color: #198754;
        }
    </style>

    <div class="container px-2">
        <div class="text-center mb-4">
            <h2 class="uerd-sponsor-title mb-2">Success Stories</h2>
        </div>

        {{-- Rating Filter --}}
        <div class="text-center mb-4">
            <button class="btn uerd-story-filter me-2 filter-btn" data-rating="5">5 ★</button>
            <button class="btn uerd-story-filter me-2 filter-btn" data-rating="4">4 ★</button>
            <button class="btn uerd-story-filter me-2 filter-btn" data-rating="3">3 ★</button>
            <button class="btn uerd-story-filter me-2 filter-btn" data-rating="2">2 ★</button>
            <button class="btn uerd-story-filter me-2 filter-btn" data-rating="1">1 ★</button>
            <button class="btn uerd-story-filter filter-btn active" data-rating="0">All</button>
        </div>

        <div class="uerd-story-wrap">
            <!-- Success Stories Slider -->
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <?php if (count($stories) > 1): ?>
                    <div class="carousel-indicators">
                        <?php foreach ($stories as $i => $story): ?>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="<?php echo e($i); ?>" class="<?php echo e($i == 0 ? 'active' : ''); ?>" aria-current="<?php echo e($i == 0 ? 'true' : 'false'); ?>" aria-label="Slide <?php echo e($i + 1); ?>"></button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="carousel-inner">
                    <?php foreach ($stories as $index => $story): ?>
                        <?php $initial = strtoupper(mb_substr(trim($story->beneficiary_name ?? 'U'), 0, 1)); ?>
                        <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?> story-item" data-rating="<?php echo e($story->rating); ?>">
                            <div class="uerd-story-card uerd-card-hover">
                                <div class="uerd-story-layout">
                                    <div class="uerd-story-left">
                                        <div class="mb-3">
                                            <?php if (!empty($story->image)): ?>
                                                <img src="<?php echo e(asset('images/stories/'.$story->image)); ?>" class="uerd-story-avatar-img" alt="<?php echo e($story->beneficiary_name); ?>">
                                            <?php else: ?>
                                                <span class="uerd-story-avatar"><?php echo e($initial); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="uerd-story-name text-center"><?php echo e($story->beneficiary_name); ?></div>
                                        <div class="uerd-story-role text-center"><?php echo e($story->beneficiary_title); ?></div>
                                    </div>

                                    <div class="uerd-story-right">
                                        <div class="rating mb-3">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <?php if ($i <= $story->rating): ?>
                                                    <span class="text-warning fs-5">&#9733;</span>
                                                <?php else: ?>
                                                    <span class="text-muted fs-5">&#9733;</span>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>

                                        <p class="uerd-story-text mb-0"><?php echo e(Str::limit($story->description, 220)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if (count($stories) > 1): ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="uerd-story-navbtn" aria-hidden="true">
                            <span class="carousel-control-prev-icon"></span>
                        </span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="uerd-story-navbtn" aria-hidden="true">
                            <span class="carousel-control-next-icon"></span>
                        </span>
                        <span class="visually-hidden">Next</span>
                    </button>
                <?php endif; ?>
            </div>
        </div>
        <!-- End of Success Stories Slider -->
    </div>
</div>
<?php endif; ?>
<!-- End of Success Stories -->

<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const selectedRating = this.getAttribute('data-rating');

        // Update active button
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        // Filter stories (keep carousel active item valid)
        const items = Array.from(document.querySelectorAll('.story-item'));
        items.forEach(item => {
            const match = (selectedRating === '0') || (item.getAttribute('data-rating') === selectedRating);
            item.style.display = match ? '' : 'none';
            item.classList.remove('active');
        });

        const firstVisible = items.find(i => i.style.display !== 'none');
        if (firstVisible) {
            firstVisible.classList.add('active');
        }
    });
});
</script>

{{-- subscription part --}}
<div class="bg-light pb-5">
    <div class="container bg-white pb-5 rounded">
        <div class="py-5">
            <h3 class="text-center"><span class="text-danger">Stay</span> connected <span class="text-danger"> with us</span></h3>
            <p class="text-center text-secondary">Keep in touch with our activities throughout the world by subscribing to our e-newsletter.</p>
        </div>
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success w-75 mx-auto text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('user.subscribe') }}" method="post">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="w-75 mx-auto">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email" value="{{ old('email') }}">
                                 @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-block btn-danger my-2" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- end of subscription part --}}
@endsection

@push('js')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carouselEl = document.getElementById('carouselExampleIndicators');
        if (!carouselEl) return;

        let activeTimeouts = [];
        const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function clearTypingTimers() {
            activeTimeouts.forEach((t) => clearTimeout(t));
            activeTimeouts = [];
        }

        function typeInto(el, text, speed) {
            el.textContent = '';
            let i = 0;

            const tick = () => {
                if (i > text.length) return;
                el.textContent = text.slice(0, i);
                i += 1;
                activeTimeouts.push(setTimeout(tick, speed));
            };

            tick();
        }

        function runTypewriterForActiveSlide() {
            clearTypingTimers();

            const activeItem = carouselEl.querySelector('.carousel-item.active');
            if (!activeItem) return;

            const titleEl = activeItem.querySelector('.hero-title-text');
            const descEl = activeItem.querySelector('.hero-desc-text');

            const titleText = titleEl ? (titleEl.getAttribute('data-text') || titleEl.textContent || '') : '';
            const descText = descEl ? (descEl.getAttribute('data-text') || descEl.textContent || '') : '';

            if (prefersReducedMotion) {
                if (titleEl) titleEl.textContent = titleText;
                if (descEl) descEl.textContent = descText;
                return;
            }

            if (titleEl) {
                activeTimeouts.push(setTimeout(() => typeInto(titleEl, titleText, 28), 150));
            }
            if (descEl) {
                activeTimeouts.push(setTimeout(() => typeInto(descEl, descText, 14), 900));
            }
        }

        runTypewriterForActiveSlide();
        carouselEl.addEventListener('slid.bs.carousel', runTypewriterForActiveSlide);
    });
</script>

@endpush
