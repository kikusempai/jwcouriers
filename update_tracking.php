<?php
session_start();
include("scr/base.php"); 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Update tracking information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/le-style.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
  </head>

  <body>


<div class="span11 offset1">
  <?php
  include("header_nav.php");
  ?>
    <div class="content">
      <h3> Update parcel tracking information </h3>
      <form id="update" class="form-horizontal" method="post" action="update_tracking.php">    
            <div class="control-group">
              <label class="control-label">Parcel Number</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="parcelnumber" name="parcelnumber" placeholder="Parcel Number">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Date</label>
                  <div class="controls">
                    <div class="input-append date form_datetime">
                      <input name="date" size="20" type="text" value="" readonly>
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
            <div class="control-group">
              <label class="control-label">Location</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="location" name="location" placeholder="Location">
                </div>
              </div>    
            <div class="control-group">
              <label class="control-label">Status</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="status" name="status" placeholder="Status">
                </div>
              </div>
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <button type="submit" class="btn btn-success" >Submit position</button>
              </div>
            </div>
        </form> 
        <br><br>
<!-- -=======================================Here we output existing parcels positioning data -->
        <h3> Existing parcels location data </h3>

        <?php
          $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");

          $userdataq=<<<EOT
            SELECT `id` FROM `order` ORDER BY `id` DESC; 
EOT;
          $querydata_handle = $db->execute_query($userdataq); // here we select id's of existing parcels
          if (mysql_num_rows($querydata_handle) == 0) { // if there are no parcels at all
                    echo '<div class="alert alert fade in">  
                            <a class="close" data-dismiss="alert">x</a>  
                            <strong>Empty. </strong>There is no information.  
                          </div>
                          </div>';include("footer.php");
                    echo'</div>';
                    exit;
                  }
          if (!$querydata_handle) {
            echo "<p> fail to execute select order quiery </p>"; //if something went wrong
            exit();
          } else {
                  echo '<div class="accordion sup" id="accordion2">'; //we have orders so let's put accordion header
                  $i = 0; //this number will be index for accordions
                  while ($results = mysql_fetch_array($querydata_handle, MYSQL_NUM)) { //while we have existing orders we print accordion
                    $i++;
                    echo '<div class="accordion-group">
                            <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$i.'">
                              Parcel #'.$results[0].'
                              </a>
                            </div>
                            <div id="collapse'.$i.'" class="accordion-body collapse">
                              <div class="accordion-inner">'; //here we put a table of parcel postitons
                     echo '<table class="table table-striped table-bordered table-condensed zebra-striped table-track">
                          <thead>
                              <tr>
                                  <th width="20%">Date</th>
                                  <th width="40%">Location</th>
                                  <th width="40%">Status</th>
                              </tr>
                          </thead>
                          <tbody> ';
                          $user=<<<EOT
                            SELECT * FROM `position` WHERE `parcelnumber` = '{$results[0]}' ORDER BY `date` DESC; 
EOT;
                          $querydata_handle1 = $db->execute_query($user); // here we select positions of current parcel
                          if (mysql_num_rows($querydata_handle1) == 0) { // if there are no parcels positions
                            echo '<div class="alert alert fade in">  
                                    <a class="close" data-dismiss="alert">x</a>  
                                    <strong>Empty. </strong>There is no information about this parcel. 
                                  </div>';
                          }
                          if (!$querydata_handle) {
                            echo "<p> fail to execute select order quiery </p>"; //if something went wrong
                            exit();
                          } else {
                            while ($results = mysql_fetch_array($querydata_handle1, MYSQL_NUM)) { //while we have existing positions we print rows
                          echo ' 
                                <tr>
                                      <th>'.$results[2].'</th>
                                      <th>'.$results[3].'</th>
                                      <th>'.$results[4].'</th>                        
                                </tr>';
                          }
                          echo '</tbody>
                    </table>
                  </div>
                </div>
              </div>'; 
              } 
          } //end WHILE parcels
        } // ENDif
        ?>

      </div>
<?php
    // here we add new position---------------------------------

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    submit_pos();
  }
    function submit_pos() {

     $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");
     $the_date = $_REQUEST["date"] .':00';
    $query2 = <<<EOT
      INSERT INTO position VALUES ( NULL, '{$_REQUEST["parcelnumber"]}','{$the_date}', '{$_REQUEST["location"]}','{$_REQUEST["status"]}');
EOT;

    $query_handle2 = $db->execute_query($query2);
    if (!$query_handle2) {
      echo "<p> fail to execute insert quiery </p>";
      exit();
    } else {
      echo '<div class="alert alert-success">  
              <a class="close" data-dismiss="alert">x</a>  
              <strong>Success!</strong>You have successfully submitted new position.  
            </div>';
    }
  }
?>

</div><!-- /.container -->
      <!-- FOOTER -->
     <?php include('footer.php'); ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
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
