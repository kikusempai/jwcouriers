<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Leave feedback</title>
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
<div class="span11 offset1">
  <?php
  include("header_nav.php"); ?>
<body>

    <div class="content">
<?php
if (!isset($_SESSION['email'])) {
  echo '<div class="alert alert fade in">  
              <a class="close" data-dismiss="alert">x</a>  
              <strong>Attention. </strong>You have to log in before leaving feedback.  
            </div>
        <a href="login.php">Log in</a>';
        exit();
      }
  ?>

    <div class="container">
  <div class="row">
    <div class="span8">
      <div class="well" >
        <form id="leave" class="form-horizontal" method="post" action="leave_feedback.php">
          <legend>Leave feedback</legend>      
            <div class="control-group">
              <label class="control-label">Your text</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-envelope"></i></span>
                  <textarea class="input-xlarge" rows="5" cols="70" id="text" name="text" placeholder="Feedback text"></textarea>
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <button type="submit" class="btn btn-success" >Submit feedback</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
      
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    submit_fb();
  }


  function submit_fb() {

    include("scr/base.php");
  
    $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");
    $query = <<<EOT
      INSERT INTO feedback VALUES ( NULL, '{$_SESSION["userid"]}',NULL,'{$_SESSION["username"]}','{$_REQUEST["text"]}', "unconfirmed");
EOT;

    $query_handle = $db->execute_query($query);
    if (!$query_handle) {
      echo "<p> fail to execute insert quiery </p>";
      exit();
    } else {
      echo '<div class="alert alert-success">  
              <a class="close" data-dismiss="alert">×</a>  
              <strong>Success!</strong>You have successfully submitted your feedback.  
            </div>';
    }
  }
?>
    </div> <!-- /container -->
<!-- FOOTER --><?php include("footer.php"); ?>
  </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>

  </body>

</html>
