@extends('admin.admin_dashboard')

@section('admin')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Table <span>/ Transaction Management</span></h3>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Transaction Table</h3>
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
                                <th>Transaction ID</th>
                                <th>User</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Borrow Date</th>
                                <th>Due Date</th>
                                <th>Return Date</th> <!-- Added Return Date Column -->
                                <th>Return Time</th> <!-- Added Return Time Column -->
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction_id }}</td>
                                    <td>{{ $transaction->user->id_number }}</td> <!-- Assuming 'id_number' is a column in the 'users' table -->
                                    <td>{{ $transaction->item->name }}</td> <!-- Assuming 'name' is a column in the 'items' table -->
                                    <td>{{ $transaction->quantity }}</td>
                                    <td>{{ $transaction->borrow_date }} {{ $transaction->borrow_time }}</td>
                                    <td>{{ $transaction->due_date }}</td> <!-- Fixed repeated due_date column -->
                                    <td>{{ $transaction->return_date ?? 'N/A' }}</td> <!-- Return date (if available) -->
                                    <td>{{ $transaction->return_time ?? 'N/A' }}</td> <!-- Return time (if available) -->
                                    <td>{{ $transaction->status }}</td>
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
