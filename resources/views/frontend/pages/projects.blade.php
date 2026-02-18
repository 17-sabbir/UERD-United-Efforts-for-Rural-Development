@extends('main')

@section('title', 'Our Projects - UERD')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h2 class="display-5 fw-bold text-danger">Development Projects at a Glance</h2>
            <p class="lead text-secondary">A comprehensive overview of our current and past initiatives</p>
        </div>
    </div>

    <!-- Tabs for Filtering -->
    <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active px-4 py-2 fw-bold rounded-pill" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-selected="true">All Projects</button>
        </li>
        <li class="nav-item" role="presentation">
             <button class="nav-link px-4 py-2 fw-bold rounded-pill mx-2" id="pills-ongoing-tab" data-bs-toggle="pill" data-bs-target="#pills-ongoing" type="button" role="tab" aria-selected="false">Ongoing</button>
        </li>
         <li class="nav-item" role="presentation">
            <button class="nav-link px-4 py-2 fw-bold rounded-pill" id="pills-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-selected="false">Completed</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <!-- All Projects Tab -->
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel">
            <div class="row g-4">
                @foreach($projects as $project)
                <div class="col-lg-6">
                    <div class="card h-100 shadow-sm border-0 border-top border-4 {{ $project->status == 'ongoing' ? 'border-success' : 'border-secondary' }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h4 class="card-title fw-bold text-dark mb-0">{{ $project->project_name }}</h4>
                                <span class="badge {{ $project->status == 'ongoing' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($project->status) }}</span>
                            </div>
                            
                            <h6 class="text-danger fw-bold border-bottom pb-2 mb-3">Objectives</h6>
                            <p class="card-text text-secondary mb-4" style="font-size: 0.95rem;">
                                {!! nl2br(Str::limit($project->objectives, 250)) !!}
                                <!-- Full text hidden/modal logic could be added here -->
                            </p>

                            <div class="row pt-3 border-top g-2" style="font-size: 0.9rem;">
                                <div class="col-md-6 mb-2">
                                    <strong class="d-block text-dark">Location:</strong>
                                    <span class="text-muted">{{ $project->locations }}</span>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <strong class="d-block text-dark">Duration:</strong>
                                    <span class="text-muted">{{ $project->project_duration }}</span>
                                </div>
                                <div class="col-12 mb-2">
                                    <strong class="d-block text-dark">Donor:</strong>
                                    <span class="text-muted fst-italic">{{ $project->donors }}</span>
                                </div>
                                <div class="col-12">
                                     <strong class="text-success">{{ $project->total_beneficiary }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Ongoing Tab -->
        <div class="tab-pane fade" id="pills-ongoing" role="tabpanel">
             <div class="row g-4">
                @foreach($projects->where('status', 'ongoing') as $project)
                 <div class="col-lg-6">
                    <div class="card h-100 shadow-sm border-0 border-top border-4 border-success">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-dark mb-3">{{ $project->project_name }}</h4>
                            <p class="card-text text-secondary mb-4">
                                {!! nl2br(Str::limit($project->objectives, 200)) !!}
                            </p>
                            <div class="border-top pt-3">
                                <small class="text-muted d-block mb-1"><strong>Duration:</strong> {{ $project->project_duration }}</small>
                                <small class="text-muted d-block"><strong>Donor:</strong> {{ $project->donors }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Completed Tab -->
        <div class="tab-pane fade" id="pills-completed" role="tabpanel">
             <div class="row g-4">
                @foreach($projects->where('status', 'completed') as $project)
                 <div class="col-lg-6">
                    <div class="card h-100 shadow-sm border-0 border-top border-4 border-secondary">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-dark mb-3">{{ $project->project_name }}</h4>
                            <p class="card-text text-secondary mb-4">
                                {!! nl2br(Str::limit($project->objectives, 200)) !!}
                            </p>
                            <div class="border-top pt-3">
                                <small class="text-muted d-block mb-1"><strong>Duration:</strong> {{ $project->project_duration }}</small>
                                <small class="text-muted d-block"><strong>Donor:</strong> {{ $project->donors }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
