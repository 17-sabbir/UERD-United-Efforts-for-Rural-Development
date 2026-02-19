@extends('main')

@section('title')
United Efforts for Rural Development (UERD)
@endsection

@section('content')
{{-- slider --}}
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($slider as $skey => $slider)
        <div class="carousel-item @if($skey == 0) active @endif">
            <div style="position: relative; height: 85vh; overflow: hidden;">
                <img src="{{ asset('images/slider/'.$slider->image) }}" class="d-block w-100" alt="UERD" style="object-fit: cover; height: 100%; width: 100%;">
                
                {{-- Dark Overlay --}}
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>

                <div class="carousel-caption d-flex flex-column justify-content-center align-items-start h-100" style="position: absolute; top: 0; bottom: 0; left: 10%; right: 10%; text-align: left;">
                    <h2 class="text-white fw-bold typing-text" style="font-size: 3rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">{{ $slider->title }}</h2>
                    <div class="my-3" style="width:100px; border-bottom:5px solid #dc3545;"></div>
                    <p style="font-size:1.2rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.8);" class="text-white">
                        {{ $slider->description }}
                    </p>
                    <div>
                        <a href="{{ route('donate') }}" class="btn btn-warning fw-bold px-4 py-2 mt-3" style="box-shadow: 3px 3px 6px rgba(0,0,0,0.3);"><i class="fa-solid fa-sack-dollar"></i> Donate now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
{{-- end of slide --}}

{{-- Who we are (Empowering Lives moved to Highlights section) --}}
<!-- <div class="bg-light"> ... moved below ... </div> -->
{{-- End of who we are --}}

{{-- Highlights (from provided design) --}}
<div class="bg-light">
    {{-- Removed bg-white from container to let card backgrounds show --}}
    <div class="container px-2 py-5">
        <div class="row g-4 d-flex align-items-stretch">
            {{-- 1. Empowering Lives (Dynamic) --}}
            <div class="col-lg-6 d-flex">
                <div class="bg-white p-4 rounded shadow-sm w-100 d-flex flex-column h-100 position-relative border-start border-5 border-danger">
                    @if(isset($empoweringLives))
                        <div class="mb-4">
                            <h2 class="fw-bold text-dark mb-2" style="font-size: 2.2rem;">{{ $empoweringLives->title }}</h2>
                            {{-- Specific thick red underline --}}
                            <div style="width: 60px; height: 5px; background-color: #dc3545; border-radius: 2px;"></div>
                        </div>
                        <div class="text-secondary mb-4 flex-grow-1" style="text-align: justify; font-size: 1.05rem; line-height: 1.6;">
                            {!! nl2br(e($empoweringLives->description)) !!}
                        </div>
                    @else
                        <div class="mb-4">
                            <h2 class="fw-bold text-dark mb-2" style="font-size: 2.2rem;">Empowering Lives</h2>
                            <div style="width: 60px; height: 5px; background-color: #dc3545; border-radius: 2px;"></div>
                        </div>
                        <p class="text-secondary flex-grow-1" style="text-align: justify; font-size: 1.05rem; line-height: 1.6;">
                            Our organization has helped countless people overcome poverty and achieve their dreams through our various development programs.
                        </p>
                    @endif
                </div>
            </div>

            {{-- 2. Development & Sustainability (Dynamic) --}}
            <div class="col-lg-6 d-flex">
                <div class="bg-white p-4 rounded shadow-sm w-100 d-flex flex-column h-100 border-end border-5 border-dark">
                    @if(isset($devSustainability))
                        <div class="mb-4">
                             {{-- Parse title to check for '&' and style specifically if needed, otherwise just display --}}
                            <h2 class="fw-bold text-dark mb-2" style="font-size: 2.2rem;">
                                {!! str_replace('&', '<span class="text-danger">&</span>', $devSustainability->title) !!}
                                {{-- Simple trick: highlight the '&' symbol if present --}}
                            </h2>
                            <div style="width: 60px; height: 5px; background-color: #102a43; border-radius: 2px;"></div>
                        </div>
                        <div class="text-secondary flex-grow-1" style="text-align: justify; font-size: 1.05rem; line-height: 1.6;">
                            {!! nl2br(e($devSustainability->description)) !!}
                        </div>
                    @else
                        <div class="mb-4">
                            <h2 class="fw-bold text-dark mb-2" style="font-size: 2.2rem;">Development <span class="text-danger">&</span> sustainability</h2>
                            <div style="width: 60px; height: 5px; background-color: #102a43; border-radius: 2px;"></div>
                        </div>
                        <p class="text-secondary mb-0 flex-grow-1" style="text-align: justify; font-size: 1.05rem; line-height: 1.6;">
                            We believe that everyone deserves the opportunity to live a happy and fulfilling life, and we are committed to working with rural communities to create a better future for all.
                        </p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Buttons Section (Moved outside the card to a new row) --}}
        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('programs.all') }}" class="btn btn-danger fw-bold py-2 px-4 d-flex align-items-center" style="background-color: #e63935; border: none; border-radius: 6px; font-size: 1.1rem;">
                    <i class="fa-solid fa-hands-holding-child me-2 fs-4"></i> Programs
                </a>
                <a href="{{ route('invoked.career') }}" class="btn btn-dark fw-bold py-2 px-4 d-flex align-items-center" style="background-color: #102a43; border: none; border-radius: 6px; font-size: 1.1rem;">
                    <i class="fa-solid fa-share-nodes me-2 fs-4"></i> Get Involved
                </a>
                <a href="{{ route('contact') }}" class="btn btn-danger fw-bold py-2 px-4 d-flex align-items-center" style="background-color: #e63935; border: none; border-radius: 6px; font-size: 1.1rem;">
                        <i class="fa-solid fa-phone-volume me-2 fs-4"></i> Contact us
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
<div class="bg-light">
    <div class="container bg-white px-2">
        <div class="pt-3 pb-3">
            <h3 class="text-center">Ongoing <span class="text-danger">Projects</span></h3>
            <p class="text-center text-secondary">UERD's Ongoing Projects actively address community needs, fostering sustainable development in northern Bangladesh.</p>
        </div>

        {{-- card --}}
        <div class="row row-cols-1 row-cols-md-3 g-3">
            @foreach ($project as $key=>$project)
                <div class="col">
                    <div class="card shadow border-0">
                        @if(!empty($project->image))
                            <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top" alt="project" width="100%" height="200px">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ Str::limit($project->project_name, 15, '...') }}
                            </h4>
                            <p class="text-secondary" style="font-size: 12px;">
                                <i class="fas fa-calendar-minus"></i>
                                {{ date("d/m/Y", strtotime($project->created_at ?? now())) }}
                            </p>
                            <hr>
                            <p class="card-text py-1">
                                {{ Str::limit($project->objectives, 75, "...") }}
                            </p>
                            <a href="{{ route('ongoing.project.view',$project->id) }}" class="text-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center py-5">
            <a href="{{ route('ongoing.project') }}" class="btn btn-danger"> <i class="fa-solid fa-eye"></i> VIEW ALL PROJECTS</a>
        </div>
        {{-- card --}}

    </div>
</div>

{{-- Sponsor --}}
<div style="background-image: url('{{asset('img/slider/slider-1.jpg')}}');border-top:5px solid rgb(255, 0, 68);border-bottom:5px solid rgb(255, 0, 68);">
    <div class="container py-5">
        <h4 class="text-uppercasse text-white text-center"><span class="text-danger">Sponsor</span> for Growing Fund</h4>
        <div class="d-flex justify-content-center">
            <p class="text-white text-center py-3">
            Sponsor UERD's growing fund to fuel impactful initiatives in northern Bangladesh, empowering communities and fostering positive change. Your support drives essential programs in healthcare, education, and community resilience, making a lasting difference in the lives of those in need. Join us in our mission to create a brighter future for all.
        </p>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('contact') }}" class="btn btn-danger fw-blod"><i class="fa-solid fa-hand-holding-dollar"></i> Become a Sponsor</a>
        </div>

    </div>
</div>
{{-- End of Sponsor --}}

{{-- Latest News and Events --}}
<div class="bg-light">
    <div class="container bg-white pt-5">
        <div class="py-3">
            <h3 class="text-center">Latest News<span class="text-danger"> & Events</span></h3>
            <p class="text-center text-secondary">The sole meaning of life is to serve humanity</p>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($news as $key=>$data)
                <div class="col">
                    <div class="card border-0 shadow">
                        <img src="{{ asset('images/news/'.$data->image) }}" class="card-img-top" alt="activity" width="100%" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($data->title, 30 , '...') }}</h5>
                            <p class="text-secondary" style="font-size: 12px;">
                                <i class="fas fa-calendar-minus"></i>
                                {{ date("d/m/Y  h:i:s a") }}
                            </p>
                            <p class="card-text py-3">
                                {{ Str::limit($data->description, 75, '...') }}
                            </p>
                            <a href="{{ route('latest.news.view',$data->id) }}" class="text-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center py-5">
            <a href="{{ route('latest.news.all') }}" class="btn btn-danger"><i class="fa-solid fa-eye"></i> View all News & Events</a>
        </div>
    </div>
</div>
{{-- End of Latest News and Events --}}


{{-- Volunteer part --}}
<div style=" background-image: url('{{asset('img/slider/slider-1.jpg')}}');background-attachment:fixed;">
    <div class="container">
        <div class="row p-5">
            <div class="col-md-12">
                <h4 class="text-uppercasse text-white text-center"><span class="text-danger">Become</span> a Volunteer</h4>
                <p class="text-white py-2 text-center">
                    Sponsor UERD's growing fund to fuel impactful initiatives in northern Bangladesh, empowering communities and fostering positive change. Your support drives essential programs in healthcare, education, and community resilience, making a lasting difference in the lives of those in need. Join us in our mission to create a brighter future for all.
                </p>
                <div class="text-center">
                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-user-plus"></i> Registration</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of volunteer part --}}

{{-- Photo Gallery --}}
<div class="bg-light">
    <div class="container bg-white">
        <div class="pt-5 pb-2">
            <h3 class="text-center">Photo <span class="text-danger">Gallery</span></h3>
            <p class="text-center text-secondary">Stay updated with UERD’s latest news and events, offering insights into our impactful initiatives and community engagements.</p>
            @if (!empty($hasMoreAlbums))
                <div class="d-flex justify-content-end">
                    <a href="{{ route('gallery.albums') }}" class="text-decoration-none">Show more</a>
                </div>
            @endif
        </div>

        {{-- albums --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach (($albumsPreview ?? []) as $album)
                <div class="col">
                    <a href="{{ route('gallery.album', ['album' => $album->name]) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="{{ asset('images/gallery/'.($album->cover_image ?? '')) }}" class="card-img-top" alt="{{ $album->name }}">
                            <div class="card-body py-2">
                                <div class="fw-semibold">{{ $album->name }}</div>
                                <div class="text-secondary" style="font-size: 12px;">{{ $album->photo_count }} Photos</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{-- button --}}
        <div class="d-flex justify-content-center py-5">
            <a href="{{ route('photo.all') }}" class="btn btn-danger"><i class="fa-solid fa-eye"></i> All Photos</a>
        </div>
    </div>
</div>
{{-- End of Photo Gallery --}}

{{-- Impact part --}}
<div style="background-image: url('{{asset('img/map.png')}}'); background-attachment:fixed;">
    <div class="container">
        <div class="p-5">
            <h4 class="text-uppercasse text-white text-center"><span class="text-danger">Our</span> Impact</h4>
            <div class="row justify-content-sm-center">
                <div class="col-md-6">
                    <p class="text-white py-2 text-center">
                        Transforming lives and communities in northern Bangladesh through sustainable development initiatives, empowering individuals and fostering positive change. Join us in making a lasting difference for a brighter future.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                {{-- Year --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-regular fa-calendar-check text-secondary pt-3"></i>
                    <h6>Year</h6>
                    <h2 class="text-danger fw-bold">1998</h2>
                </div>
                {{-- District --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-solid fa-map-location-dot text-secondary pt-3"></i>
                    <h6>District</h6>
                    <h2 class="text-danger fw-bold">03</h2>
                </div>
                {{-- Project --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-solid fa-hands-holding-circle text-secondary pt-3"></i>
                    <h6>Project</h6>
                    <h2 class="text-danger fw-bold">41</h2>
                </div>
                {{-- People --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-solid fa-users-viewfinder text-secondary pt-3"></i>
                    <h6>People</h6>
                    <h2 class="text-danger fw-bold">1.3M</h2>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- End of Impact part --}}

{{-- Success Stories --}}
@if(isset($stories) && count($stories) > 0)
<div class="bg-light pb-5" style=" background-image: url('{{asset('img/testimonial_back.jpg')}}');">
    <div class="container">
        <div class="py-5">
            <h3 class="text-center text-white">Success Stories</h3>
        </div>

        {{-- Rating Filter --}}
        <div class="text-center mb-4">
            <button class="btn btn-light me-2 filter-btn" data-rating="5">5 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="4">4 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="3">3 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="2">2 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="1">1 Star</button>
            <button class="btn btn-light filter-btn active" data-rating="0">All</button>
        </div>

        {{-- Success Stories Slider --}}
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($stories as $index => $story)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }} story-item" data-rating="{{ $story->rating }}">
                    <div class="text-center px-3">
                        <div class="rating mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $story->rating)
                                    <span class="text-warning fs-4">&#9733;</span>
                                @else
                                    <span class="text-white fs-4">&#9734;</span>
                                @endif
                            @endfor
                        </div>
                        <p class="text-white mt-3 mb-4 px-2" style="font-style: italic; font-size: 1.1rem; word-wrap: break-word; overflow-wrap: break-word;">"{{ Str::limit($story->description, 200) }}"</p>
                        <img src="{{ asset('images/stories/'.$story->image) }}" class="img-fluid rounded-circle border" alt="{{ $story->beneficiary_name }}" width="100" height="100">
                        <h5 class="mt-3 text-white mb-0">{{ $story->beneficiary_name }}</h5>
                        <p class="text-muted" style="color: #ddd !important;">{{ $story->beneficiary_title }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Carousel Controls -->
            @if(count($stories) > 1)
            <button class="carousel-control-prev text-dark" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
        {{-- End of Success Stories Slider --}}
    </div>
</div>
{{-- End of Success Stories --}}

<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const selectedRating = this.getAttribute('data-rating');

        // Update active button
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        // Filter stories
        const stories = document.querySelectorAll('.story-item');
        stories.forEach(story => {
            if (selectedRating === '0') {
                story.style.display = 'block';
            } else {
                story.style.display = story.getAttribute('data-rating') === selectedRating ? 'block' : 'none';
            }
        });
    });
});
</script>
@endif

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

@endpush
