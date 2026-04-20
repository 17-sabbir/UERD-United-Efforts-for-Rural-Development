@extends('main')

@section('content')

  <div class="container pt-5 pb-3 text-center">
      <h1 class="display-3 fw-bold text-uppercase" style="background: linear-gradient(to right, #009688, #8bc34a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
          Ongoing Projects
      </h1>
  </div>

  <!-- ======= Timeline / Kanban Style Section ======= -->
  <section class="modern-container bg-light-gray">
    <div class="container" data-aos="fade-up">

      <div class="row mb-5 align-items-end">
          <div class="col-lg-8">
              <span class="text-primary fw-bold text-uppercase letter-spacing-2">Current Operations</span>
              <h2 class="display-5 fw-bold text-dark mt-2">Projects in Progress</h2>
          </div>
          <div class="col-lg-4 text-lg-end">
              <span class="badge bg-white text-dark shadow-sm py-2 px-3 rounded-pill border">
                  Total Active: {{ $project->total() }}
              </span>
          </div>
      </div>

      <div class="row g-4">
          @foreach ($project as $key => $data)
          <div class="col-xl-4 col-md-6">
              <div class="project-card h-100 bg-white p-4 rounded-4 shadow-sm position-relative border-start border-4 border-primary">
                  <!-- Floating Number -->
                   <div class="position-absolute top-0 end-0 mt-3 me-3 opacity-25">
                       <span class="display-6 fw-bold text-muted">#{{ str_pad((int) ($data->priority ?? ($project->firstItem() + $key)), 2, '0', STR_PAD_LEFT) }}</span>
                   </div>

                  <div class="mb-4 pt-2 d-flex gap-3">
                      @if(!empty($data->image))
                          <div class="flex-shrink-0" style="width:96px; height:72px; overflow:hidden; border-radius:8px;">
                              <img src="{{ asset('images/project/'.$data->image) }}" alt="{{ $data->project_name }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                          </div>
                      @endif

                      <div class="flex-grow-1">
                       <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 mb-2">
                            Ongoing
                       </span>
                      <h4 class="fw-bold mb-1">
                          <a href="{{ route('ongoing.project.view',$data->id) }}" class="text-dark text-decoration-none stretched-link project-title-hover">
                              {{ $data->project_name }}
                          </a>
                      </h4>
                      <small class="text-muted d-block">
                          <i class="fa-solid fa-map-pin me-1 text-danger"></i> {{ $data->locations }}
                      </small>
                      </div>
                  </div>

                  <div class="project-details mb-4">
                      <p class="text-secondary small mb-3 line-clamp-3">
                          {{ Str::limit($data->objectives, 120) }}
                      </p>
                      
                      @if($data->donors)
                      <div class="d-flex align-items-center mb-2">
                          <div class="icon-sq me-2 bg-light text-secondary rounded-1 d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                              <i class="fa-solid fa-hand-holding-heart fa-xs"></i>
                          </div>
                          <span class="small fw-bold text-dark">{{ $data->donors }}</span>
                      </div>
                      @endif

                      <div class="d-flex align-items-center">
                           <div class="icon-sq me-2 bg-light text-secondary rounded-1 d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                              <i class="fa-regular fa-clock fa-xs"></i>
                          </div>
                          <span class="small text-muted">{{ project_period($data) }}</span>
                      </div>
                  </div>

              </div>
          </div>
          @endforeach
      </div>

      <div class="d-flex justify-content-center mt-5">
          {{ $project->links() }}
      </div>

    </div>
  </section>

  <style>
      .bg-light-gray { background-color: #f8f9fa; }
      .bg-primary-subtle { background-color: rgba(13, 110, 253, 0.05); color: var(--modern-primary); border-color: rgba(13, 110, 253, 0.1); }
      .line-clamp-3 {
          display: -webkit-box;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;
          overflow: hidden;
      }
      .project-card {
          transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
      }
      .project-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 10px 30px rgba(0,0,0,0.08) !important;
          border-color: var(--modern-accent) !important;
      }
      .project-title-hover:hover {
          color: var(--modern-primary) !important;
      }
  </style>
@endsection
