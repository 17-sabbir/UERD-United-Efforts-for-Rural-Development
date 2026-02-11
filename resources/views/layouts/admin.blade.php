<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('images/application/'.application()->fav_icon) }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/header-colors.css') }}" />
    <style>
        /* Colorful & Interactive Professional Sidebar */
        .sidebar-wrapper .metismenu {
            padding: 10px;
        }

        .sidebar-wrapper .metismenu a {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            border-radius: 12px;
            margin-bottom: 5px;
            border: 1px solid transparent;
            font-weight: 500;
        }

        /* Hover & Active States with "Glass" effect */
        .sidebar-wrapper .metismenu a:hover,
        .sidebar-wrapper .metismenu .mm-active > a {
            background: linear-gradient(90deg, #f0f4ff 0%, #ffffff 100%);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transform: translateX(5px);
            padding-left: 15px;
        }

        /* Colorful Icons & Text Cycling */
        /* Group 1: Blue */
        #menu > li:nth-child(4n+1) > a:hover, 
        #menu > li:nth-child(4n+1).mm-active > a { 
            color: #0d6efd; 
            border-left: 5px solid #0d6efd;
        }
        #menu > li:nth-child(4n+1) > a:hover .parent-icon,
        #menu > li:nth-child(4n+1).mm-active > a .parent-icon { color: #0d6efd; }

        /* Group 2: Purple */
        #menu > li:nth-child(4n+2) > a:hover, 
        #menu > li:nth-child(4n+2).mm-active > a { 
            color: #6f42c1; 
            border-left: 5px solid #6f42c1;
        }
        #menu > li:nth-child(4n+2) > a:hover .parent-icon,
        #menu > li:nth-child(4n+2).mm-active > a .parent-icon { color: #6f42c1; }

        /* Group 3: Teal/Green */
        #menu > li:nth-child(4n+3) > a:hover, 
        #menu > li:nth-child(4n+3).mm-active > a { 
            color: #20c997; 
            border-left: 5px solid #20c997;
        }
        #menu > li:nth-child(4n+3) > a:hover .parent-icon,
        #menu > li:nth-child(4n+3).mm-active > a .parent-icon { color: #20c997; }

        /* Group 4: Orange/Pink */
        #menu > li:nth-child(4n+4) > a:hover, 
        #menu > li:nth-child(4n+4).mm-active > a { 
            color: #fd7e14; 
            border-left: 5px solid #fd7e14;
        }
        #menu > li:nth-child(4n+4) > a:hover .parent-icon,
        #menu > li:nth-child(4n+4).mm-active > a .parent-icon { color: #fd7e14; }

        /* Icon Animation */
        .sidebar-wrapper .metismenu .parent-icon {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .sidebar-wrapper .metismenu a:hover .parent-icon,
        .sidebar-wrapper .metismenu .mm-active > a .parent-icon {
            transform: scale(1.2);
        }

        /* Submenu Styling - Enhanced */
        .sidebar-wrapper .metismenu ul {
            padding: 5px 0 5px 25px; /* Indent submenus */
            background: transparent;
        }

        .sidebar-wrapper .metismenu ul a {
            padding: 8px 15px 8px 10px;
            font-size: 0.92em;
            margin: 2px 0;
            border-radius: 8px; /* Softer rounded corners */
            color: #6c757d;    /* Muted default text */
            display: flex;
            align-items: center;
            border: 1px solid transparent;
        }
        
        .sidebar-wrapper .metismenu ul a i {
            font-size: 12px;
            margin-right: 12px;
            opacity: 0.7;
            transition: all 0.3s;
        }

        .sidebar-wrapper .metismenu ul a:hover {
            transform: translateX(5px);
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        /* Beautiful Submenu Colors Matching Parents */
        /* Group 1: Blue Subitems */
        #menu > li:nth-child(4n+1) ul a:hover { 
            color: #0d6efd; 
            border-color: rgba(13, 110, 253, 0.1);
            background-color: rgba(13, 110, 253, 0.05);
        }
        #menu > li:nth-child(4n+1) ul a:hover i { color: #0d6efd; opacity: 1; font-size: 14px; }

        /* Group 2: Purple Subitems */
        #menu > li:nth-child(4n+2) ul a:hover { 
            color: #6f42c1; 
            border-color: rgba(111, 66, 193, 0.1);
            background-color: rgba(111, 66, 193, 0.05);
        }
        #menu > li:nth-child(4n+2) ul a:hover i { color: #6f42c1; opacity: 1; font-size: 14px; }

        /* Group 3: Teal Subitems */
        #menu > li:nth-child(4n+3) ul a:hover { 
            color: #20c997; 
            border-color: rgba(32, 201, 151, 0.1);
            background-color: rgba(32, 201, 151, 0.05);
        }
        #menu > li:nth-child(4n+3) ul a:hover i { color: #20c997; opacity: 1; font-size: 14px; }

        /* Group 4: Orange Subitems */
        #menu > li:nth-child(4n+4) ul a:hover { 
            color: #fd7e14; 
            border-color: rgba(253, 126, 20, 0.1);
            background-color: rgba(253, 126, 20, 0.05);
        }
        #menu > li:nth-child(4n+4) ul a:hover i { color: #fd7e14; opacity: 1; font-size: 14px; }

        /* Card Hover Effect for Dashboard */
        .card-hover-zoom {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card-hover-zoom:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }

        /* Modern Arrow Customization */
        .sidebar-wrapper .metismenu .has-arrow::after {
            width: 7px;
            height: 7px;
            border-width: 2px 0 0 2px;
            border-style: solid;
            border-color: #a0a0a0; /* Neutral gray */
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Bouncy effect */
        }
        
        /* Arrow becomes colorful on hover (Inherits the colorful text color) */
        .sidebar-wrapper .metismenu a:hover .has-arrow::after,
        .sidebar-wrapper .metismenu .mm-active > .has-arrow::after {
            border-color: currentColor; /* Takes the Blue/Purple/Green/Orange from text */
            box-shadow: -1px -1px 0px rgba(0,0,0,0.1); /* Subtle depth */
        }

        /* Entry Animation for Menu Items */
        @keyframes slideInMenuItem {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .sidebar-wrapper .metismenu > li {
            animation: slideInMenuItem 0.4s ease-out forwards;
            opacity: 0;
        }

        /* Stagger the animation for first 15 items */
        .sidebar-wrapper .metismenu > li:nth-child(1) { animation-delay: 0.05s; }
        .sidebar-wrapper .metismenu > li:nth-child(2) { animation-delay: 0.1s; }
        .sidebar-wrapper .metismenu > li:nth-child(3) { animation-delay: 0.15s; }
        .sidebar-wrapper .metismenu > li:nth-child(4) { animation-delay: 0.2s; }
        .sidebar-wrapper .metismenu > li:nth-child(5) { animation-delay: 0.25s; }
        .sidebar-wrapper .metismenu > li:nth-child(6) { animation-delay: 0.3s; }
        .sidebar-wrapper .metismenu > li:nth-child(7) { animation-delay: 0.35s; }
        .sidebar-wrapper .metismenu > li:nth-child(8) { animation-delay: 0.4s; }
        .sidebar-wrapper .metismenu > li:nth-child(9) { animation-delay: 0.45s; }
        .sidebar-wrapper .metismenu > li:nth-child(10) { animation-delay: 0.5s; }
        .sidebar-wrapper .metismenu > li:nth-child(11) { animation-delay: 0.55s; }
        .sidebar-wrapper .metismenu > li:nth-child(12) { animation-delay: 0.6s; }
        .sidebar-wrapper .metismenu > li:nth-child(13) { animation-delay: 0.65s; }
        .sidebar-wrapper .metismenu > li:nth-child(14) { animation-delay: 0.7s; }
        .sidebar-wrapper .metismenu > li:nth-child(15) { animation-delay: 0.75s; }

        /* Smooth Custom Scrollbar */
        .sidebar-wrapper .simplebar-scrollbar::before {
            background-color: rgba(0,0,0,0.2);
            width: 4px;
            border-radius: 4px;
        }

        /* Click/Active Ripple Simulation */
        .sidebar-wrapper .metismenu a:active {
            transform: scale(0.98) translateX(5px); /* Gentle press effect */
            transition: transform 0.1s;
        }

        /* ----------------------------------------------------------------- */
        /* GLOBAL CONTENT DESIGN UPGRADE (Tables, Cards, Forms)               */
        /* ----------------------------------------------------------------- */

        /* Premium Card Design for Content Pages */
        .page-content .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.03); /* Soft, airy shadow */
            transition: transform 0.3s;
        }
        
        .page-content .card-header {
            background-color: #fff;
            border-bottom: 1px solid #f0f0f0;
            padding: 1.5rem;
            border-radius: 12px 12px 0 0;
            font-weight: 600;
        }

        /* Modern Table Design */
        .table-responsive {
            border-radius: 10px;
            overflow: hidden; /* Needed for border-radius on table */
        }

        .table thead th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            color: #6c757d;
            background-color: #f8f9fa; /* Light gray header */
            border-bottom: none;
            padding: 15px;
        }

        .table tbody td {
            vertical-align: middle;
            color: #495057;
            font-size: 0.95rem;
            padding: 15px;
            border-bottom: 1px solid #f0f4f8;
        }
        
        /* Table Row Hover - Professional Lift */
        .table-hover tbody tr:hover {
            background-color: #fcfdfe;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            transform: scale(1.001); /* Micro lift to keep it crisp */
            position: relative;
            z-index: 1;
        }

        /* Action Buttons (Edit/Delete) Upgrade */
        .btn-sm {
            border-radius: 8px; /* Softer buttons */
            padding: 6px 12px;
            font-weight: 500;
            transition: all 0.2s;
        }

        /* Soft Effect for Buttons */
        .btn-primary.btn-sm {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            border: none;
        }
        .btn-primary.btn-sm:hover {
            background-color: #0d6efd;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
        }

        .btn-danger.btn-sm {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: none;
        }
        .btn-danger.btn-sm:hover {
            background-color: #dc3545;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.2);
        }
        
        /* Image Styling in Tables */
        .table img {
            border-radius: 6px; /* Smooth corners for thumbnails */
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
    </style>
	<title>ERA | Admin</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('images/application/'.application()->fav_icon) }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text text-danger">ERA</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left text-danger'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('admin.home') }}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-slider-alt"></i>
						</div>
						<div class="menu-title">Slider</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('slider.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
						</li>
						<li>
                            <a href="{{ route('slider.index') }}"><i class="bx bx-right-arrow-alt"></i>All Slider</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-shape-square"></i>
						</div>
						<div class="menu-title">Ongoing Project</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('project.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Project</a>
						</li>
						<li>
                            <a href="{{ route('project.index') }}"><i class="bx bx-right-arrow-alt"></i>All Project</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-news"></i>
						</div>
						<div class="menu-title">Latest News</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('news.add') }}"><i class="bx bx-right-arrow-alt"></i>Add News</a>
						</li>
						<li>
                            <a href="{{ route('news.index') }}"><i class="bx bx-right-arrow-alt"></i>All News</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class="lni lni-image"></i>
						</div>
						<div class="menu-title">Photo Gallery</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('gallery.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Photo</a>
						</li>
						<li>
                            <a href="{{ route('gallery.index') }}"><i class="bx bx-right-arrow-alt"></i>All Photo</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-bell"></i>
						</div>
						<div class="menu-title">Subscribe</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('subscribe.all') }}"><i class="bx bx-right-arrow-alt"></i>All Subscribe</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-donate-heart"></i>
						</div>
						<div class="menu-title">Donate Now</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('admin.payment_methods.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Payment Method</a>
						</li>
						<li>
                            <a href="{{ route('admin.payment_methods.index') }}"><i class="bx bx-right-arrow-alt"></i>All Payment Methods</a>
						</li>
						<li>
                            <a href="{{ route('admin.donations.index') }}"><i class="bx bx-right-arrow-alt"></i>All Donations</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-target-lock"></i>
						</div>
						<div class="menu-title">Key Focus Area</div>
					</a>
					<ul>
						<li>
							<a href="{{ route('admin.focus_areas.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Focus Area</a>
						</li>
						<li>
							<a href="{{ route('admin.focus_areas.index') }}"><i class="bx bx-right-arrow-alt"></i>All Focus Areas</a>
						</li>
					</ul>
				</li>
				{{-- <li>
					<a href="{{ route('logo.create') }}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
				</li> --}}
				<li>
					<a href="{{ route('logo.create') }}">
						<div class="parent-icon"><i class='bx bx-folder'></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
				</li>
				<li>
					<a href="{{ route('about.us.create') }}">
						<div class="parent-icon"><i class='bx bx-folder'></i>
						</div>
						<div class="menu-title">About us</div>
					</a>
				</li>
				<li>
					<a href="{{ route('mission.vision.create') }}">
						<div class="parent-icon"><i class='fadeIn animated bx bx-calendar-star'></i>
						</div>
						<div class="menu-title">Mission Vision</div>
					</a>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-detail'></i>
						</div>
						<div class="menu-title">Origin & Legal Affilation</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('origin.legal_affilation.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Affilation</a>
						</li>
						<li>
                            <a href="{{ route('origin.legal_affilation.index') }}"><i class="bx bx-right-arrow-alt"></i>All Affilation</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-user-circle'></i>
						</div>
						<div class="menu-title">Executive Committee</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('executive.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Member</a>
						</li>
						<li>
                            <a href="{{ route('executive.index') }}"><i class="bx bx-right-arrow-alt"></i>All Members</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-group'></i>
						</div>
						<div class="menu-title">Team Members</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('team.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Member</a>
						</li>
						<li>
                            <a href="{{ route('team.index') }}"><i class="bx bx-right-arrow-alt"></i>All Members</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-briefcase'></i>
						</div>
						<div class="menu-title">Programs</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('programs.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Program</a>
						</li>
						<li>
                            <a href="{{ route('programs.index') }}"><i class="bx bx-right-arrow-alt"></i>All Programs</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-trending-up'></i>
						</div>
						<div class="menu-title">Impact Metrics</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('impact.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Impact</a>
						</li>
						<li>
                            <a href="{{ route('impact.index') }}"><i class="bx bx-right-arrow-alt"></i>All Impact</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-book-heart'></i>
						</div>
						<div class="menu-title">Success Stories</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('stories.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Story</a>
						</li>
						<li>
                            <a href="{{ route('stories.index') }}"><i class="bx bx-right-arrow-alt"></i>All Stories</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='lni lni-network'></i>
						</div>
						<div class="menu-title">Chief Executive Message</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('chief.message.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Message</a>
						</li>
						<li>
                            <a href="{{ route('chief.message.index') }}"><i class="bx bx-right-arrow-alt"></i>All Message</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-help-circle'></i>
						</div>
						<div class="menu-title">FAQ</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('faq.add') }}"><i class="bx bx-right-arrow-alt"></i>Add FAQ</a>
						</li>
						<li>
                            <a href="{{ route('faq.index') }}"><i class="bx bx-right-arrow-alt"></i>All FAQ</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-heart'></i>
						</div>
						<div class="menu-title">Volunteers</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('volunteers.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Opportunity</a>
						</li>
						<li>
                            <a href="{{ route('volunteers.index') }}"><i class="bx bx-right-arrow-alt"></i>All Opportunities</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-message-rounded-dots'></i>
						</div>
						<div class="menu-title">User Message</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('message.index') }}"><i class="bx bx-right-arrow-alt"></i>All Message</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-user-check'></i>
						</div>
						<div class="menu-title">Partners & Donor</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('partner.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Partners & Donor</a>
						</li>
						<li>
                            <a href="{{ route('partner.index') }}"><i class="bx bx-right-arrow-alt"></i>All Partners & Donor</a>
						</li>
					</ul>
				</li>
				{{-- <li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-area'></i>
						</div>
						<div class="menu-title">Key Focus Ares</div>
					</a>
					<ul>
						<li>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>Add</a>
						</li>
						<li>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>All</a>
						</li>
					</ul>
				</li> --}}
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-notification'></i>
						</div>
						<div class="menu-title">Project Archive</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('project.archive.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Project</a>
						</li>
						<li>
                            <a href="{{ route('project.archive.index') }}"><i class="bx bx-right-arrow-alt"></i>All Project</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-file'></i>
						</div>
						<div class="menu-title">Strategic Plan</div>
					</a>
					<ul>
						<li>
							<a href="{{ route('strategic_plans.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Strategic Plan</a>
						</li>
						<li>
							<a href="{{ route('strategic_plans.index') }}"><i class="bx bx-right-arrow-alt"></i>All Strategic Plan</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-file'></i>
						</div>
						<div class="menu-title">Policy and Guideline</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('policy.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Policy and Guideline</a>
						</li>
						<li>
                            <a href="{{ route('policy.index') }}"><i class="bx bx-right-arrow-alt"></i>All Policy and Guideline</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-file'></i>
						</div>
						<div class="menu-title">Publication</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('publications.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Publication</a>
						</li>
						<li>
                            <a href="{{ route('publications.index') }}"><i class="bx bx-right-arrow-alt"></i>All Publications</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-star'></i>
						</div>
						<div class="menu-title">Career</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('invoked.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Career</a>
						</li>
						<li>
                            <a href="{{ route('invoked.index') }}"><i class="bx bx-right-arrow-alt"></i>All Career</a>
						</li>
					</ul>
				</li>
				<li>
					<a  class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-phone-call'></i>
						</div>
						<div class="menu-title">Contact</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('contact.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Contact</a>
						</li>
						<li>
                            <a href="{{ route('contact.index') }}"><i class="bx bx-right-arrow-alt"></i>All Contact</a>
						</li>
					</ul>
				</li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="parent-icon"><i class='bx bx-log-out-circle'></i>
                        </div>
                        <div class="menu-title">Logout</div>
                    </a>
                </li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">

					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							{{-- <li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li> --}}
							<li class="nav-item dropdown dropdown-large d-none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a >
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
                                        <p class="text-center mt-3">No new notifications</p>
									</div>
									<a >
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large d-none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a >
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
                                        <p class="text-center mt-3">No new messages</p>
									</div>
									<a >
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>

					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bx bx-user"></i>
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							{{-- <li><a class="dropdown-item" ><i class="bx bx-user"></i><span>Profile</span></a>
							</li> --}}
							{{-- <li>
								<div class="dropdown-divider mb-0"></div>
							</li> --}}
							<li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out-circle'></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

                @yield('content')

            </div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © {{ @date('Y') }}. All right reserved ERA</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>

			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--end switcher-->

	<!-- Bootstrap JS -->
	<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/jquery-knob/excanvas.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="{{ asset('admin/assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>

</html>
