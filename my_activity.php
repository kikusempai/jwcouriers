<?php
session_start();
include("scr/base.php"); 
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; My activity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/datepicker.css" rel="stylesheet">
  </head>

  <body>

<div class="span11 offset1">
<?php
  include("header_nav.php");
  ?>  

  <br><br>
  <div class="content">
    <div class="container">
      <?php
        $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");

        $userdataq=<<<EOT
          SELECT * FROM `order` WHERE `userid` = '{$_SESSION['userid']}';
EOT;
        $querydata_handle = $db->execute_query($userdataq);
        echo '<table class="table table-striped table-bordered table-condensed zebra-striped table-feedback">
                <thead>
                    <tr>
                        <th width="3%">Number</th>
                        <th width="12%">Sender address</th>
                        <th width="7%">Receiver info</th>
                        <th width="12%">Receiver address</th>
                        <th width="5%">Type</th>
                        <th width="5%">Weight</th>
                        <th width="4%">Status</th>
                        <th width="5%">Price</th>
                        <th width="7%">CollectDate</th>
                        <th width="7%">Estimated DoD</th>
                        <th width="10%">Details</th>
                    </tr>
                </thead>
                <tbody> ';
        while ($results = mysql_fetch_array($querydata_handle, MYSQL_NUM)) { 
            echo '
                  <tr>
                        <th>'.$results[0].'</th>
                        <th>'.$results[2].'<br>'.$results[3].'<br>'.$results[4].'</th>
                        <th>'.$results[8].'</th>
                        <th>'.$results[5].'<br>'.$results[6].'<br>'.$results[7].'</th>
                        <th>'.$results[9].'</th>
                        <th>'.$results[10].'</th>
                        <th>'.$results[11].'</th>
                        <th>'.$results[12].'</th>
                        <th>'.$results[13].'</th>
                        <th>'.$results[14].'</th>
                        <th>'.$results[15].'</th>                        
                  </tr>';
            }
            echo '</tbody>
              </table>';
            if (mysql_num_rows($querydata_handle) == 0) {
              echo '<div class="alert alert fade in">  
                      <a class="close" data-dismiss="alert">x</a>  
                      <strong>Empty. </strong>There are no orders.  
                    </div>';
              exit;
            }
      ?>
    </div>
  </div>


      <!-- FOOTER -->
      <?php include('footer.php'); ?>
    </div><!-- /.container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
</script>
  </body>
</html>
