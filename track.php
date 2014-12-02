<?php
session_start();
include("scr/base.php"); 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Track</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/le-style.css" rel="stylesheet">
  </head>

  <body>


<div class="span11 offset1">
  <?php
  include("header_nav.php");
  ?>
    <div class="content">
      <form name="track" action="track.php" method="post">
        <legend>Track</legend>
        <input type="text" width="30%" placeholder="Enter your tracking number" name="number"><br>
        <button type="submit" text="Track">Track</button>
      </form>
<?php
    // here we output the tracking info---------------------------------

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    track_me();
  }
    function track_me() {

    $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");

    $userdataq=<<<EOT
      SELECT * FROM `position` WHERE `parcelnumber` = '{$_REQUEST["number"]}' ORDER BY `date` DESC;
EOT;
    $querydata_handle = $db->execute_query($userdataq);
    if (mysql_num_rows($querydata_handle) == 0) {
              echo '<div class="alert alert fade in">  
                      <a class="close" data-dismiss="alert">x</a>  
                      <strong>Empty. </strong>There is on information on parcel with this number.  
                    </div>
                    </div>';include("footer.php");
              echo'</div>';
              exit;
            }
    if (!$querydata_handle) {
      echo "<p> fail to execute select quiery </p>";
      exit();
    } else {echo '<h3>Order #'.$_REQUEST["number"].'</h3>
                <table class="table table-striped table-bordered table-condensed zebra-striped table-track">
                <thead>
                    <tr>
                        <th width="20%">Date</th>
                        <th width="40%">Loction</th>
                        <th width="40%">Status</th>
                    </tr>
                </thead>
                <tbody> ';
        while ($results = mysql_fetch_array($querydata_handle, MYSQL_NUM)) { 
            echo '
                  <tr>
                        <th>'.$results[2].'</th>
                        <th>'.$results[3].'</th>
                        <th>'.$results[4].'</th>                        
                  </tr>';
            }
            echo '</tbody>
              </table>'; 
        } 
    }
  ?>
  </div>
      <!-- FOOTER -->
     <?php include('footer.php'); ?>

</div><!-- /.container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
  </body>
</html>
