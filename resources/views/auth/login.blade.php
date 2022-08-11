
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
<body>
<!--end of sidebar of orders-->
<div class="container-fluid">
<div class="main_shadow">
<!-- Start Header -->
<div class="row main_header">
    <div class="col-md-3 col-sm-3 col-xs-12 logo" align="center">
        <a href="http://cremohair.herokuapp.com/" target="_blank"><img src="images/logo.png" class="img-responsive" alt="Logo"></a>                   
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
                        
                            <ul>
                                <li  align="center" data-toggle="modal" data-target="#login_model"><a href="#"><i class="fa  fa-user"></i> Login / Sign up</a></li>
                                </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="header-right-bottom">
                      
                            <i class="fa fa-cart-plus cart_size"></i> &nbsp; 
                            <span class="badge badge-danger" style="margin-top:-30px;margin-left:-10px;">0</span><p>Shopping cart</p>
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
      
    </ul>
  </div>
</nav>
<!-- End menu bar -->

<main>
                <br>
                <br>
                <br>
    


             <div id="loginform">
                    <form action="{{route('adminLoginPost') }}" method="POST">
                        {!! csrf_field() !!}

                         @if(\Session::get('error'))
                            <span style="color: red;">{{ \Session::get('error')}}</span>
                        @endif
                         
                        <span style="color: red;"> @error('email') {{ $message }}@enderror</span>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                        
                        </div>
                        
                        <span style="color: red;">@error('password') {{ $message }}@enderror</span>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                                                   
                        </div>

                        <div class="row">
                            
                            <div class="col-md-4">
                                <button type="submit" name="login" class="btn btn-primary btn-block" id="loginbtn">Login</button>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="float-right">Forgot password</a>
                            </div>
                            <div class="col-md-4">
                            <a href="#" id="signup" onclick="showregisterformfn()">Create account .</a>
                            </div>
                        </div>      

                    </form>
                </div>
                <br>
                <br>
                <br>
                <div id="registerform">
                <form action="{{route('CustomerCreateAccount')}}" method="POST">
                    {!! csrf_field() !!}

                     @if(\Session::get('register_error'))
                        <span class="text-danger">{{ \Session::get('register_error')}}</span>
                     @endif
                    <span class="text-danger"> @error('name') {{ $message }}@enderror</span>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="name">
                    </div>

                    <span class="text-danger"> @error('email') {{ $message }}@enderror</span>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                    
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span style="color:red;">@error('password') {{ $message }}@enderror</span>                       
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Re_enter password">
                        <span style="color:red;">@error('password_confirmation') {{ $message }}@enderror</span>                     
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" name="register" class="btn btn-primary" id="registerbtn">Register</button>
                            <button type="submit" name="register" id="registerbtn" style="z-index: 99;">Cool</button>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="float-right" id="signin" onclick="showloginformfn()">Already have an account.</a>
                        </div>
                    </div>      

                </form>

                </div>

    <script>

        document.getElementById('registerform').style.display='none';

        function showregisterformfn(){
            document.getElementById('loginform').style.display='none';
            document.getElementById('signup').style.display='none';  
            document.getElementById('registerform').style.display='block';          
        }

        function showloginformfn(){
            document.getElementById('loginform').style.display='block';
            document.getElementById('signup').style.display='block';  
            document.getElementById('registerform').style.display='none';          
        }

        $(document).ready(function() {
          $('#loginbtn').on('click touchstart', function() {
            window.location.href = "/url";
          });
        });
    </script>

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
            &copy; <?php echo date('Y') ?>. All rights reserved by <a href="http://cremohair.herokuapp.com/" target="_blank">Cremohair</a>.
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