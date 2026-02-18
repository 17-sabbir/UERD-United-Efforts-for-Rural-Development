<div style="border-bottom:5px solid #F0B429; position: relative; z-index: 1000;">
    <style>
        @media (min-width: 992px) and (max-width: 1399.98px) {
            .navbar .navbar-nav { column-gap: 4px !important; }
            .navbar .navbar-nav .nav-link { padding-left: .5rem; padding-right: .5rem; }
            .navbar .navbar-brand span { font-size: 17px !important; }
        }
    </style>
    <div class="container-fluid px-2 px-lg-3">
        <nav class="navbar navbar-expand-xl navbar-light bg-white py-2 py-lg-3" style="position: static;">
        <div class="container-fluid px-0">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="gap: 0; padding: 0;">
                <img src="{{ asset('images/application/UERD logo.jpg') }}" alt="UERD logo" id="logo" style="height: 68px; width: auto; display: block; object-fit: contain; margin-right: -10px;">
                <span class="fw-bold text-dark" style="font-size: 19px; line-height: 1.15;">United Efforts for Rural Development</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse align-items-lg-center" id="navbarNav">
                <ul class="navbar-nav ms-lg-5" style="column-gap: 6px;">
                    <!-- Home -->
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link fw-bold text-dark">Home</a></li>
                <!-- About us -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    About us
                </a>
                <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                    <li><a class="dropdown-item" href="{{ route('about.us') }}">About ERA</a></li>
                    <li><a class="dropdown-item" href="{{ route('vision.mission') }}">Mission & Vision</a></li>
                    <li><a class="dropdown-item" href="{{ route('key.focus.area') }}">Focus Area</a></li>
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
                    <li><a class="dropdown-item" href="{{ route('programs.all') }}">Program Highlights</a></li>
                    <li><a class="dropdown-item" href="{{ route('key.focus.area') }}">Key Focus Area</a></li>
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
                    <li><a class="dropdown-item" href="{{ route('invoked.career') }}">Career with ERA</a></li>
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
                    <li><a class="dropdown-item" href="{{ route('strategic.plan') }}">ERA Strategic Plan</a></li>
                    <li><a class="dropdown-item" href="{{ route('policy.guideline') }}">Policy & Guideline</a></li>
                    <li><a class="dropdown-item" href="{{ route('publication') }}">Publication</a></li>
                </ul>
                </li>

                    <!-- Contact -->
                    <li class="nav-item fw-bold"><a href="{{ route('contact') }}" class="nav-link text-dark">Contact</a></li>
                    <li class="nav-item fw-bold ms-lg-auto ps-lg-2"><a href="{{ route('donate') }}" class="btn btn-primary btn-sm text-white px-3">Donate</a></li>
                </ul>
            </div>
        </div>
    </nav>


  </div>
</div>


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
