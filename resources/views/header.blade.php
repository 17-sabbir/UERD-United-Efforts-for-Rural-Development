<header id="site-header" class="site-header fixed-top" style="border-bottom:5px solid #F0B429; z-index: 1000; transition: all 0.3s ease;">
    <style>
        @media (min-width: 992px) and (max-width: 1399.98px) {
            .navbar .navbar-nav { column-gap: 4px !important; }
            .navbar .navbar-nav .nav-link { padding-left: .5rem; padding-right: .5rem; }
            .navbar .navbar-brand span { font-size: 17px !important; }
        }
        
        /* Home Page Header Styles */
        body.is-home .site-header {
            background-color: transparent;
            border-bottom: none !important;
        }
        
        body.is-home .site-header .navbar {
            background-color: transparent !important;
            backdrop-filter: none !important;
            border-bottom: none !important;
        }

        body.is-home .site-header .nav-link,
        body.is-home .site-header .navbar-brand span {
            color: #ffffff !important;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }

        body.is-home.scrolled .site-header {
            background-color: #ffffff;
            border-bottom: 5px solid #F0B429 !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        body.is-home.scrolled .site-header .navbar {
             background-color: #ffffff !important;
        }

        body.is-home.scrolled .site-header .nav-link, 
        body.is-home.scrolled .site-header .navbar-brand * {
            color: #212529 !important; /* text-dark */
            text-shadow: none;
        }
        
        /* Logo Styles */
        .brand-logo-container {
            width: 50px;
            height: 50px;
            background-color: #198754; /* Green background like screenshot */
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .brand-logo-img {
            max-width: 35px;
            max-height: 35px;
            object-fit: contain;
        }
        
        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        
        .brand-title {
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: -0.5px;
        }
        
        .brand-subtitle {
            font-size: 0.85rem;
            opacity: 0.9;
            font-weight: 400;
        }
        
        /* Ensure normal pages keep default look */
        body:not(.is-home) .site-header {
            position: relative;
        }
    </style>
    <div class="container-fluid px-2 px-lg-3">
        <nav class="navbar navbar-expand-xl navbar-light py-2 py-lg-3" style="position: static;">
        <div class="container-fluid px-0">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="gap: 0; padding: 0;">
                <div class="brand-logo-container">
                    {{-- User requested logo inside the U shape/container --}}
                    <img src="{{ asset('images/application/UERD logo.jpg') }}" alt="UERD" class="brand-logo-img" style="border-radius: 50%;"> 
                </div>
                <div class="brand-text">
                    <span class="brand-title">UERD</span>
                    <span class="brand-subtitle">Rural Development</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse align-items-lg-center" id="navbarNav">
                <ul class="navbar-nav mx-auto" style="column-gap: 20px;">
                    <!-- Home -->
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link fw-bold text-dark">Home</a></li>
                <!-- About us -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About us
                    </a>
                <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                    <li><a class="dropdown-item" href="{{ route('frontend.profile') }}">Organization Profile</a></li>
                    {{-- <li><a class="dropdown-item" href="{{ route('key.focus.area') }}">Focus Area</a></li> --}}
                    <li><a class="dropdown-item" href="{{ route('team.members') }}">Team Members</a></li>
                    <li><a class="dropdown-item" href="{{ route('origin_affilation') }}">Origin and Legal Affiliation</a></li>
                    <li><a class="dropdown-item" href="{{ route('executive.committee') }}">Executive Committee</a></li>
                    <li><a class="dropdown-item" href="{{ route('cheif.message') }}">Message from Chief Executive</a></li>
                    <li><a class="dropdown-item" href="{{ route('partner.donor') }}">Our Partners and Donor</a></li>
                    <li><a class="dropdown-item" href="{{ route('about.impact') }}">Impact</a></li>
                </ul>
                </li>

                <!-- Programs -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="programsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Programs
                </a>
                <ul class="dropdown-menu" aria-labelledby="programsDropdown">
                    <li><a class="dropdown-item" href="{{ route('frontend.projects') }}">Our Projects</a></li>
                    <li><a class="dropdown-item" href="{{ route('programs.all') }}">Program Highlights</a></li>
                    {{-- <li><a class="dropdown-item" href="{{ route('key.focus.area') }}">Key Focus Area</a></li> --}}
                    <li><a class="dropdown-item" href="{{ route('ongoing.project') }}">Ongoing Programs</a></li>
                    <li><a class="dropdown-item" href="{{ route('project.archieve') }}">Project Archieve</a></li>
                    <li><a class="dropdown-item" href="{{ route('success.stories') }}">Success Stories</a></li>
                </ul>
                </li>

                <!-- Get Involved -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="involvedDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Get Involved
                </a>
                <ul class="dropdown-menu" aria-labelledby="involvedDropdown">
                    <li><a class="dropdown-item" href="{{ route('volunterr.opportunities') }}">Volunteer Opportunities</a></li>
                    <li><a class="dropdown-item" href="{{ route('donate') }}">Donate</a></li>
                    <li><a class="dropdown-item" href="{{ route('fundraising') }}">Fundraising Campaign</a></li>
                    <li><a class="dropdown-item" href="{{ route('corporate.partnership') }}">Corporate Partnership</a></li>
                    <li><a class="dropdown-item" href="{{ route('invoked.career') }}">Career with UERD</a></li>
                </ul>
                </li>

                <!-- News & Events -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="eventsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    News & Events
                </a>
                <ul class="dropdown-menu" aria-labelledby="eventsDropdown">
                    <li><a class="dropdown-item" href="{{ route('latest.news.all') }}">News & Events</a></li>
                    <li><a class="dropdown-item" href="{{ route('events.calender') }}">Events Calender</a></li>
                    <li><a class="dropdown-item" href="{{ route('youtube.video') }}">Youtube Video</a></li>
                    <li><a class="dropdown-item" href="{{ route('strategic.plan') }}">UERD Strategic Plan</a></li>
                    <li><a class="dropdown-item" href="{{ route('policy.guideline') }}">Policy & Guideline</a></li>
                    <li><a class="dropdown-item" href="{{ route('publication') }}">Publication</a></li>
                </ul>
                </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center" style="column-gap: 20px;">
                    <!-- Contact -->
                    <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link text-dark" style="font-weight: 500; font-size: 1.05rem;">Contact</a></li>
                    <li class="nav-item"><a href="{{ route('donate') }}" class="btn d-inline-flex align-items-center justify-content-center gap-2 text-white" style="border-radius: 50px; background-color: #EA9918; border: none; padding: 10px 30px; font-weight: 600; font-size: 1.05rem; box-shadow: none;"><i class="fa-regular fa-heart"></i> Donate</a></li>
                </ul>
            </div>
        </div>
    </nav>


  </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        // Header Scroll Effect for Home Page
        if(document.body.classList.contains('is-home')){
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    document.body.classList.add('scrolled');
                } else {
                    document.body.classList.remove('scrolled');
                }
            });
            // Initial check
            if (window.scrollY > 50) {
                document.body.classList.add('scrolled');
            }
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function(){
    // make it as accordion for smaller screens
    if (window.innerWidth >= 1200) {
        document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
            everyitem.addEventListener('mouseover', function(e){
                let el_link = this.querySelector('a[data-bs-toggle]');
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }
            });
            everyitem.addEventListener('mouseleave', function(e){
                let el_link = this.querySelector('a[data-bs-toggle]');

                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }
            })
        });
        }
    });
</script>

</header>
