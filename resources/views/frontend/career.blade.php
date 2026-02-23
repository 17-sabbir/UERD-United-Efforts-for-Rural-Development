@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Invoked</li>
      </ol>
      <h2>Career with UERD</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">

      <div class="section-title">
        <h2>Career with UERD</h2>
        
        <div class="text-start mb-5">
            <p>
                <strong>United Efforts for Rural Development [UERD]</strong> is a non-government, non-profit, and non-political voluntary social development organization establishment in June 2000. 
                UERD works together with disadvantaged poor community people to eliminate poverty and gender discrimination.
            </p>
            
            <h4 class="mt-4">Work Environment</h4>
            <p>
                UERD has developed and organized a structured management system which is not bureaucratic. 
                The organization believes in a society where people live in dignity and security with a gender-balanced environment.
            </p>

            <h4 class="mt-4">Staff Strength</h4>
            <p>
                UERD has a dedicated team of staff (full time and part time) and volunteers. 
                The project staffs are responsible for the proper implementation of all field activities.
            </p>
            
            <h4 class="mt-4">Office Time</h4>
            <p>Saturday to Thursday: 09:00 AM to 05:00 PM<br>Friday: Weekly Holiday</p>

            <h4 class="mt-4">Contact for Recruitment</h4>
            <p>
                <strong>Head Office:</strong> Milon Bazar, Post Office: Charnarchar, Upazila: Derai, District: Sunamganj.<br>
                <strong>Email:</strong> uerd5678@gmail.com, rabicoming2009@yahoo.com
            </p>
        </div>

            @foreach ($career as $key => $data)
                <a href="{{ asset('images/invoked/'.$data->file) }}" target="blank" class="btn btn-warning border border-dark" style="font-size: 20px; font-weight:500; box-shadow: 5px 5px 0 rgba(0,0,0,1);"><i class="fa-solid fa-cloud-arrow-down"></i> Download {{ $data->name }}</a>
            @endforeach
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

      </div>

    </div>
  </section><!-- End Contact Section -->

@endsection
