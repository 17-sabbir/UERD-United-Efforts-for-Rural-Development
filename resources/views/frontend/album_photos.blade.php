@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('gallery.albums') }}">Gallery</a></li>
        <li>{{ $album }}</li>
      </ol>
      <h2>{{ $album }}</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <section class="contact">
    <div class="container" data-aos="fade-up">

      <div class="py-2">
        <h3 class="text-center">{{ $album }} <span class="text-danger">Photos</span></h3>
        <p class="text-center text-secondary">Explore photos from this album.</p>
      </div>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-5">
        @forelse ($photos as $data)
          <div class="col">
            <div class="card h-100 border-0 shadow-sm">
              <img src="{{ asset('images/gallery/'.$data->image) }}" class="card-img-top" alt="{{ $data->title }}">
              <div class="card-body py-2">
                <div class="fw-semibold">{{ $data->title }}</div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <p class="text-center text-secondary mb-0">No photos found in this album.</p>
          </div>
        @endforelse
      </div>

    </div>
  </section>

@endsection
