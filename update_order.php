<?php
session_start(); 
include("scr/base.php");
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Update order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
  </head>

  <body>

<div class="span11 offset1">
<?php
  include("header_nav.php");
  ?>  
<br>
  <div class="content">
    <div class="container">
      <h3>Edit order</h3>
      <?php

    $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");

    $userdataq=<<<EOT
      SELECT * from `order` WHERE `id` = '{$_REQUEST["id"]}';
EOT;
    $querydata_handle = $db->execute_query($userdataq);
    if (!$querydata_handle) {
      echo "<p> fail to execute select quiery </p>";
      exit();
    } else {
      $results = mysql_fetch_array($querydata_handle);
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
                        <th>CollectDate</th>
                    </tr>
                </thead>
                <tbody> 
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
                        <th>'.$results[13].'</th>                        
                  </tr></tbody>
              </table>';
      echo '<form id="update" class="form-horizontal" method="post" action="orders_pending.php">
          <legend>Order details</legend>      
            <div class="control-group">
              <label class="control-label">Status</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-envelope"></i></span>
                  <input type="text" class="input-xlarge" id="status" name="status">
                </div>
              </div>
            </div>      
            <div class="control-group">
              <label class="control-label">Price</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-envelope"></i></span>
                  <input type="text" class="input-xlarge" id="price" name="price">
                </div>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Estimated Date of Delivery</label>
                  <div class="controls">
                    <div class="input-append date form_datetime">
                      <input name="estimateddod" size="20" type="text" value="" readonly>
                      <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                   
                    <script type="text/javascript">
                        $(".form_datetime").datetimepicker({
                            format: "dd-mm-yyyy - hh:ii",
                            autoclose: true,
                            todayBtn: true,
                            pickerPosition: "top-right"
                        });
                    </script> 
                </div>
            </div> 
            <input type="hidden" class="input-xlarge" id="status" name="id" value="'.$results[0].'">
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <button type="submit" class="btn btn-success" >Update</button>
              </div>
            </div>
        </form>';
    }

?>
   </div>
    </div><!-- /.container -->
      <!-- FOOTER --><?php include("footer.php"); ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
    //in this line of code, to display the datetimepicker,  we used ‘form_datetime’ as an argument to be 
    //passed in javascript. This is for Date and Time.
        $('.form_datetime').datetimepicker({
            language:  'en',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
    </script>
  </body>
</html>
