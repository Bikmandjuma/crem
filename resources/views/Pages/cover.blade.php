@php
use App\Models\Order;
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Cremohair e-commerse</title>
    <link rel="stylesheet" type="text/css" href="/test/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/test/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/test/css/font-awesome.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-100094943-1', 'auto');
      ga('send', 'pageview');
    </script>
    <style>
        .sidepanel  {
          width: 0;
          position: fixed;
          z-index: 1;
          height:100%;
          top: 0;
          right: 0;
          background-color: #111;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
        }

        .sidepanel a{
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          color: white;
          display: block;
          transition: 0.3s;
        }

        .sidepanel a:hover {
          color: #f1f1f1;
        }

        .sidepanel .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
        }


    </style>
</head>
<body style="overflow:auto;">

<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
@auth('customer')
  <?php
  $cust_id=auth()->guard('customer')->user()->id;
  $orders=Order::all()->where('customer_id',$cust_id)->where('payment_checkout',null);
  $count_order=collect($orders)->count();
  ?>

  @if ($count_order == 0)
      <a href="#"><h2>Your cart is {{$count_order}}</h2></a>
      <a href="#"><hr></a>
      <a href="#"><h3>No product in your cart </h3></a>
      <hr>
       <br>
       <div class="row">
         <div class="col-md-12 text-center">
            <a href="{{route('ViewOrder')}}"><button class="btn btn-danger text-white">SHOPPING CART</button></a> 
         </div>
       </div>
  @else
      <a href="#"><h2>Your cart </h2></a>
      <a href="#"><hr></a>
      <a href="#"><h3>Your cart is {{$count_order}}</h3></a>
     <hr>
     <br>
     <div class="row">
       <div class="col-md-12 text-center">
          <a href="{{route('ViewOrder')}}"><button class="btn btn-danger text-white">SHOPPING CART</button></a> 
       </div>
     </div>
     <br>
     <div class="row">
       <div class="col-md-12 text-center">
          <a href="#"><button class="btn btn-danger text-white">PAY NOW</button></a>
       </div>
     </div>
  @endif
@endauth
</div>
<!--end of sidebar of orders-->
<div class="container-fluid">
<div class="main_shadow">
<!-- Start Header -->
<div class="row main_header">
    <div class="col-md-3 col-sm-3 col-xs-12 logo" align="center">
        @auth('customer')
        <a href="http://www.freetimelearning.com/" target="_blank"><img src="{{URL::to('/')}}/images/logo.png" class="img-responsive" alt="Logo"></a>               
        @else
        <a href="http://www.freetimelearning.com/" target="_blank"><img src="images/logo.png" class="img-responsive" alt="Logo"></a>                   
        @endauth
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 form-top hidden-xs" align="center">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Here">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn_search"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12" align="right">
                <div class="row hidden-xs">
                     <div class="row">
                        <div class="header-top pull-right">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i>&nbsp;</a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix" style="margin:2px 0px;"></div>
                <div class="row" align="center">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="header-right-bottom">
                            @auth('customer')
                                <span class=""><i class="fa fa-user"></i>&nbsp;Hello,&nbsp;<b>{{auth()->guard('customer')->user()->name}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-lock"></i>&nbsp;<a href="{{route('customerlogout')}}">Logout</a></span>  
                            @else
                                <ul>
                                    <li  align="center" data-toggle="modal" data-target="#login_model"><a href="#"><i class="fa  fa-user"></i> Login / Sign up</a></li>
                                </ul>
                            @endauth
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="header-right-bottom">
                            @auth('customer')
                                <?php
                                    $cust_id=auth()->guard('customer')->user()->id;
                                    $orders=Order::all()->where('customer_id',$cust_id)->where('payment_checkout',null);
                                    $count_order=collect($orders)->count();
                                ?>
                                <div class="openbtn" onclick="openNav()">
                                    <a href="#"><i class="fa fa-cart-plus cart_size"></i> &nbsp;
                                    <span class="badge badge-danger" style="margin-top:-30px;margin-left:-10px;"><?php echo $count_order;?></span><p><i class="fa fa-hand-o-right fa-2x" aria-hidden="true" id="clicktoorder"></i>Shopping cart/Orders</p></a>
                                </div>
                            @else
                                <i class="fa fa-cart-plus cart_size"></i> &nbsp; 
                                <span class="badge badge-danger" style="margin-top:-30px;margin-left:-10px;">0</span><p>Shopping cart</p>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
   </div>
</div>
<!-- End Header -->


<!-- Start Menu bar -->
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
       <!-- <a href="#!" class="navbar-brand">Logo</a>-->
     </div>
    <div id="navbarCollapse" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li> <a href="{{url('/')}}">Home</a></li>
      <li><a href="#!">Men's gel</a></li>
      <li><a href="#!">Women's gel</a></li>
      <li><a href="#!">kid's gel</a></li>
      <li><a href="#!">Hair's gel</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category &nbsp;
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#!">Category name</a></li>
        </ul>
      </li>
      <li><a href="{{url('/')}}">New ArivalProducts</a></li>
      <li><a href="#!">Customer Services</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Branches &nbsp;
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#!">branch name</a></li>
        </ul>
      </li>
      @auth('customer')
      <li><a href="{{url('/customer/dashboard')}}">New ArivalProducts</a></li>
      @endauth
    </ul>
  </div>
</nav>
<!-- End menu bar -->

<!----- Start Slider (or) Banner ------>
@auth('customer')
@else
<div class="row">
    <div class="slider" style="background:url(../images/slider.jpg)">
       <div class="slider-padding">
            <div style="padding-top:30px;"><a href="https://play.google.com/store/apps/" target="parent" class="btn"><i class="fa fa-android"></i>&nbsp;get our android app</a></div>
       </div>
    </div>
</div>
@endauth

 <!----- End Slider (or) Banner ------>
 <!-- start of mysidebar-->

 <!--end of sidebar-->
<main>
    @yield('content')
</main>


<!--start of footer-->
<div class="row footer">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="footer-parts">
            <div class="footer-parts-h4">About Us</div>
            <div class="about-footer">Cremohair is best body gel e-commerse website in rwanda which provide best and cool gel ,our mission it to make you look pretty !</div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="footer-parts">
            <div class="footer-parts-h4">Extra Links</div>
            <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="footer-parts">
            <div class="footer-parts-h4">Extra Links</div>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Diclimer</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="footer-parts">
            <div class="footer-parts-h4">Social Links</div><br />
            <div style="padding-left:20px; font-size:22px;">
                <a href="https://www.facebook.com/cremohair/" target="_blank"><i class="fa fa-facebook fa_footer"></i></a> &nbsp; &nbsp;
                <a href="#" target="_blank"><i class="fa fa-whatsapp fa_footer"></i></a> &nbsp; &nbsp;
                <a href="https://twitter.com/cremohair" target="_blank"><i class="fa fa-twitter fa_footer"></i></a> &nbsp; &nbsp;
                <a href="#" target="_blank"><i class="fa fa-instagram fa_footer"></i></a>
            </div>
            <div style="padding-left:20px; padding-top:15px; font-size:15px;">
               <!--  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Subscribe Now">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn_search"><i class="fa fa-search"></i></button>
                    </span>
                </div><br /> -->
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="copyrights">
        <div class="col-md-12 col-sm-8 col-xs-12">
            <div class="copyrights-left">
            &copy; <?php echo date('Y') ?>. All rights reserved by <a href="http://www.cremohair.com" target="_blank">Cremohair</a>.
            </div>
        </div>
    </div>
</div>
<!--End Footer-->
</div>
</div>
<script type="text/javascript" src="http://www.freetimelearning.com/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/test/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
$(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
            $(this).toggleClass('open');
            $('b', this).toggleClass("caret caret-up");                
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
            $(this).toggleClass('open');
            $('b', this).toggleClass("caret caret-up");                
        });
});

function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}

</script>
</body>
</html>