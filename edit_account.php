<?php
session_start(); 
include("scr/base.php");
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Edit account</title>
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
    <?php
    // update settings

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    update_that();
  }
    function update_that() {

    $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");

    $userdataq=<<<EOT
      Update user SET email = '{$_REQUEST["email"]}', name = '{$_REQUEST["name"]}', surname = '{$_REQUEST["surname"]}',
      street = '{$_REQUEST["street"]}', town = '{$_REQUEST["town"]}', postcode = '{$_REQUEST["postcode"]}', phone = '{$_REQUEST["phone"]}',
      password = '{$_REQUEST["password"]}' where email = '{$_SESSION['email']}';
EOT;
    $querydata_handle = $db->execute_query($userdataq);
    if (!$querydata_handle) {
      echo "<p> fail to execute update quiery </p>";
      exit();
    } else {
      echo '<br><br><div class="alert alert-success">  
              <a class="close" data-dismiss="alert">x</a>  
              <strong>Success!</strong>You have successfully updated your account settings.              
            </div> </div>
            <a href="my_activity.php">Go to My activity page</a>';
            include("footer.php");
            exit;
    }
  }

?>
    <div class="container">
      <?php
        $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");

        $userdataq=<<<EOT
          SELECT * FROM `user` WHERE `email` = '{$_SESSION['email']}';
EOT;
        $querydata_handle = $db->execute_query($userdataq);
        $results = mysql_fetch_array($querydata_handle);
        echo '
        <form id="edit" class="form-horizontal" method="post" action="edit_account.php">
          <legend>Account information</legend>      
            <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-envelope"></i></span>
                  <input type="text" class="input-xlarge" id="email" name="email" value="'.$results[1].'"> 
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">First Name</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  <input type="text" class="input-xlarge" id="name" name="name" value="'.$results[2].'">
                </div>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Last Name</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" class="input-xlarge" id="surname" name="surname" value="'.$results[3].'" >
                  </div>
                </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Street address</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" class="input-xlarge" id="street" name="street" value="'.$results[4].'" >
                  </div>
                </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Town</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" class="input-xlarge" id="town" name="town" value="'.$results[5].'" >
                  </div>
                </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Postcode</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  <input type="text" class="input-xlarge" id="postcode" name="postcode" value="'.$results[6].'" >
                </div>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Phone number (just in case)</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  <input type="text" class="input-xlarge" id="phone" name="phone" value="'.$results[7].'" >
                </div>
              </div>
            </div>    
            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-lock"></i></span>
                  <input type="Password" id="passwd" class="input-xlarge" name="password">
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <button type="submit" class="btn btn-success" >Update account information</button>
              </div>
            </div>
        </form>';
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
