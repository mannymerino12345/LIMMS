
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<header id="header_main" class="header_1 header-fixed">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">                              
                <div id="site-header-inner"> 
                    <div class="wrap-box flex">
                        <div id="site-logo">
                            <a href="{{route('dashboard')}}" rel="home" class="main-logo" style="color: #def926;">
                                <i class="fas fa-flask" style="margin-right: 10px; color: #def926;"></i> 
                                <i class="fas fa-laptop" style="margin-right: 10px; color: #def926;"></i>  
                                <i class="fas fa-seedling" style="margin-right: 10px; color: #def926;"></i> 
                                 <h2 style="color: #def926;" id="logo_header">LIMMS</h2>
                            </a>    
                            <div id="site-logo-inner">
                                                                                                                                                       
                            </div>
                        </div><!-- logo -->
                        {{-- NAVBAR PART 1 --}}
                        <div class="mobile-button">
                            <span></span>
                        </div><!-- /.mobile-button -->
                        <nav id="main-nav" class="main-nav">
                            <ul id="menu-primary-menu" class="menu">
                                <li class="menu-item current-menu-item"><a href="{{route('dashboard')}}">HOME</a></li>
                                
                                <li class="menu-item">
                                    <a href="{{url('/user/choose/laboratory')}}">BORROW</a>
                                </li>
                                <li class="menu-item menu-item-has-children">
                                    <a>ITEMS</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="{{route('user.item.view')}}">Requested Item</a></li>
                                        <li class="menu-item"><a href="{{route('user.item.approved')}}">Approved Item</a></li>
                                        <li class="menu-item"><a href="{{route('user.item.returned')}}">Returned Item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav><!-- /#main-nav -->
                        <div class="flat-wallet flex">
                            <div class="" id="wallet-header">
                                <a  href="#" id="connectbtn" class="tf-button style-1">
                                    <span>NOTIFICATION</span>
                                    <i class="fa-solid fa-bell"></i>
                                </a>
                            </div>
                            
                            <div class="canvas">
                                <span></span>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="canvas-nav-wrap">
        <div class="overlay-canvas-nav"></div>
        <div class="inner-canvas-nav">
            <div class="side-bar">
                <a href="index.html" rel="home" class="main-logo d-flex justify-content-center align-items-center">
                    <img src="{{ !empty($profileData->photo) && file_exists(public_path('upload/user_images/'.$profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('assets/images/avatar/avatar-07.png') }}" alt="" class="img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                </a>  
                <div class="canvas-nav-close">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve"><g><path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z"/></g></svg>
                </div>
                <div class="widget-search mt-30">
                    <h3>ID Number: {{$profileData->id_number}}</h3>
                </div>
                <div class="widget widget-categories">
                    <h5 class="title-widget">Profile</h5>
                    <ul>
                        <li>
                            <div class="cate-item"><a href="{{ route('user.profile') }}">Profile</a></div>
                        </li>
                        <li>
                            <div class="cate-item"><a href="{{ route('user.logout') }}">Logout</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-nav-wrap">
        <div class="overlay-mobile-nav"></div>
        <div class="inner-mobile-nav">
            <a href="index.html" rel="home" class="main-logo d-flex justify-content-center align-items-center">
                <img src="{{ !empty($profileData->photo) && file_exists(public_path('upload/user_images/'.$profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('assets/images/avatar/avatar-07.png') }}" alt="" class="img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
            </a>  
            <div class="mobile-nav-close">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve"><g><path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z"/></g></svg>
            </div>
            <div class="widget-search mt-30">
                <h3>ID Number: {{$profileData->id_number}}</h3>
            </div>
            <nav id="mobile-main-nav" class="mobile-main-nav">
                <ul id="menu-mobile-menu" class="menu">
                    {{-- NAVBAR PART2 --}}
                    <li class="menu-item current-menu-item"><a href="{{route('dashboard')}}">HOME</a></li>
                    <li class="menu-item">
                        <a class="item-menu-mobile" href="{{url('/user/choose/laboratory')}}">BORROW</a>
                    </li>
                    <li class="menu-item menu-item-has-children-mobile">
                        <a class="item-menu-mobile">ITEMS</a>
                        <ul class="sub-menu-mobile">
                            <li class="menu-item"><a href="{{route('user.item.view')}}">Requested Item</a></li>
                            <li class="menu-item"><a href="{{route('user.item.approved')}}">Approved Item</a></li>
                            <li class="menu-item"><a href="{{route('user.item.returned')}}">Returned Item 3</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a class="item-menu-mobile" href="{{ route('user.profile') }}">Profile</a>
                    </li>
                    <li class="menu-item">
                        <a class="item-menu-mobile" href="{{ route('user.logout') }}">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>