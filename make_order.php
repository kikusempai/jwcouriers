<?php
session_start();
include("scr/base.php"); 
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Book order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
  </head>

  <body>

<div class="span11 offset1">
<?php
  include("header_nav.php");
  ?>  

<br><br>
<div class="content">
<div class="container">
  <div class="row">
    <div class="span8 offset1">
      <div class="well" >
        <form id="requwst" class="form-horizontal" method="post" action="make_order.php">
          <legend>Provide order details please</legend>      
            <div class="control-group">
              <label class="control-label">Sender street address</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-envelope"></i></span>
                  <input type="text" class="input-xlarge" id="sourcestreet" name="sourcestreet" placeholder="Street">
                </div>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Sender Town</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                      <select name="sourcetown" id="sourcetown">
                        <option value="Bala"> Bala</option>
                        <option value="Bangor"> Bangor</option>
                        <option value="Chester"> Chester</option>
                        <option value="Conwy"> Conwy</option>
                        <option value="Denbigh"> Denbigh</option>
                        <option value="Llangollen"> Llangollen</option>
                        <option value="Malpas"> Malpas</option>
                        <option value="Mold"> Mold</option>
                        <option value="Newtown"> Newtown</option>
                        <option value="Oswestry"> Oswestry</option>
                        <option value="Rhyl"> Rhyl</option>
                        <option value="Ruthin"> Ruthin</option>
                        <option value="Shrewsbury"> Shrewsbury</option>
                        <option value="Telford"> Telford</option>
                        <option value="Welshpool"> Welshpool</option>
                        <option value="Whitchurch"> Whitchurch</option>
                        <option value="Wrexham"> Wrexham</option>
                        </select>  <br>
                  </div>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Receiver street address</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-envelope"></i></span>
                  <input type="text" class="input-xlarge" id="deststreet" name="deststreet" placeholder="Street">
                </div>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Receiver Town</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                      <select name="desttown" id="desttown">
                        <option value="Bala"> Bala</option>
                        <option value="Bangor"> Bangor</option>
                        <option value="Chester"> Chester</option>
                        <option value="Conwy"> Conwy</option>
                        <option value="Denbigh"> Denbigh</option>
                        <option value="Llangollen"> Llangollen</option>
                        <option value="Malpas"> Malpas</option>
                        <option value="Mold"> Mold</option>
                        <option value="Newtown"> Newtown</option>
                        <option value="Oswestry"> Oswestry</option>
                        <option value="Rhyl"> Rhyl</option>
                        <option value="Ruthin"> Ruthin</option>
                        <option value="Shrewsbury"> Shrewsbury</option>
                        <option value="Telford"> Telford</option>
                        <option value="Welshpool"> Welshpool</option>
                        <option value="Whitchurch"> Whitchurch</option>
                        <option value="Wrexham"> Wrexham</option>
                        </select>  <br>
                  </div>
                </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Receiver postcode</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  <input type="text" class="input-xlarge" id="destpostcode" name="destpostcode" placeholder="Postcode" >
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Receiver name and surname</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  <input type="text" class="input-xlarge" id="recipient" name="recipient" placeholder="Receiver">
                </div>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Parcel type</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                      <select name="type" id="type">
                        <option value="Usual"> Usual</option>
                        <option value="Documents"> Documents</option>
                        <option value="Urgent Medical"> Urgent Medical</option>
                        <option value="Sensetive"> Sensetive</option>
                        <option value="Valuable"> Valuable</option>
                        <option value="Hazardous"> Hazardous</option>
                        </select>  <br>
                  </div>
                </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Approximate parcel weight</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  <input type="text" class="input-xlarge" id="weight" name="weight" placeholder="Weight" >
                </div>
              </div>
            </div>    
            <div class="control-group">
                <label class="control-label">Required date of collection</label>
                  <div class="controls">
                    <div class="input-append date form_datetime">
                      <input name="collactiondate" size="20" type="text" value="" readonly>
                      <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                   
                    <script type="text/javascript">
                        $(".form_datetime").datetimepicker({
                            format: "dd-mm-yyyy",
                            autoclose: true,
                            todayBtn: true,
                            pickerPosition: "top-right"
                        });
                    </script> 
                </div>
            </div>   
            <div class="control-group ">
              <label class="control-label">Provide some details for the officer</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <textarea class="input-xlarge" rows="5" cols="70" id="details" name="details" placeholder="Details"></textarea>
                  </div>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <button type="submit" class="btn btn-success" >Book order</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    // registering new user

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    make_order();
  }
    function make_order() {

    $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");

    $userdataq=<<<EOT
      SELECT  * FROM user where email = '{$_SESSION['email']}';
EOT;
    $querydata_handle = $db->execute_query($userdataq);
    $results = mysql_fetch_array($querydata_handle);
    $userid = $results[0];$usercode = $results[6];
    $pending = "pending";
    $query = <<<EOT
      INSERT INTO `couriersdb`.`order` VALUES ( NULL, '{$userid}', '{$_REQUEST["sourcetown"]}','{$_REQUEST["sourcestreet"]}','{$usercode}',
        '{$_REQUEST["desttown"]}','{$_REQUEST["deststreet"]}','{$_REQUEST["destpostcode"]}', '{$_REQUEST["recipient"]}', '{$_REQUEST["type"]}',
         '{$_REQUEST["weight"]}', '{$pending}', NULL, '{$_REQUEST["collectdate"]}', NULL, '{$_REQUEST["details"]}');
EOT;

    $query_handle = $db->execute_query($query);
    if (!$query_handle) {
      echo "<p> fail to execute insert quiery </p>";
      exit();
    } else {
      echo '<br><div class="alert alert-success">  
              <a class="close" data-dismiss="alert">×</a>  
              <strong>Success!</strong>You have successfully booked the order. Our officer will calculate the price and confirm your order.  
            </div>';
    }
  }

?>
      
</div><!-- FOOTER --><?php include("footer.php"); ?>
    </div><!-- /.container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <!-- <script src="js/bootstrap-datetimepicker.min.js"></script> -->
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
