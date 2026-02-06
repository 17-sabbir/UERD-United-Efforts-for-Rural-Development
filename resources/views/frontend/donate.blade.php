@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Get Involved</li>
      </ol>
      <h2>Donate</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Project Archieve Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Donate</h2>
        <div style="background-image: url('{{ asset('img/donation.jpg') }}')" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-12 mx-auto text-center">
                        <h6 class="text-warning text-center">We need your cooperation</h6>
                        <h1 class="text-white text-center">Be a part of our mission to raise funds for impactful humanitarian causes.</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5 p-3 justify-content-center">
            <h5 class="fs-2 text-danger">Please donate to us using the following payment methods.</h5>
            
            @if($paymentMethods->count() > 0)
                @foreach($paymentMethods as $method)
                    <div class="col-md-3 border rounded p-3 m-1 d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            @if($method->icon_image)
                                <img src="{{ asset('storage/'.$method->icon_image) }}" alt="{{ $method->type }}" width="50%">
                            @elseif($method->type == 'bank')
                                <h1><i class="fa-solid fa-building-columns"></i></h1>
                            @elseif(file_exists(public_path('img/'.$method->type.'.png')))
                                <img src="{{ asset('img/'.$method->type.'.png') }}" alt="{{ $method->type }}" width="50%">
                            @else
                                <h1><i class="fa-solid fa-money-bill-wave"></i></h1>
                            @endif
                            <h5 class="fs-5 mt-2">{{ $method->account_name }}</h5>
                            <h5 class="fs-4">{{ $method->account_number }}</h5>
                            
                            @if($method->type == 'bank' && $method->bank_details)
                                <ul class="list-unstyled text-start mt-2">
                                    @if(isset($method->bank_details['bank_name']))
                                        <li><small><strong>Bank:</strong> {{ $method->bank_details['bank_name'] }}</small></li>
                                    @endif
                                    @if(isset($method->bank_details['branch_name']))
                                        <li><small><strong>Branch:</strong> {{ $method->bank_details['branch_name'] }}</small></li>
                                    @endif
                                    @if(isset($method->bank_details['routing_number']))
                                        <li><small><strong>Routing:</strong> {{ $method->bank_details['routing_number'] }}</small></li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center py-4">
                    <p class="text-muted">Payment methods will be available soon.</p>
                </div>
            @endif
        </div>

        <!-- Donation Form -->
        <div class="row py-5 p-3">
            <div class="col-md-8 mx-auto">
                <div class="card border">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Submit Your Donation Information</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fa-solid fa-check-circle"></i> {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('donation.submit') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="donor_name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" name="donor_name" id="donor_name" 
                                           class="form-control @error('donor_name') is-invalid @enderror" 
                                           placeholder="Enter your full name" 
                                           value="{{ old('donor_name') }}" required>
                                    @error('donor_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="donor_phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="donor_phone" id="donor_phone" 
                                           class="form-control @error('donor_phone') is-invalid @enderror" 
                                           placeholder="e.g., +8801XXXXXXXXX" 
                                           value="{{ old('donor_phone') }}" required>
                                    @error('donor_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="payment_method_id" class="form-label">Payment Method Used <span class="text-danger">*</span></label>
                                    <select name="payment_method_id" id="payment_method_id" 
                                            class="form-select @error('payment_method_id') is-invalid @enderror" required>
                                        <option value="">-- Select Payment Method --</option>
                                        @foreach($paymentMethods as $method)
                                            <option value="{{ $method->id }}" {{ old('payment_method_id') == $method->id ? 'selected' : '' }}>
                                                {{ ucfirst($method->type) }} - {{ $method->account_number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('payment_method_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="transaction_id" class="form-label">Transaction ID <span class="text-danger">*</span></label>
                                    <input type="text" name="transaction_id" id="transaction_id" 
                                           class="form-control @error('transaction_id') is-invalid @enderror" 
                                           placeholder="Enter transaction/reference ID" 
                                           value="{{ old('transaction_id') }}" required>
                                    @error('transaction_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Donation Amount (৳) <span class="text-danger">*</span></label>
                                <input type="number" name="amount" id="amount" 
                                       class="form-control @error('amount') is-invalid @enderror" 
                                       placeholder="Enter amount in BDT" 
                                       min="1" step="0.01"
                                       value="{{ old('amount') }}" required>
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="alert alert-info">
                                <i class="fa-solid fa-info-circle"></i> 
                                <strong>Note:</strong> Please make your donation first, then submit this form with the transaction details. 
                                We will verify your donation and contact you soon.
                            </div>

                            <button type="submit" class="btn btn-danger btn-lg w-100">
                                <i class="fa-solid fa-paper-plane"></i> Submit Donation Information
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Project ArchievePartner and Donor Section -->

@endsection
