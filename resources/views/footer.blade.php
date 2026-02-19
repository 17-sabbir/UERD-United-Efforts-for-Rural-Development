{{-- Footer started --}}
<div class="bg-dark" style="border-top:5px solid #F0B429;">
    <div class="container pt-3 pb-3">
        <div class="row" id="footer_link_wrapper">
            {{-- logo and short description --}}
            <div class="col-md-4 d-flex align-items-start mb-4 mb-md-0">
                <div>
                    <div style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; background: #fff;">
                        <img src="{{ asset('images/application/UERD logo.jpg') }}" alt="UERD logo" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                    </div>
                    <p class="mt-3 mb-0 text-white" style="font-size: 14px; line-height: 1.7; text-align: justify;">
                        UERD is a women-led organization working in northern Bangladesh since 1999. UERD is registered (No. 2443) with the NGO Affairs Bureau (NGOAB) of the Prime Minister’s Office, Government of the People’s Republic of Bangladesh.
                    </p>
                </div>
            </div>

            {{-- link and address --}}
            <div class="col-md-8 mt-4 mt-md-0 text-white">
                <div class="row">
                    <div class="col-md-3 py-2">
                        <h5 class="pb-3">Who we are</h5>
                        <ul class="p-0 m-0" style="font-size: 14px;">
                            <li class="py-1"><a class="dropdown-item" href="{{ route('frontend.profile') }}">Organization Profile</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('origin_affilation') }}">Origin and legal Affiliation</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('partner.donor') }}">Our Partners and Donor</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 py-2">
                        <h5 class="pb-3">What we do</h5>
                        <ul class="p-0 m-0" style="font-size: 14px;">
                            <li class="py-1"><a class="dropdown-item" href="{{ route('ongoing.project') }}">Ongoing Project</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('project.archieve') }}">Project Archieve</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('programs.all') }}">Programs</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 py-2">
                        <h5 class="pb-3">HELP</h5>
                        <ul class="p-0 m-0" style="font-size: 14px;">
                            <li class="py-1"><a href="{{ route('faq') }}" class="text-white">FAQ</a></li>
                            <li class="py-1"><a href="{{ route('donate') }}" class="text-white">Donate</a></li>
                            <li class="py-1"><a href="{{ route('policy.guideline') }}" class="text-white">Policy & Guideline</a></li>
                            {{-- <li class="py-1"><a href="#" class="text-white">Terms & Condtions</a></li> --}}
                            <li class="py-1"><a href="{{ route('volunterr.opportunities') }}" class="text-white">Volunteer Opportunities</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 py-2">
                        <h5 class="pb-3">Contact Us</h5>
                        <div style="font-size: 14px;">
                            <div class="d-flex align-items-start py-2">
                                <div class="me-2"><i class="fa-solid fa-location-dot"></i></div>
                                <div>
                                    Head Office: Milon Bazar,<br>
                                    Post Office: Charnarchar,<br>
                                    Upazila: Derai,<br>
                                    District: Sunamganj.
                                </div>
                            </div>
                            <div class="d-flex align-items-start py-2">
                                <div class="me-2"><i class="fa-regular fa-envelope"></i></div>
                                <div>uerd5678@gmail.com, rabicoming2009@yahoo.com</div>
                            </div>
                            <div class="d-flex align-items-start py-2">
                                <div class="me-2"><i class="fa-solid fa-phone"></i></div>
                                <div>01720-566027</div>
                            </div>
                            <a href="{{ route('contact') }}" class="btn btn-light btn-sm mt-2 px-3">Get in touch</a>
                        </div>
                        <div>
                            <ul class="d-flex mt-3 mb-0">
                                <li class="me-2">
                                <a href="{{ application()->facebook }}" target="blank"><i class="fa-brands fa-facebook-f px-1 text-white"></i></a>
                                </li class="mx-2">
                                <li>
                                <a href="{{ application()->twitter }}" target="blank"><i class="fa-brands fa-twitter px-1 text-white"></i></a>
                                </li>
                                <li class="mx-2">
                                <a href="{{ application()->instagram }}" target="blank"><i class="fa-brands fa-instagram px-1 text-white"></i></a>
                                </li>
                                <li class="">
                                <a href="{{ application()->youtube }}" target="blank"><i class="fa-brands fa-youtube px-1 text-white"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-end">
    <a href="#" class="btn btn-primary shadow back-to-top">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </a>
</div>

{{-- copyright --}}
<div class="p-3" style="background: #0A2540;">
    <div class="container text-white d-flex justify-content-between">
       <small> Copyright © {{ date('Y') }} || All right reserved by <abbr title="United Efforts for Rural Development">UERD</abbr></small>
       <small> Developed By: <span title="Noakhali Science and Technology University">NSTU</span> Software Development Team</small>
    </div>
</div>
