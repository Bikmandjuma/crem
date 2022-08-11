<!DOCTYPE html>
<html>
<head>
    <title>test</title>
    <link rel="stylesheet" type="text/css" href="/test/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/test/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/test/css/font-awesome.min.css" />

    <script type="text/javascript">
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-100094943-1', 'auto');
      ga('send', 'pageview');
    </script>
</head>
<body>
<div class="container-fluid">
<div class="main_shadow">
<!-- Start Header -->
<div class="row main_header">
    <div class="col-md-3 col-sm-3 col-xs-12 logo" align="center">
        <a href="http://www.freetimelearning.com/" target="_blank"><img src="images/logo.png" class="img-responsive" alt="Logo"></a></div>
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
                            <ul>
                                <li><a href="#!"><i class="fa  fa-user"></i>Logout</a></li>
                            </ul>    
                        @else
                            <ul>
                                <li><a href="#!"><i class="fa  fa-user"></i> Login / Sing up</a></li>
                            </ul>
                        @endauth
                            
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="header-right-bottom">
                            <i class="fa fa-cart-plus cart_size"></i> &nbsp; 
                            <span class="badge badge-danger" style="margin-top:-30px;margin-left:-10px;">0</span>
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
      <li> <a href="http://freetimelearning.com/" target="_blank">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Men Shoes &nbsp;
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Women Shoes &nbsp;
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kids Shoes &nbsp;
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Formal Shoes &nbsp;
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Top Brands &nbsp;
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
            <li><a href="#!"> Barnd Name</a></li>
        </ul>
      </li>
      <li><a href="#!">Products</a></li>
      <li><a href="#!">Services</a></li>
      <li><a href="#!">Gallery</a></li>
      <li><a href="#!">Branches</a></li>
    </ul>
  </div>
</nav>
<!-- End menu bar -->

<!----- Start Slider (or) Banner ------>
<div class="row">
    <div class="slider">
       <div class="slider-padding">
            <div style="padding-top:30px;"><a href="#" class="btn"><i class="fa fa-android"></i>&nbsp;get our adroid app</a></div>
       </div>
    </div>
</div>
<!----- End Slider (or) Banner ------>

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
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Subscribe Now">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn_search"><i class="fa fa-search"></i></button>
                    </span>
                </div><br />
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="copyrights">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="copyrights-left">
            &copy; <?php echo date('Y') ?>. All rights reserved by <a href="http://www.cremohair.com" target="_blank">Cremohair</a>.
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="copyrights-right">
                Designed by <a href="http://www.freetimelearning.com" target="_blank">Cremohair</a>
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

</script>
</body>
</html>