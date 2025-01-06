@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Customers') }}
    </h2>
@endsection
@section('content')
<div class="container mt-5">
      
    <ul class="nav nav-tabs justify-content-center mb-4">
        <li class="nav-item">
            <a class="nav-link active" href="#" onclick="showTab('free')">Baic Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="showTab('basic')">KYC</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="showTab('premium')">Loan Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="showTab('features')">Other Details</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div id="tab-content">
        <div id="free" class="tab-pane active">
            <div class="row">
                <div class="col-md-4">
                    <div class="plan">
                        <h2>Basic details</h2>
                        <div class="header-line"></div>
                        <ul>
                            <li><span class="tick"><i class="fas fa-check"></i></span> 10k submissions per month</li>
                            <li><span class="tick"><i class="fas fa-check"></i></span> 2 API credentials</li>
                            <li><span class="tick"><i class="fas fa-check"></i></span> 1 user (that’s you!)</li>
                            <li><span class="cross"><i class="fas fa-times"></i></span> Firewall & Security</li>
                            <li><span class="cross"><i class="fas fa-times"></i></span> Multiple Devices</li>
                            <li><span class="cross"><i class="fas fa-times"></i></span> Dedicated Support</li>
                        </ul>
                        <button class="btn">Get Started for Free</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="basic" class="tab-pane">
            <div class="row">
                <div class="col-md-4">
                    <div class="plan">
                        <h2>KYC</h2>
                        <div class="header-line"></div>
                        <ul>
                            <li><span class="tick"><i class="fas fa-check"></i></span> 10k submissions per month</li>
                            <li><span class="tick"><i class="fas fa-check"></i></span> 2 API credentials</li>
                            <li><span class="tick"><i class="fas fa-check"></i></span> 5 Team Members</li>
                            <li><span class="cross"><i class="fas fa-times"></i></span> Firewall & Security</li>
                            <li><span class="cross"><i class="fas fa-times"></i></span> Multiple Devices</li>
                            <li><span class="cross"><i class="fas fa-times"></i></span> Dedicated Support</li>
                        </ul>
                        <button class="btn">Get Started for Free</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="premium" class="tab-pane">
            <div class="row">
                <div class="col-md-4">
                    <div class="plan">
                        <h2>Loan Details</h2>
                        <div class="header-line"></div>
                        <ul>
                            <li><span class="tick"><i class="fas fa-check"></i></span> 10k submissions per month</li>
                            <li><span class="tick"><i class="fas fa-check"></i></span> 2 API credentials</li>
                            <li><span class="tick"><i class="fas fa-check"></i></span> 10 Team Members</li>
                            <li><span class="cross"><i class="fas fa-times"></i></span> Firewall & Security</li>
                            <li><span class="cross"><i class="fas fa-times"></i></span> Multiple Devices</li>
                            <li><span class="cross"><i class="fas fa-times"></i></span> Dedicated Support</li>
                        </ul>
                        <button class="btn">Get Started for Free</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="features" class="tab-pane">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon"><i class="fas fa-clock"></i></div>
                        <h3>Faster than the blink of an eye</h3>
                        <p>Nor the government which has way, the met temple in out of after she and take I it the an of people contract.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon"><i class="fas fa-expand"></i></div>
                        <h3>Unlimited scalability with impact</h3>
                        <p>Nor the government which has way, the met temple in out of after she and take I it the an of people contract.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon"><i class="fas fa-link"></i></div>
                        <h3>Real-time record & site linkage</h3>
                        <p>Nor the government which has way, the met temple in out of after she and take I it the an of people contract.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    function showTab(tabId) {
        // Hide all tab content
        const tabs = document.querySelectorAll('.tab-pane');
        tabs.forEach(tab => {
            tab.style.display = 'none';
        });

        // Show the selected tab
        document.getElementById(tabId).style.display = 'block';

        // Update tab styles
        const links = document.querySelectorAll('.nav-link');
        links.forEach(link => {
            link.classList.remove('active');
        });
        event.target.classList.add('active');
    }

    // Show the first tab by default
    document.addEventListener('DOMContentLoaded', () => {
        showTab('free');
    });
</script>


<div class="container mt-4">
    <!-- Users Basic Details -->
    <div class="card mb-4">
        <div class="card-header" style="background-color: #1f6691;color:aliceblue">
            <h6 style="color:aliceblue">Basic Details</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Gender:</strong> <span class="text-muted">{{ $customer->gender ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Marital Status:</strong> <span class="text-muted">{{ $customer->marital_status ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Education:</strong> <span class="text-muted">{{ $customer->education ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Job Status:</strong> <span class="text-muted">{{ $customer->job_status ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Profession:</strong> <span class="text-muted">{{ $customer->profession ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Income:</strong> <span class="text-muted">{{ $customer->income ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Permanent Address:</strong> <span class="text-muted">{{ $customer->permanent_address ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>City:</strong> <span class="text-muted">{{ $customer->city ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>State:</strong> <span class="text-muted">{{ $customer->state ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Current Address:</strong> <span class="text-muted">{{ $customer->current_address ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>City:</strong> <span class="text-muted">{{ $customer->current_city ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>State:</strong> <span class="text-muted">{{ $customer->current_state ?? 'NA' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- KYC & Bank Details -->
    <div class="card mb-4">
        <div class="card-header text-white" style="background-color: #1f6691;">
            <h6 style="color:aliceblue">KYC & Bank Details</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Date of Birth:</strong> <span class="text-muted">{{ $customer->dob ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Pan Number:</strong> <span class="text-muted">{{ $customer->pan_number ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Aadhaar Number:</strong> <span class="text-muted">{{ $customer->aadhaar_number ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Bank Name:</strong> <span class="text-muted">{{ $customer->bank_name ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Account Number:</strong> <span class="text-muted">{{ $customer->account_number ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>IFSC Code:</strong> <span class="text-muted">{{ $customer->ifsc_code ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Branch Name:</strong> <span class="text-muted">{{ $customer->branch_name ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>City:</strong> <span class="text-muted">{{ $customer->bank_city ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>State:</strong> <span class="text-muted">{{ $customer->bank_state ?? 'NA' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Document Images -->
    <div class="card mb-4">
        <div class="card-header text-white" style="background-color: #1f6691;">
            <h6 style="color:aliceblue">Documents</h6>
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h6>Aadhaar Card Front</h6>
                    <img src="{{ $customer->aadhaar_front_url ?? '#' }}" alt="Image Not Available" class="img-fluid">
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Aadhaar Card Back</h6>
                    <img src="{{ $customer->aadhaar_back_url ?? '#' }}" alt="Image Not Available" class="img-fluid">
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Pan Card</h6>
                    <img src="{{ $customer->pan_card_url ?? '#' }}" alt="Image Not Available" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
