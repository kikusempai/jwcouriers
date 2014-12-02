<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/le-style.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="ico/favicon.png">
  </head>

  <body>


<!--<div class="span11 offset1"> -->
      
     <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/slide-01.jpg" alt="join us">
          <div class="container">
            <div class="carousel-caption">
              <h1>Quick and safe</h1>
              <p class="lead">Our delivery proved safe and quick so we are happy to suggest our service to you</p>
              <a class="btn btn-large btn-primary" href="register.php">Sign up today</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/slide-02.jpg" alt="join us">
          <div class="container">
            <div class="carousel-caption">
              <h1 >Are you satisfied?</h1>
              <p class="lead">We always improve our service by taking into account customers feedback. Can't believe this? See it yourself</p>
              <a class="btn btn-large btn-primary" href="feedback.php">I want to see</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/slide-03.jpg" alt="join us">
          <div class="container">
            <div class="carousel-caption">
              <h1>We deliver almost everything</h1>
              <p class="lead">As independent company we provide delivery of wide range of parcels so you can afford more</p>
              <a class="btn btn-large btn-primary" href="index.php#serv">Our services</a>
            </div>
          </div>
        </div>
      </div>
      <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a> -->
    </div><!-- /.carousel -->



       <!-- NAVBAR
    ================================================== -->
    <div class="navbar-wrapper">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.php">J.W.Couriers</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="track.php">Track</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <?php
                  if($_SESSION['email']) 
                  {
                    echo '<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="make_order.php">Make order</a></li>
                              <li><a href="my_active_orders.php">My active orders</a></li>
                              <li><a href="my_activity.php">My Activity</a></li>
                              <li><a href="edit_account.php">Change account details</a></li>
                              <li><a href="leave_feedback.php">Leave feedback</a></li>
                            </ul>
                          </li>';
              
                  } else 
                    { /* if not logged in it will redirect to login page*/
                      echo '<li class="dropdown"> 
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">My account <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="login.php">Make order</a></li>
                                <li><a href="login.php">Active orders</a></li>
                                <li><a href="login.php">My Activity</a></li>
                                <li><a href="login.php">Change account details</a></li>
                                <li><a href="login.php">Leave feedback</a></li>
                              </ul>
                          </li>';
                    }
                ?>               
                <li><a href="support.php">Support</a></li>
                <?php
                  if($_SESSION['email']=="admin@power.com") 
                  {
                    echo '<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="orders_pending.php">Orders pending</a></li>
                              <li><a href="update_tracking.php">Update tracking information</a></li>
                            </ul>
                          </li>';
              
                  }
                  if($_SESSION['email']) 
                  {
                    echo '<li class="pull-right"><a href="logout.php">Log out</a></li>';
                  }
                    else
                    {
                      echo '<li class="pull-right"><a href="login.php">Log in</a></li>
                            <li><a href="register.php">Register</a></li>';
                    } 
                ?>               
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->


<!-- </div> -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $("#myCarousel").carousel()
        })
      }(window.jQuery)
    </script>
  </body>
</html>
';
?>
