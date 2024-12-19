@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('All EMI Records') }}
    </h2>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>EMI Records</h5>
        </div>
        <div class="card-body">
            <!-- Tab Navigation -->
            <ul class="nav nav-pills mb-3" id="emi-tabs" role="tablist">
                @foreach (['daily' => 'Daily', 'weekly' => 'Weekly', 'monthly' => 'Monthly'] as $key => $label)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $key }}-tab" 
                                data-bs-toggle="pill" data-bs-target="#{{ $key }}" type="button" 
                                role="tab" aria-controls="{{ $key }}" 
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $label }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="emi-tabContent">
                @foreach (['daily' => $dailyEmis, 'weekly' => $weeklyEmis, 'monthly' => $monthlyEmis] as $key => $emis)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $key }}" 
                         role="tabpanel" aria-labelledby="{{ $key }}-tab">
                        <div class="table-responsive">
                            <table>
                                <thead class="table-light">
                                    <tr>
                                        <th>NAME</th>
                                        <th>MOBILE</th>
                                        <th>LOAN AMOUNT</th>
                                        <th>COLLECTION TYPE</th>
                                        <th>DATE OF COLLECT</th>
                                        <th>EMI NUMBER</th>
                                        <th>EMI AMOUNT</th>
                                        <th>PAID EMI AMOUNT</th>
                                        <th>REMAINING AMOUNT</th>
                                        {{-- <th>STATUS</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($emis as $emi)
                                        <tr>
                                            <td>{{ $emi->name }}</td>
                                            <td>{{ $emi->mobile }}</td>
                                            <td>{{ $emi->loan_amount }}</td>
                                            <td>{{ $emi->collection_type }}</td>
                                            <td>{{ $emi->date_of_collect }}</td>
                                            <td>{{ $emi->emi_number }}</td>
                                            <td>{{ $emi->emi_amount }}</td>
                                            <td>{{ $emi->paid_emi_amount }}</td>
                                            <td>{{ $emi->remaining_amount }}</td>
                                            {{-- <td>{{ $emi->status }}</td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">No records found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
