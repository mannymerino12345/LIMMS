
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

    <base href="{{asset('user/')}}/">

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/icon/Favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/icon/Favicon.png">

</head>

<body class="body counter-scroll">

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
        <div id="page" class="pt-40">

            

            <div class="tf-section-2 pt-60 widget-box-icon">
                <div class="themesflat-container w920">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section-1">
                                <h2 class="tf-title pb-16">Login</h2>
                                <p class="pb-40">Get started today by entering just a few details</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="widget-login">
                                <form method="POST" action="{{ route('login') }}"  id="commentform" class="comment-form">
                                    @csrf
                                    <fieldset class="id">
                                        <label>ID NUMBER *</label>
                                        <input id="id_number" name="id_number" type="text"  placeholder="22101-1" tabindex="2" value="" aria-required="true" required>
                                    </fieldset>
                                    <fieldset class="password">
                                        <label>Password *</label>
                                        <input class="password-input @error('password') is-invalid 
                                        @enderror" type="password" id="password" placeholder="Min. 8 character" name="password" tabindex="2" value="" aria-required="true" required>
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <i class="icon-show password-addon" id="password-addon"></i>
                                        <div class="forget-password">
                                            <a href="#">Forget password</a>
                                        </div>
                                    </fieldset>
                                    <div class="btn-submit mb-30">
                                        <div class="col-12 mt-10"><button type="submit" class="tf-button style-1 h50 w-100" type="submit">Login<i class="icon-arrow-up-right2"></i></button></div>
                                    </div>
                                </form>
                                <div class="other">or continue</div>
                                <div class="login-other">
                                    <a href="#" class="login-other-item">
                                        <img src="assets/images/google.png" alt="">
                                        <span>Sign with google</span>
                                    </a>
                                    <a href="#" class="login-other-item">
                                        <img src="assets/images/facebook.png" alt="">
                                        <span>Sign with facebook</span>
                                    </a>
                                    <a href="#" class="login-other-item">
                                        <img src="assets/images/apple.png" alt="">
                                        <span>Sign with apple</span>
                                    </a>
                                </div>
                                <div class="no-account">Don't have an account? <a href="sign-up.html" class="tf-color">Sign up</a></div>
                            </div>
                        </div>
                    </div>
                </div>
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

</body>

</html>