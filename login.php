<?php
session_start(); 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Log In Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
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
<div class="span11 offset1">';
  <?php
  include("header_nav.php"); ?>
<body>

    <div class="content">
    <form id="signup" class="form-horizontal" method="post" action="login_action.php">
          <legend>Sign In</legend>      
            <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-envelope"></i></span>
                  <input type="text" class="input-xlarge" id="email" name="email" placeholder="Email" >
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-lock"></i></span>
                  <input type="Password" id="passwd" class="input-xlarge" name="password" placeholder="Password">
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <button type="submit" class="btn btn-success">Sign in</button>
              </div>
            </div>
        </form>
        <!-- <a href="restore_password.php">Forgot your password?</a> -->

    </div> <!-- /container -->
      <!-- FOOTER --><?php include("footer.php"); ?>
  </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>

  </body>

</html>
