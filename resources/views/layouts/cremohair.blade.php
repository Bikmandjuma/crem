<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cremohair</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/style/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/style/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/style/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/style/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/style/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/style/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/style/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/style/css/style.css" type="text/css">
        <!--w3 style-->
      <link rel="stylesheet" href="/style/dist/w3/w3.css">

      <!-- Font Awesome -->
      <link rel="stylesheet" href="/style/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="/style/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="/style/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="/style/plugins/jqvmap/jqvmap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/style/dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="/style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="/style/plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="/style/plugins/summernote/summernote-bs4.min.css">

      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <!-- Scripts -->
      <style>
        .header__menu ul li a{
            color:white;
        }
      </style>
</head>

<body style="background-color:#eee;">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="{{route('Login')}}">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header" style="background-color:teal;color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-lg-3">
                    <div class="header__logo">
                        <h1><strong>Cremohair</strong></h1>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="#">Product Details</a></li>
                                    <li><a href="#">Shop Cart</a></li>
                                    <li><a href="#">Checkout</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Contact us</a></li>
                        </ul>
                    </nav>
                </div>

                 <div class="col-lg-2">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="{{url('admin/login')}}" style="font-size:20px;color: white;"><strong><i class="fa fa-user text-warning"></i> Login</strong></a>
                        </div>
                        <ul class="header__right__widget">
                            <li>
                                <a href="#"><span class="icon_cart_alt" style="color:white;font-size:25px;"></span><span class="badge bg-warning">0</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->


<!-- yield Section Begin -->
<section class="services spad">
    @yield('content')
</section>
<!-- Js Plugins -->
<script src="/style/js/jquery-3.3.1.min.js"></script>
<script src="/style/js/bootstrap.min.js"></script>
<script src="/style/js/jquery.magnific-popup.min.js"></script>
<script src="/style/js/jquery-ui.min.js"></script>
<script src="/style/js/mixitup.min.js"></script>
<script src="/style/js/jquery.countdown.min.js"></script>
<script src="/style/js/jquery.slicknav.js"></script>
<script src="/style/js/owl.carousel.min.js"></script>
<script src="/style/js/jquery.nicescroll.min.js"></script>
<script src="/style/js/main.js"></script>

<!-- jQuery -->
<script src="/style/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/style/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="..style/jquery/jquery.min.js"></script>

<!-- ChartJS -->
<script src="/style/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/style/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/style/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/style/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/style/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/style/plugins/moment/moment.min.js"></script>
<script src="/style/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/style/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/style/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE../ App -->
<script src="/style/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes >
<script src="../dist/js/demo.js"></script-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/style/dist/js/pages/dashboard.js"></script>

</body>

</html>