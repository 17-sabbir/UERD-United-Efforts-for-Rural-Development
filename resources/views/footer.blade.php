{{-- Footer started --}}
<div class="uerd-footer" style="border-top: 1px solid rgba(240, 180, 41, 0.28);">
    <style>
        .uerd-footer {
            background: linear-gradient(90deg, #221711 0%, #160f0b 55%, #120c09 100%);
        }
        .uerd-footer a { color: rgba(255, 255, 255, 0.82); }
        .uerd-footer a:hover { color: #ffffff; }
        .uerd-footer-heading {
            color: #ffffff;
            font-weight: 800;
            letter-spacing: -0.3px;
            margin-bottom: 18px;
        }
        .uerd-footer-link {
            display: inline-flex;
            padding: 6px 0;
            text-decoration: none;
        }
        .uerd-footer-muted { color: rgba(255, 255, 255, 0.72); }
        .uerd-footer-brand {
            display: inline-flex;
            align-items: center;
            gap: 14px;
        }
        .uerd-footer-logo {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background-color: #198754;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 900;
            font-size: 22px;
        }
        .uerd-footer-social {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.10);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.78);
        }
        .uerd-footer-social:hover {
            background-color: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }
        .uerd-footer-contact {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 7px 0;
            color: rgba(255, 255, 255, 0.78);
        }
        .uerd-footer-contact i { color: #198754; }
        .uerd-footer-ul { list-style: none; padding: 0; margin: 0; }
        .uerd-footer-bottom {
            background: rgba(0, 0, 0, 0.20);
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }
    </style>

    <div class="container px-2 py-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="uerd-footer-brand mb-3">
                    <div class="uerd-footer-logo">U</div>
                    <div>
                        <div class="fw-bold" style="color:#fff; font-size: 1.25rem; line-height: 1.1;">UERD</div>
                        <div class="uerd-footer-muted" style="line-height: 1.2;">Rural Development</div>
                    </div>
                </div>

                <p class="uerd-footer-muted mb-4" style="max-width: 360px; line-height: 1.8;">
                    United Efforts for Rural Development — empowering communities in northern Bangladesh since 1998.
                </p>

                <div class="d-flex gap-2">
                    <a class="uerd-footer-social" href="{{ application()->facebook }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a class="uerd-footer-social" href="{{ application()->twitter }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a class="uerd-footer-social" href="{{ application()->youtube }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a class="uerd-footer-social" href="{{ application()->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <div class="uerd-footer-heading">Quick Links</div>
                <ul class="uerd-footer-ul">
                    <li><a class="uerd-footer-link" href="{{ url('/') }}">Home</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('frontend.profile') }}">About Us</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('programs.all') }}">Programs</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('ongoing.project') }}">Projects</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('latest.news.all') }}">News &amp; Events</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('gallery.albums') }}">Gallery</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="uerd-footer-heading">Our Programs</div>
                <ul class="uerd-footer-ul">
                    <li><a class="uerd-footer-link" href="{{ route('programs.all') }}">Women's Empowerment</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('programs.all') }}">Youth Development</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('programs.all') }}">Healthcare Access</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('programs.all') }}">Agricultural Skills</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('programs.all') }}">Education Support</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('programs.all') }}">Micro Finance</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="uerd-footer-heading">Contact Us</div>
                <div class="uerd-footer-contact">
                    <div><i class="fa-solid fa-location-dot"></i></div>
                    <div>Head Office: Milon Bazar, Post Office: Charnarchar, Upazila: Derai, District: Sunamganj.</div>
                </div>
                <div class="uerd-footer-contact">
                    <div><i class="fa-solid fa-phone"></i></div>
                    <div>01720-566027</div>
                </div>
                <div class="uerd-footer-contact">
                    <div><i class="fa-regular fa-envelope"></i></div>
                    <div>uerd5678@gmail.com, rabicoming2009@yahoo.com</div>
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
<div class="uerd-footer-bottom p-3">
    <div class="container text-white d-flex flex-column flex-md-row justify-content-between gap-2">
        <small>Copyright © {{ date('Y') }} || All right reserved by <abbr title="United Efforts for Rural Development">UERD</abbr></small>
        <small>Developed By: <span title="Noakhali Science and Technology University">NSTU</span> Software Development Team</small>
    </div>
</div>
