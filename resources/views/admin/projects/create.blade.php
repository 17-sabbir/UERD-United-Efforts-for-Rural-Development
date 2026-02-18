@extends('admin.layouts.master')

@section('title')
Create Project
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4" style="background-color: #f8f9fa;">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create New Project</h5>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-light btn-sm text-danger fw-bold">Back to List</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projects.store') }}" method="POST">
                    @csrf
                                <div class="mb-3">
                                    <label for="project_name" class="form-label">Project Name</label>
                                    <input type="text" class="form-control" id="project_name" name="project_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="objectives" class="form-label">Objectives</label>
                                    <textarea class="form-control" id="objectives" name="objectives" rows="5"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="locations" class="form-label">Locations</label>
                                        <input type="text" class="form-control" id="locations" name="locations">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="project_duration" class="form-label">Project Duration</label>
                                        <input type="text" class="form-control" id="project_duration" name="project_duration" placeholder="e.g. 2021 to 2024">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="donors" class="form-label">Donors</label>
                                        <input type="text" class="form-control" id="donors" name="donors">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="total_beneficiary" class="form-label">Total Beneficiary</label>
                                        <input type="text" class="form-control" id="total_beneficiary" name="total_beneficiary" placeholder="e.g. Total Beneficiary: 297">
                                    </div>
                                </div>
                                <div class="mb-3">
                                     <label for="status" class="form-label">Status</label>
                                     <select class="form-control" id="status" name="status">
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                     </select>
                                </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-danger">Create Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
