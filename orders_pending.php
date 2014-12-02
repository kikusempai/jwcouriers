<?php
session_start(); 
include("scr/base.php"); 
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Orders pending</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  </head>

  <body>

<div class="span11 offset1">
<?php
  include("header_nav.php");
?>  
<br>
  <div class="content">
    <div class="container">
      <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");

    $query = <<<EOT
      UPDATE `order` SET `status` = '{$_REQUEST["status"]}', `price` = '{$_REQUEST["price"]}', `estimateddod` = '{$_REQUEST["estimateddod"]}' 
      WHERE `id` = '{$_REQUEST["id"]}';
EOT;

    $query_handle = $db->execute_query($query);
    if (!$query_handle) {
      echo "<p> fail to execute UPDATE query </p>";
      exit();
    } else {
      echo '<div class="alert alert-success">  
              <a class="close" data-dismiss="alert">x</a>  
              <strong>Success!</strong>You have successfully updated this order.  
            </div>';
    }
  }
?>
      <h3>Pending orders</h3>
      <?php
        $db1 = new Mysql_DB("localhost", "root", NULL, "couriersdb");

        $userdataq=<<<EOT
          SELECT * FROM `order` WHERE `status` = 'pending';
EOT;
        $querydata_handle = $db1->execute_query($userdataq);
        echo '<table class="table table-striped table-bordered table-condensed zebra-striped table-feedback">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sender town</th>
                        <th>Sender address</th>
                        <th>Sender postcode</th>
                        <th>Receiver town</th>
                        <th>Receiver address</th>
                        <th>Receiver postcode</th>
                        <th>Receiver info</th>
                        <th>Type</th>
                        <th>Weight</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>CollectDate</th>
                        <th>Estimated Delivery</th>
                        <th>Details</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody> ';
        while ($results = mysql_fetch_array($querydata_handle, MYSQL_NUM)) { 
            echo '
                  <tr>
                        <th>'.$results[0].'</th>
                        <th>'.$results[2].'</th>
                        <th>'.$results[3].'</th>
                        <th>'.$results[4].'</th>
                        <th>'.$results[5].'</th>
                        <th>'.$results[6].'</th>
                        <th>'.$results[7].'</th>
                        <th>'.$results[8].'</th>
                        <th>'.$results[9].'</th>
                        <th>'.$results[10].'</th>
                        <th>'.$results[11].'</th>
                        <th>'.$results[12].'</th>
                        <th>'.$results[13].'</th>
                        <th>'.$results[14].'</th>
                        <th>'.$results[15].'</th>
                        <th><a href="update_order.php?id='.$results[0].'" role="button" class="btn">Edit</a></th>
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
            echo '<div class="accordion-group table-feedback">
                            <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                              All orders
                              </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse">
                              <div class="accordion-inner">';
                              $userdataq=<<<EOT
                              SELECT * FROM `order`;
EOT;
                              $querydata_handle = $db1->execute_query($userdataq);
                              echo '<table class="table table-striped table-bordered table-condensed zebra-striped acco">
                                      <thead>
                                          <tr>
                                              <th>ID</th>
                                              <th>Sender town</th>
                                              <th>Sender address</th>
                                              <th>Sender postcode</th>
                                              <th>Receiver town</th>
                                              <th>Receiver address</th>
                                              <th>Receiver postcode</th>
                                              <th>Receiver info</th>
                                              <th>Type</th>
                                              <th>Weight</th>
                                              <th>Status</th>
                                              <th>Price</th>
                                              <th>CollectDate</th>
                                              <th>Estimated Delivery</th>
                                              <th>Details</th>
                                          </tr>
                                      </thead>
                                      <tbody> ';
                              while ($results = mysql_fetch_array($querydata_handle, MYSQL_NUM)) { 
                                  echo '
                                        <tr>
                                              <th>'.$results[0].'</th>
                                              <th>'.$results[2].'</th>
                                              <th>'.$results[3].'</th>
                                              <th>'.$results[4].'</th>
                                              <th>'.$results[5].'</th>
                                              <th>'.$results[6].'</th>
                                              <th>'.$results[7].'</th>
                                              <th>'.$results[8].'</th>
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
                                    </table>
                              </div>
                            </div>
                  </div>';
      ?>
    </div>
  </div>
      <!-- FOOTER --><?php include("footer.php"); ?>
    </div><!-- /.container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
  </body>
</html>
