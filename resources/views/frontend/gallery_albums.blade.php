@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Gallery</li>
      </ol>
      <h2>Photo Gallery</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <section class="contact">
    <div class="container" data-aos="fade-up">

      <div class="py-2">
        <h3 class="text-center">Photo <span class="text-danger">Gallery</span></h3>
        <p class="text-center text-secondary">Browse albums and explore photos from our activities.</p>
      </div>

      <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('photo.all') }}" class="text-decoration-none">All Photos</a>
      </div>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-5">
        @forelse ($albums as $album)
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
        @empty
          <div class="col-12">
            <p class="text-center text-secondary mb-0">No albums found.</p>
          </div>
        @endforelse
      </div>

    </div>
  </section>

@endsection
