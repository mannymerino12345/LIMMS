@extends('admin.admin_dashboard')

@section('admin')
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Dashboard <span>/ Admin</span></h3>
            </div>
        </div><!-- Page Heading End -->

        <!-- Page Button Group Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-date-range">
                <input type="text" class="form-control input-date-predefined">
            </div>
        </div><!-- Page Button Group End -->

    </div><!-- Page Headings End -->

    <!-- Top Report Wrap Start -->
    <div class="row">

        <!-- Total Users Report -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">
                <div class="head">
                    <h4>Total Users</h4>
                </div>
                <div class="content">
                    <h5>Total Users: {{ $userCount }}</h5>
                </div>
            </div>
        </div><!-- Total Users End -->

        <!-- Total Items Report -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">
                <div class="head">
                    <h4>Total Items</h4>
                </div>
                <div class="content">
                    <h5>Total Items: {{ $itemCount }}</h5>
                </div>
            </div>
        </div><!-- Total Items End -->

        <!-- Approved Transactions Report -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">
                <div class="head">
                    <h4>Approved Transactions</h4>
                </div>
                <div class="content">
                    <h5>Approved: {{ $approvedCount }} / {{ $transactionCount }}</h5>
                    <!-- Progress Bar -->
                    {{-- <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($approvedCount / $transactionCount) * 100 }}%;" aria-valuenow="{{ $approvedCount }}" aria-valuemin="0" aria-valuemax="{{ $transactionCount }}"></div>
                    </div>
                    <p>{{ round(($approvedCount / $transactionCount) * 100, 2) }}%</p> --}}
                </div>
            </div>
        </div><!-- Approved Transactions End -->

        <!-- Returned Transactions Report -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">
                <div class="head">
                    <h4>Returned Transactions</h4>
                </div>
                <div class="content">
                    <h5>Returned: {{ $returnedCount }} / {{ $transactionCount }}</h5>
                    <!-- Progress Bar -->
                    {{-- <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ ($returnedCount / $transactionCount) * 100 }}%;" aria-valuenow="{{ $returnedCount }}" aria-valuemin="0" aria-valuemax="{{ $transactionCount }}"></div>
                    </div>
                    <p>{{ round(($returnedCount / $transactionCount) * 100, 2) }}%</p> --}}
                </div>
            </div>
        </div><!-- Returned Transactions End -->

    </div><!-- Top Report Wrap End -->
</div>
@endsection
