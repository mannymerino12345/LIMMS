
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Open9 | NFT Marketplace HTML Template</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <base href="{{asset('user/')}}/">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/icon/Favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/icon/Favicon.png">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>

<body class="body">

    <!-- preload -->
    <div class="preload preload-container">
        <div class="middle">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
            <div class="bar bar3"></div>
            <div class="bar bar4"></div>
            <div class="bar bar5"></div>
            <div class="bar bar6"></div>
            <div class="bar bar7"></div>
            <div class="bar bar8"></div>
          </div>
    </div>
    <!-- /preload -->

    
        
    <div id="wrapper">
        <div id="page" class=" pt-40 slider-animation-page">
            {{-- HEADER --}}
            @include('user.body.header')

            @yield('user_content')
            
            @include('user.body.footer')
        </div>
            
    </div>
    <!-- /#page -->

</div>
  <!-- /#wrapper -->
  <div class="tf-mouse tf-mouse-outer"></div>
    <div class="tf-mouse tf-mouse-inner"></div>


<div class="progress-wrap active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>

<!-- Javascript -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/swiper.js"></script>
<script src="assets/js/countto.js"></script>
<script src="assets/js/count-down.js"></script>

    <script src="assets/js/simpleParallax.min.js"></script>
    <script src="assets/js/gsap.js"></script>
    <script src="assets/js/SplitText.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/ScrollTrigger.js"></script>
    <script src="assets/js/gsap-animation.js"></script>
<script src="assets/js/tsparticles.min.js"></script>
    <script src="assets/js/tsparticles.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
           case 'info':
           toastr.info(" {{ Session::get('message') }} ");
           break;
       
           case 'success':
           toastr.success(" {{ Session::get('message') }} ");
           break;
       
           case 'warning':
           toastr.warning(" {{ Session::get('message') }} ");
           break;
       
           case 'error':
           toastr.error(" {{ Session::get('message') }} ");
           break; 
        }
        @endif 
       </script>
</body>

</html>
