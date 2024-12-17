@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Group Loan') }}
    </h2>
@endsection

@section('content')
<div class="container mt-4">
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#groupLoanModal">Add Group</button>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h5>Group Loan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('grouploans.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="group_id" class="form-label">Select Group</label>
                            <select class="form-control" id="group_id" name="group_id" required>
                                <option value="">Choose a Group</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" 
                                            data-leader-name="{{ $group->group_leadername }}" 
                                            data-leader-number="{{ $group->group_leadernumber }}">
                                        {{ $group->group_name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please select group</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="leader_name" class="form-label">Leader Name</label>
                            <input type="text" class="form-control" id="leader_name" name="leader_name" required>
                            <small class="form-text text-muted">Please enter leader name</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="leader_number" class="form-label">Leader Number</label>
                            <input type="text" class="form-control" id="leader_number" name="leader_number" required>
                            <small class="form-text text-muted">Please enter leader number</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="teamlead_name" class="form-label">Team Lead Name</label>
                            <input type="text" class="form-control" id="teamlead_name" name="teamlead_name" required>
                            <small class="form-text text-muted">Please enter team lead name</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="teamlead_number" class="form-label">Team Lead Number</label>
                            <input type="text" class="form-control" id="teamlead_number" name="teamlead_number" required>
                            <small class="form-text text-muted">Please enter team lead number</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="totalgroup_member" class="form-label">Total Group Members</label>
                            <input type="number" class="form-control" id="totalgroup_member" name="totalgroup_member" required>
                            <small class="form-text text-muted">Please enter total group members</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="loan_amount" class="form-label">Loan Amount</label>
                            <input type="number" class="form-control" id="loan_amount" name="loan_amount" required>
                            <small class="form-text text-muted">Please enter loan amount</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="intrest_rate" class="form-label">Interest Rate (%)</label>
                            <input type="number" step="0.01" class="form-control" id="intrest_rate" name="intrest_rate" required>
                            <small class="form-text text-muted">Please enter interest rate</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="type" class="form-label">Loan Type</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                            </select>
                            <small class="form-text text-muted">Please select loan type</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="collected_amount" class="form-label">Collected Amount</label>
                            <input type="number" class="form-control" id="collected_amount" name="collected_amount" required>
                            <small class="form-text text-muted">Please enter collected amount</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" required>
                            <small class="form-text text-muted">Please enter duration</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="disburse_rate" class="form-label">Disbursement Rate (%)</label>
                            <input type="number" step="0.01" class="form-control" id="disburse_rate" name="disburse_rate" required>
                            <small class="form-text text-muted">Please enter disbursement rate</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="agent_id" class="form-label">Agent ID</label>
                            <input type="text" class="form-control" id="agent_id" name="agent_id" required>
                            <small class="form-text text-muted">Please enter agent id</small>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="groupLoanModal" tabindex="-1" aria-labelledby="groupLoanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="groupLoanModalLabel">Add Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('groups.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="group_name" class="form-label">Group Name</label>
                        <input type="text" class="form-control" id="group_name" name="group_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="group_leadername" class="form-label">Group Leader Name</label>
                        <input type="text" class="form-control" id="group_leadername" name="group_leadername" required>
                    </div>
                    <div class="mb-3">
                        <label for="group_leadernumber" class="form-label">Group Leader Number</label>
                        <input type="text" class="form-control" id="group_leadernumber" name="group_leadernumber" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Save Group</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var groupSelect = document.getElementById('group_id');
        var leaderNameInput = document.getElementById('leader_name');
        var leaderNumberInput = document.getElementById('leader_number');

        groupSelect.addEventListener('change', function() {
            var selectedOption = groupSelect.options[groupSelect.selectedIndex];

            if (selectedOption.value) {
                var leaderName = selectedOption.getAttribute('data-leader-name');
                var leaderNumber = selectedOption.getAttribute('data-leader-number');
                leaderNameInput.value = leaderName;
                leaderNumberInput.value = leaderNumber;
            } else {
                leaderNameInput.value = '';
                leaderNumberInput.value = '';
            }
        });
    });
</script>
@endsection
