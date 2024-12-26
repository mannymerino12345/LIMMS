@extends('admin.admin_dashboard')

@section('admin')
<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Staff <span>/ Settings</span></h3>
            </div>
        </div>
        <!-- Page Heading End -->
    </div>
    <!-- Page Headings End -->

    <!-- Staff Settings List Start -->
    <div class="row mbn-30">

        @foreach ($staffSettings as $staffSetting)
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="box shadow-lg rounded-lg p-4">
                    
                    <!-- Staff Name Section -->
                    <div class="box-head mb-3 d-flex justify-content-between align-items-center">
                        <!-- Staff Name -->
                        <h4 class="title text-primary mb-0">Name: {{ $staffSetting->user->name }}</h4>
                        <h4 class="title text-primary mb-0">ID Number: {{ $staffSetting->user->id_number }}</h4>

                        
                        <!-- Staff Photo -->
                        <div class="flex-shrink-0">
                            @if($staffSetting->user->photo)
                                <img src="{{ asset('upload/staff_images/' . $staffSetting->user->photo) }}" 
                                     alt="{{ $staffSetting->user->name }}" 
                                     style="width: 100px; height: 100px; border-radius: 100%;">
                            @else
                                <div style="width: 100px; height: 100px; border-radius: 100%; background-color: #ccc; display: flex; align-items: center; justify-content: center; font-size: 12px; color: white;">
                                    No Image
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Buttons Section -->
                    <div class="box-body">
                        <div class="d-flex justify-content-between">
                            
                            <!-- Active Status Buttons -->
                            <div class="media-body">
                                <h5 class="text-muted mb-3">InActive Status</h5>
                                {{-- INACTIVE ACCOUNTS --}}
                                <form action="{{ route('admin.transaction.inactivateAccount') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="staff_id" value="{{ $staffSetting->user->id }}">
                                    <input type="hidden" name="s_accounts" value="inactive">
                                    <button type="submit" class="button button-outline button-warning mb-3">
                                        <span>Accounts</span>
                                    </button>
                                </form>
                                {{-- INACTIVE ITEMS --}}
                                <form action="{{ route('admin.transaction.inactivateItems') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="staff_id" value="{{ $staffSetting->user->id }}">
                                    <input type="hidden" name="s_item" value="inactive">
                                    <button type="submit" class="button button-outline button-info mb-3">
                                        <span>Items</span>
                                    </button>
                                </form>    
                                
                                {{-- INACTIVE TRANSACTION --}}
                                <form action="{{ route('admin.transaction.inactivateTransaction') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="staff_id" value="{{ $staffSetting->user->id }}">
                                    <input type="hidden" name="s_transaction" value="inactive">
                                    <button type="submit" class="button button-outline button-secondary mb-3">
                                        <span>Transaction</span>
                                    </button>
                                </form>   
                                
                            </div>

                            <div class="media-body">
                                <h5 class="text-muted mb-3">STATUS</h5>
                            
                                {{-- INACTIVE ACCOUNTS --}}
                                <form action="#" method="POST">
                                    <button type="submit" class="button button-outline mb-3" disabled>
                                        <span class="fw-bold">{{$staffSetting->s_accounts}}</span>
                                    </button>
                                </form>
                            
                                {{-- INACTIVE ITEMS --}}
                                <form action="#" method="POST">
                                    <button type="submit" class="button button-outline mb-3" disabled>
                                        <span class="fw-bold">{{$staffSetting->s_item}}</span>
                                    </button>
                                </form>
                            
                                {{-- INACTIVE TRANSACTION --}}
                                <form action="#" method="POST">
                                    <button type="submit" class="button button-outline mb-3" disabled>
                                        <span class="fw-bold">{{$staffSetting->s_transaction}}</span>
                                    </button>
                                </form>
                            </div>
                            
                            
                            <!-- Inactive Status Buttons -->
                            <div class="media-body">
                                <h5 class="text-muted mb-3">Active Status</h5>
                                {{-- ACTIVE ACCOUNTS --}}
                                <form action="{{ route('admin.transaction.activateAccount') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="staff_id" value="{{ $staffSetting->user->id }}">
                                    <input type="hidden" name="s_accounts" value="active">
                                    <button type="submit" class="button button-outline button-warning mb-3">
                                        <span>Accounts</span>
                                    </button>
                                </form>  

                                {{-- ACTIVE ITEMS --}}
                                <form action="{{ route('admin.transaction.activateItems') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="staff_id" value="{{ $staffSetting->user->id }}">
                                    <input type="hidden" name="s_item" value="active">
                                    <button type="submit" class="button button-outline button-info mb-3">
                                        <span>Items</span>
                                    </button>
                                </form> 

                                 {{-- ACTIVE TRANSACTION --}}
                                 <form action="{{ route('admin.transaction.activateTransaction') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="staff_id" value="{{ $staffSetting->user->id }}">
                                    <input type="hidden" name="s_transaction" value="active">
                                    <button type="submit" class="button button-outline button-secondary mb-3">
                                        <span>Transaction</span>
                                    </button>
                                </form>  
                            </div>
                        </div>

                    </div> <!-- End of Box Body -->

                </div> <!-- End of Box -->
            </div> <!-- End of Staff Setting Column -->
        @endforeach

    </div> <!-- Staff Settings List End -->

</div>
<!-- Content Body End -->
@endsection
