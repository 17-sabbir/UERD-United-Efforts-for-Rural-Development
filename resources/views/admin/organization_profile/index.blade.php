@extends('admin.layouts.master')

@section('title')
Organization Profile
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4" style="background-color: #f8f9fa;">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Organization Profile Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.organization_profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="organization_name" class="form-label">Organization Name</label>
                            <input type="text" class="form-control" id="organization_name" name="organization_name" value="{{ $orgProfile->organization_name ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_person" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $orgProfile->contact_person ?? '' }}">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $orgProfile->email ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $orgProfile->phone ?? '' }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="head_office_address" class="form-label">Head Office Address</label>
                            <textarea class="form-control" id="head_office_address" name="head_office_address" rows="3">{{ $orgProfile->head_office_address ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="liaison_office_address" class="form-label">Liaison Office Address</label>
                            <textarea class="form-control" id="liaison_office_address" name="liaison_office_address" rows="3">{{ $orgProfile->liaison_office_address ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="establishment_year" class="form-label">Year of Establishment</label>
                            <input type="date" class="form-control" id="establishment_year" name="establishment_year" value="{{ $orgProfile->establishment_year ?? '' }}">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="organization_type" class="form-label">Type of Organization</label>
                            <textarea class="form-control" id="organization_type" name="organization_type" rows="1">{{ $orgProfile->organization_type ?? '' }}</textarea>
                        </div>
                    </div>

                    <h6 class="mt-4 text-danger border-bottom border-danger pb-2">Registration Information</h6>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-3">
                            <label for="ngo_bureau_reg_no" class="form-label">NGO Bureau Registration No</label>
                            <input type="text" class="form-control" id="ngo_bureau_reg_no" name="ngo_bureau_reg_no" value="{{ $orgProfile->ngo_bureau_reg_no ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ngo_bureau_reg_date" class="form-label">NGO Bureau Registration Date</label>
                            <input type="date" class="form-control" id="ngo_bureau_reg_date" name="ngo_bureau_reg_date" value="{{ $orgProfile->ngo_bureau_reg_date ?? '' }}">
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="social_welfare_reg_no" class="form-label">Department of Social Welfare Reg No</label>
                            <input type="text" class="form-control" id="social_welfare_reg_no" name="social_welfare_reg_no" value="{{ $orgProfile->social_welfare_reg_no ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="social_welfare_reg_date" class="form-label">Social Welfare Reg Date</label>
                            <input type="date" class="form-control" id="social_welfare_reg_date" name="social_welfare_reg_date" value="{{ $orgProfile->social_welfare_reg_date ?? '' }}">
                        </div>
                    </div>

                    <h6 class="mt-4 text-danger border-bottom border-danger pb-2">About Organization</h6>
                    <div class="mb-3 mt-3">
                        <label for="background_info" class="form-label">Background Information</label>
                        <textarea class="form-control" id="background_info" name="background_info" rows="5">{{ $orgProfile->background_info ?? '' }}</textarea>
                    </div>

                     <div class="mb-3">
                        <label for="vision" class="form-label">Vision</label>
                        <textarea class="form-control" id="vision" name="vision" rows="2">{{ $orgProfile->vision ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="mission" class="form-label">Mission</label>
                        <textarea class="form-control" id="mission" name="mission" rows="2">{{ $orgProfile->mission ?? '' }}</textarea>
                    </div>

                    <h6 class="mt-4 text-danger border-bottom border-danger pb-2">Management Structure Page</h6>

                    <div class="mb-3 mt-3">
                        <label for="management_description" class="form-label">Description <small class="text-muted">(shown below the Management Structure heading on the committee page)</small></label>
                        <textarea class="form-control" id="management_description" name="management_description" rows="4" placeholder="e.g. UERD has developed and organized a structured management system…">{{ $orgProfile->management_description ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="organogram_pdf" class="form-label">Organogram PDF <small class="text-muted">(upload to replace current file)</small></label>
                        @if(!empty($orgProfile->organogram_pdf))
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $orgProfile->organogram_pdf) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                    <i class="bx bx-file-pdf me-1"></i> View Current PDF
                                </a>
                            </div>
                        @endif
                        <input type="file" class="form-control" id="organogram_pdf" name="organogram_pdf" accept=".pdf">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-danger">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
