<div class="header-section">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center">

            <!-- Header Logo (Header Left) Start -->
            <div class="header-logo col-auto">
                <a href="{{url('staff/dashboard')}}">
                    <img src="assets/images/logo/logo.png" alt="">
                    <img src="assets/images/logo/logo-light.png" class="logo-light" alt="">
                </a>
            </div><!-- Header Logo (Header Left) End -->

            <!-- Header Right Start -->
            <div class="header-right flex-grow-1 col-auto">
                <div class="row justify-content-between align-items-center">

                    <!-- Side Header Toggle & Search Start -->
                    <div class="col-auto">
                        <div class="row align-items-center">

                            <!--Side Header Toggle-->
                            <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>

                            <!--Header Search-->
                            <div class="col-auto">

                                <div class="header-search">

                                    <button class="header-search-open d-block d-xl-none"><i class="zmdi zmdi-search"></i></button>

                                    <div class="header-search-form">
                                        <form action="#">
                                            <input type="text" placeholder="Search Here">
                                            <button><i class="zmdi zmdi-search"></i></button>
                                        </form>
                                        <button class="header-search-close d-block d-xl-none"><i class="zmdi zmdi-close"></i></button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div><!-- Side Header Toggle & Search End -->

                    <!-- Header Notifications Area Start -->
                    <div class="col-auto">

                        <ul class="header-notification-area">

                            <!--Notification-->
                            <li class="adomx-dropdown col-auto">
                                <a class="toggle" href="#"><i class="zmdi zmdi-notifications"></i><span class="badge"></span></a>

                                <!-- Dropdown -->
                                <div class="adomx-dropdown-menu dropdown-menu-notifications">
                                    <div class="head">
                                        <h5 class="title">You have 4 new notification.</h5>
                                    </div>
                                    <div class="body custom-scroll">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="zmdi zmdi-notifications-none"></i>
                                                    <p>There are many variations of pages available.</p>
                                                    <span>11.00 am   Today</span>
                                                </a>
                                                <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="zmdi zmdi-block"></i>
                                                    <p>There are many variations of pages available.</p>
                                                    <span>11.00 am   Today</span>
                                                </a>
                                                <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="zmdi zmdi-info-outline"></i>
                                                    <p>There are many variations of pages available.</p>
                                                    <span>11.00 am   Today</span>
                                                </a>
                                                <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="zmdi zmdi-shield-security"></i>
                                                    <p>There are many variations of pages available.</p>
                                                    <span>11.00 am   Today</span>
                                                </a>
                                                <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="zmdi zmdi-notifications-none"></i>
                                                    <p>There are many variations of pages available.</p>
                                                    <span>11.00 am   Today</span>
                                                </a>
                                                <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="zmdi zmdi-block"></i>
                                                    <p>There are many variations of pages available.</p>
                                                    <span>11.00 am   Today</span>
                                                </a>
                                                <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="zmdi zmdi-info-outline"></i>
                                                    <p>There are many variations of pages available.</p>
                                                    <span>11.00 am   Today</span>
                                                </a>
                                                <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="zmdi zmdi-shield-security"></i>
                                                    <p>There are many variations of pages available.</p>
                                                    <span>11.00 am   Today</span>
                                                </a>
                                                <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="footer">
                                        <a href="#" class="view-all">view all</a>
                                    </div>
                                </div>

                            </li>
                            @php
                                $id = Auth::user()->id;
                                $profileData = App\Models\User::find($id);
                            @endphp
                            <!--User-->
                            <li class="adomx-dropdown col-auto">
                                <a class="toggle" href="#">
                                    <span class="user">
                                <span class="avatar">
                                    <img src="{{(!empty($profileData->photo)) ? url('upload/staff_images/'.$profileData->photo) : url('upload/profile.jpg')}}" alt="">
                                    <span class="status"></span>
                                    </span>
                                    <span class="name">{{$profileData->name}}</span>
                                    </span>
                                </a>

                                <!-- Dropdown -->
                                <div class="adomx-dropdown-menu dropdown-menu-user">
                                    <div class="head">
                                        <h5 class="name"><a href="#">Madison Howard</a></h5>
                                        <a class="mail" href="#">mailnam@mail.com</a>
                                    </div>
                                    <div class="body">
                                        <ul>
                                            <li><a href="{{url('staff/profile')}}"><i class="zmdi zmdi-account"></i>Profile</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-email-open"></i>Inbox</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-wallpaper"></i>Activity</a></li>
                                        </ul>
                                        <ul>
                                            <li><a href="{{route('staff.change.password')}}"><i class="zmdi zmdi-settings"></i>Change Password</a></li>
                                            <li><a href="{{url('staff/logout')}}"><i class="zmdi zmdi-lock-open"></i>Log out</a></li>
                                        </ul>
                                        <ul>
                                            <li><a href="#"><i class="zmdi zmdi-paypal"></i>Payment</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-google-pages"></i>Invoice</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </li>

                        </ul>

                    </div><!-- Header Notifications Area End -->

                </div>
            </div><!-- Header Right End -->

        </div>
    </div>
</div>