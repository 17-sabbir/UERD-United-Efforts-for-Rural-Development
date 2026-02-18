@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Gallery</li>
      </ol>
      <h2>All Photo</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Ongoing Project Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="py-2">
            <h3 class="text-center">PHOTO <span class="text-danger">GALLERY</span></h3>
          <p class="text-center text-secondary">Stay updated with UERD’s latest news and events, offering insights into our impactful initiatives and community engagements.</p>
        </div>

        @foreach ($photosByAlbum as $album => $items)
          <div class="pt-4">
            <h4 class="mb-3">{{ $album }}</h4>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
              @foreach ($items as $data)
                <div class="col">
                  <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('images/gallery/'.$data->image) }}" class="card-img-top" alt="{{ $data->title }}">
                    <div class="card-body py-2">
                      <div class="fw-semibold">{{ $data->title }}</div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

      </div>

    </div>
  </section><!-- End Ongoing Project Section -->

@endsection
