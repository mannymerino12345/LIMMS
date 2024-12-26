@extends('staff.staff_dashboard')

@section('staff')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Table <span>/ Transaction History</span></h3>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Transaction History Table</h3>
                </div>
                <div class="box-body">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table footable"
                           data-paging="true"
                           data-filtering="true"
                           data-sorting="true"
                           data-breakpoints='{ "xs": 480, "sm": 768, "md": 992, "lg": 1200, "xl": 1400 }'>
                        <thead>
                            <tr>
                                <th>History ID</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>User ID Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $transactionHistory)
                                <tr>
                                    <td>{{ $transactionHistory->history_id }}</td>
                                    <td>{{ $transactionHistory->description }}</td> <!-- Correctly display the description -->
                                    <td>{{ $transactionHistory->date }}</td> <!-- Correctly display the date -->
                                    <td>{{ $transactionHistory->user->id_number }}</td> <!-- Access the 'id_number' through the 'user' relationship -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
