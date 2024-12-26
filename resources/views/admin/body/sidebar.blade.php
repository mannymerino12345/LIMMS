<div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

                <nav class="side-header-menu" id="side-header-menu">
                    <ul>
                        
                        <li><a href="{{url('admin/dashboard')}}"><i class="ti-home"></i> <span>Accounts</span></a></li>
                        <li><a href="{{url('admin/user/table')}}"><i class="ti-stamp"></i> <span>Accounts</span></a></li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-package"></i> <span>Items</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{url('/admin/laboratory/table')}}"><span>Laboratory</span></a></li>
                                <li><a href="{{url('/admin/items/table')}}"><span>Items</span></a></li>
                                <li><a href="{{url('/admin/category/table')}}"><span>Categories</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-crown"></i> <span>Transactions</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{ url('admin/transaction/request') }}"><span>Request</span></a></li>
                                <li><a href="{{url('admin/transaction/return')}}"><span>Approved/Return Item</span></a></li>
                                <li><a href="{{url('admin/transaction/returned')}}"><span>Returned Items</span></a></li>
                                <li><a href="{{url('admin/transaction/history')}}"><span>Transaction History</span></a></li>
                            </ul>
                        </li>
                        

                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div>