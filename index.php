<?php
session_start(); 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet"><!-- 
    <link href="css/bootstrap-responsive.css" rel="stylesheet"> -->
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


<div class="span11 offset1">
  <?php
  include("header_nav.php");
  ?>
<div class="map content">
        <!-- START THE FEATURETTES -->
      <div class="featurette">
        <h2 class="featurette-heading">Coverage area. <span class="muted">North Wales</span></h2>
        <p class="lead feat"> Our service cover following towns: Wrexham, Mold, Oswestry, Llangollen, Malpas, Whitchurch, Welshpool, Chester, Ruthin, Conwy, Bangor, Shrewsbury, Rhyl, Telford, Bala, Denbigh, Newtown</p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-left" src="img/car.png">
        <h2 class="featurette-heading">Our services</h2>
        <p class="lead">
                           &middot; Independent local courier<br>
                           &middot; Same day specialist<br>
                           &middot; Local & nationwide<br>
                           &middot; Parcels to small pallets<br>
                           &middot; Personal door to door service<br>
                           &middot; Goods in transit insurance<br></p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette"><a name="serv"></a>
        <img class="featurette-image pull-right" src="img/courier.png">
        <h2 class="featurette-heading">How does it work? <span class="muted">Join us to experience quality delivery</span></h2>
        <p class="lead"> In addition to the normal collection and delivery of standard parcels, we specialise on legal documents, urgent medical supplies, sensitive material, valuable cargo, hazardous loads, contract work, etc. </p>
      </div>
  </div>
<!-- FOOTER --><?php include("footer.php"); ?>
    </div><!-- /.container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>    
  </body>
</html>
