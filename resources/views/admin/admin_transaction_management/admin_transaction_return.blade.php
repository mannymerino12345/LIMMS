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
                    <button class="button button-outline button-info" type="button" id="select_all_button" onclick="selectAllCheckboxes()">Select All</button>
                    <form action="{{ route('admin.transaction.returnMultiple') }}" method="POST">
                        @csrf
                        <table class="table footable"
                               data-paging="true"
                               data-filtering="true"
                               data-sorting="true"
                               data-breakpoints='{ "xs": 480, "sm": 768, "md": 992, "lg": 1200, "xl": 1400 }'>
                            <thead>
                                <tr>
                                    <th> Select</th>
                                    <th>Transaction ID</th>
                                    <th>User</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Borrow Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td><input type="checkbox" name="transactions[]" value="{{ $transaction->transaction_id }}" class="adomx-checkbox info"></td> <!-- Checkbox for each transaction -->
                                        <td>{{ $transaction->transaction_id }}</td>
                                        <td>{{ $transaction->user->id_number }}</td>
                                        <td>{{ $transaction->item->item_name }}</td>
                                        <td>{{ $transaction->quantity }}</td>
                                        <td>{{ $transaction->borrow_date }} {{ $transaction->borrow_time }}</td>
                                        <td>{{ $transaction->due_date }} {{ $transaction->due_time }}</td>
                                        <td>{{ $transaction->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="button button-outline button-success">Return Selected</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleSelectAll() {
        // Get the 'select_all' checkbox
        var selectAllCheckbox = document.getElementById("select_all");

        // Get all checkboxes
        var checkboxes = document.querySelectorAll(".adomx-checkbox");

        // Loop through all checkboxes and set their checked property based on 'select_all'
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    }
</script>
<script>
    function selectAllCheckboxes() {
        // Get all checkboxes with the class "adomx-checkbox"
        var checkboxes = document.querySelectorAll('.adomx-checkbox');
        
        // Check if all checkboxes are already selected
        var allChecked = Array.from(checkboxes).every(function(checkbox) {
            return checkbox.checked;
        });

        // Loop through each checkbox and toggle the checked state
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = !allChecked; // If all are checked, uncheck them; otherwise, check all
        });
    }
</script>


@endsection

