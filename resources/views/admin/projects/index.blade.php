@extends('admin.layouts.master')

@section('title', 'Projects')

@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Projects</h5>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">Add New Project</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Locations</th>
                    <th>Donors</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->locations }}</td>
                    <td>{{ $project->donors }}</td>
                    <td>
                        <span class="badge bg-{{ $project->status == 'ongoing' ? 'success' : 'secondary' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
