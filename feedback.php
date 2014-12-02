<?php
session_start(); 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Feedback </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/le-style.css" rel="stylesheet">
    <link rel="shortcut icon" href="ico/favicon.png">
  </head>

  <body>
<div class="span11 offset1">
  <?php
  include("header_nav.php"); ?>
<body>

    <div class="content" >
      <h2 class="feedback-heading">Our customers feedback </h2>
      <?php 
            include("scr/base.php");
            $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");
    
            $query = <<<EOT
            SELECT * FROM feedback ORDER BY date DESC;
EOT;
            $query_handle = $db->execute_query($query);
            if (!$query_handle) {
              echo "<p> failed to execute query select from feedback. Reason is probably written above</p>";
              exit();
            }
            while ($results = mysql_fetch_array($query_handle, MYSQL_NUM)) { 
            echo '
                  <div class="container feedback">
                    <h2 class="feedback-heading ">'.$results[3].':<br> <span class="muted pull-right">'.$results[4].'</span></h2>
                  </div><br>';
            }
            if (mysql_num_rows($query_handle) == 0) {
              echo '<div class="alert alert fade in">  
                      <a class="close" data-dismiss="alert">×</a>  
                      <strong>Empty. </strong>There are no feedback entries.  
                    </div>';
              exit;
            }
          ?>
          <a href="leave_feedback.php">Click here to leave your feedback</a>
  </div> <!-- /container -->
      <!-- FOOTER --><?php include("footer.php"); ?>
  </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    </script>

  </body>

</html>
