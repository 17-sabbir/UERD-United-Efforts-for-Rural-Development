@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <!-- Header with Action -->
        <div class="d-flex justify-content-between align-items-center mb-3">
             <h6 class="mb-0 text-uppercase text-primary font-weight-bold">
                <i class="bx bx-shape-square me-1"></i> Ongoing Projects
            </h6>
             <a href="{{ route('project.add') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bx bx-plus-circle me-1"></i> Add New Project
            </a>
        </div>

        <div class="card shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success border-0 bg-success fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class='bx bxs-check-circle'></i></div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">Success</h6>
                                <div class="text-white">{{ session()->get('success') }}</div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-info border-0 bg-info fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class='bx bxs-info-circle'></i></div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-dark">Updated</h6>
                                <div class="text-dark">{{ session()->get('update') }}</div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="table-responsive" style="max-height: 500px; overflow-y: auto; overflow-x: auto;">
                    <table class="table table-hover mb-0 align-middle" style="min-width: 1200px;">
                        <thead class="table-light" style="position: sticky; top: 0; z-index: 10;">
                            <tr>
                                <th width="5%" class="ps-3 text-secondary">#</th>
                                <th width="10%" class="text-secondary">Preview</th>
                                <th width="15%" class="text-secondary">Title</th>
                                <th width="5%" class="text-center text-secondary">Priority</th>
                                <th width="20%" class="text-secondary">Objective of the Project</th>
                                <th width="15%" class="text-secondary">Locations</th>
                                <th width="10%" class="text-secondary">Duration</th>
                                <th width="10%" class="text-secondary">Donors</th>
                                <th width="10%" class="text-center text-secondary">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $key => $item)
                            <tr>
                                <td class="ps-3 text-secondary font-weight-bold">{{ ++$key }}</td>
                                <td>
                                    <div class="p-1 border rounded bg-white d-inline-block shadow-sm">
                                        <img src="{{ asset('images/project/'.$item->image) }}" class="rounded" alt="project image" width="70" height="50" style="object-fit: cover;">
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0 text-dark font-weight-bold text-wrap" style="font-size: 15px; max-width: 250px;">{{ $item->title }}</h6>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-info text-dark">{{ $item->priority }}</span>
                                </td>
                                <td class="text-muted text-wrap" style="max-width: 300px;">
                                    {{ Str::limit($item->description, 60, "...") }}
                                </td>
                                <td class="text-secondary">{{ $item->location }}</td>
                                <td class="text-secondary">{{ $item->duration }}</td>
                                <td class="text-secondary">{{ $item->donors }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('project.delete', $item->id) }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this project?');">
                                            <i class="bx bx-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @if(count($project) < 1)
                        <div class="text-center py-5">
                            <div class="mb-3 text-muted opacity-25">
                                <i class="bx bx-folder-minus" style="font-size: 4rem;"></i>
                            </div>
                            <h5 class="text-muted">No Projects Found</h5>
                            <p class="text-secondary small">Click the "Add New Project" button to get started.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
