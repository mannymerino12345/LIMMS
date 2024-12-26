
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adomx - Responsive Bootstrap 4 Admin Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <base href="{{asset('admin/')}}/">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="assets/css/vendor/cryptocurrency-icons.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins/plugins.css">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="assets/css/helper.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="assets/css/style-primary.css">

</head>

<body class="skin-dark">

    <div class="main-wrapper">

        <!-- Content Body Start -->
        <div class="content-body m-0 p-0">

            <div class="login-register-wrap">
                <div class="row">

                    <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">
                        <div class="login-register-form-wrap">

                            <div class="content">
                                <h1>Sign in</h1>
                                <p>Welcome! Please sign in to continue.</p>
                            </div>

                            <div class="login-register-form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-20"><input class="form-control @error('id_number') is-invalid 
                                        @enderror" id="id_number" name="id_number" type="text" placeholder="ID Number" required class="mt-1 block w-full" autofocus></div>
                                        @error('id_number')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="col-12 mb-20"><input class="form-control @error('password') is-invalid 
                                        @enderror" id="password" name="password" type="password" placeholder="Password" required autocomplete="current-password"></div>
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="col-12 mb-20"><label for="remember" class="adomx-checkbox-2"><input id="remember" type="checkbox"><i class="icon"></i>Remember.</label></div>
                                        <div class="col-12">
                                            <div class="row justify-content-between">
                                                <div class="col-auto mb-15"><a href="#">Forgot Password?</a></div>
                                                <div class="col-auto mb-15">Dont have account? <a href="register.html">Create Now.</a></div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-10"><button type="submit" class="button button-primary button-outline">sign in</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="login-register-bg order-1 order-lg-2 col-lg-7 col-12">
                        <div class="content">
                            <h1>Sign in</h1>
                            <p>Welcome! Please sign in to continue.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- Content Body End -->

    </div>

    <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/tippy4.min.js.js"></script>
    <!--Main JS-->
    <script src="assets/js/main.js"></script>

</body>

</html>