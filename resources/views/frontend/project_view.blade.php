@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>What We Do</li>
      </ol>
      <h2>Ongoing Project</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Ongoing Project Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top" alt="activity" width="100%">
            </div>
            <div class="col-md-8 text-left">
                <h2 class="text-left fw-bold">{{ $project->title }}</h2>
                <p class="text-secondary" style="font-size: 12px;">
                    <i class="fas fa-calendar-minus"></i>
                    {{ date("d/m/Y", strtotime($project->created_at ?? now())) }}
                </p>
                
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        @if($project->location)
                        <div class="row mb-2">
                            <div class="col-sm-3 fw-bold">Locations:</div>
                            <div class="col-sm-9">{{ $project->location }}</div>
                        </div>
                        @endif
                        
                        @if($project->duration)
                        <div class="row mb-2">
                            <div class="col-sm-3 fw-bold">Duration:</div>
                            <div class="col-sm-9">{{ $project->duration }}</div>
                        </div>
                        @endif
                        
                        @if($project->donors)
                        <div class="row mb-2">
                            <div class="col-sm-3 fw-bold">Donors:</div>
                            <div class="col-sm-9">{{ $project->donors }}</div>
                        </div>
                        @endif
                        
                        @if($project->remark)
                        <div class="row mb-2">
                            <div class="col-sm-3 fw-bold">Remark:</div>
                            <div class="col-sm-9">{{ $project->remark }}</div>
                        </div>
                        @endif
                    </div>
                </div>

                <h5 class="fw-bold">Objective of the Project</h5>
                <p style="text-align:justify;">
                    {{ $project->description }}
                </p>
            </div>
            <div class="py-3">
                <a href="{{ route('ongoing.project') }}" class="btn btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Ongoing Project</a>
            </div>
        </div>
      </div>

    </div>
  </section><!-- End Ongoing Project Section -->

@endsection
