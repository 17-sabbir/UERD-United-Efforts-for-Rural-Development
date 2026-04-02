@extends('layouts.admin')
@section('title', 'Organogram Setup - Admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Upload Organogram</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Upload or Update Organogram (PDF/Image)</h3>
                        </div>

                        <!-- form start -->
                        <form action="{{ route('admin.organogram.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group mb-4">
                                    <label for="file_path">Upload File</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_path" name="file_path" accept=".pdf,.png,.jpg,.jpeg">
                                            <label class="custom-file-label" for="file_path">Choose File (PDF/Image only)</label>
                                        </div>
                                    </div>
                                </div>

                                @if(isset($organogram) && $organogram->file_path)
                                    <div class="alert alert-info mt-3">
                                        <strong>Current File:</strong> 
                                        <a href="{{ asset($organogram->file_path) }}" target="_blank" class="text-white text-decoration-underline">View Uploaded File</a>
                                    </div>
                                @endif
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary w-100">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
