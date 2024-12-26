<div class="side-header show">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>
                <li class="has-sub-menu"><a href="#"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                
                
                @php
                    $staffSetting = \App\Models\StaffSetting::where('user_id', auth()->id())->first();
                @endphp
                
                @if ($staffSetting && $staffSetting->s_accounts === 'active')
                    <li><a href="{{url('staff/user/table')}}"><i class="ti-palette"></i> <span>Accounts</span></a></li>
                @endif

                @if ($staffSetting && $staffSetting->s_item === 'active')
                    <li class="has-sub-menu">
                        <a href="#"><i class="ti-package"></i> <span>Items</span></a>
                        <ul class="side-header-sub-menu">
                            <li><a href="{{url('/staff/laboratory/table')}}"><span>Laboratory</span></a></li>
                            <li><a href="{{url('/staff/items/table')}}"><span>Items</span></a></li>
                            <li><a href="{{url('/staff/category/table')}}"><span>Categories</span></a></li>
                        </ul>
                    </li>
                @endif


                @if ($staffSetting && $staffSetting->s_transaction === 'active')
                    <li class="has-sub-menu"><a href="#"><i class="ti-crown"></i> <span>Transactions</span></a>
                        <ul class="side-header-sub-menu">
                            <li><a href="{{ url('staff/transaction/request') }}"><span>Request</span></a></li>
                            <li><a href="{{url('staff/transaction/return')}}"><span>Approved/Return Item</span></a></li>
                            <li><a href="{{url('staff/transaction/returned')}}"><span>Returned Items</span></a></li>
                            <li><a href="{{url('staff/transaction/history')}}"><span>Transaction History</span></a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
