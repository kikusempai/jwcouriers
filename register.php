<?php
session_start();
  include("scr/base.php"); 
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  </head>

  <body>

<div class="span11 offset1">
<?php
  include("header_nav.php");
  ?>  

  <script type="text/javascript">
    function erase_icon(){
      document.getElementById("check_login").src = 'img/blank.png';
    }

    function checkLogin(url){
      
        var request;
        if(window.XMLHttpRequest){ 
            request = new XMLHttpRequest(); 
        } else if (window.ActiveXObject) { 
            request = new ActiveXObject("Microsoft.XMLHTTP");  
        } else { 
              // may output smth
            alert('error while creating ActiveXObject/XMLHttpRequest');
            return; 
        } 
        var address = document.getElementById('email').value; //----------------------------check email spelling----------------------------------------
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var spelling = re.test(address);
          // setting respond handling function 
        request.onreadystatechange = function() {
            if (request.readyState == 4){
                if(request.status==200){
                    // processing results
                  if ((request.responseText == 'true')||(!spelling))
                  document.getElementById("check_login").src = 'img/cross.png';
                  else
                  document.getElementById("check_login").src = 'img/tick.png';
              }
              else 
                if(request.status==404){
                    alert("Error: Script is not found");
                }
                  else 
                    alert("Error: server status: "+ request.status);
            }       
        } 
        var login = document.getElementById('email').value;
        request.open("POST",url, true);
      request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      request.send("login=" + login); 
      } 

 </script>
<br><br>
<div class="content">
<div class="container">
  <div class="row">
    <div class="span8 offset2">
      <div class="well" >
        <form id="signup" class="form-horizontal" method="post" action="register.php">
          <legend>Sign Up</legend>      
            <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-envelope"></i></span>
                  <input type="text" class="input-xlarge" id="email" name="email" placeholder="Email" onFocus="erase_icon()" onBlur="checkLogin('scr/check_login.php')"><!-- checkEmail()"> --> 
                  <img id="check_login" src="img/blank.png"></span>
                  <label id="wrong_email" class="hidden">That is not correct email</label>
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">First Name</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  <input type="text" class="input-xlarge" id="name" name="name" placeholder="First Name">
                </div>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Last Name</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" class="input-xlarge" id="surname" name="surname" placeholder="Last Name" >
                  </div>
                </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Street address</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" class="input-xlarge" id="street" name="street" placeholder="Street and building" >
                  </div>
                </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Town</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" class="input-xlarge" id="town" name="town" placeholder="City/Town" >
                  </div>
                </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Postcode</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  <input type="text" class="input-xlarge" id="postcode" name="postcode" placeholder="Postcode" >
                </div>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Phone number (just in case)</label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  <input type="text" class="input-xlarge" id="phone" name="phone" placeholder="Telephone No" >
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
                <button type="submit" class="btn btn-success" >Create My Account</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
      <!-- FOOTER -->
      <?php include('footer.php'); ?>
    </div><!-- /.container -->

<?php
    // registering new user

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");
    $query = <<<EOT
      INSERT INTO `user` VALUES ( NULL, '{$_REQUEST["email"]}','{$_REQUEST["name"]}','{$_REQUEST["surname"]}','{$_REQUEST["street"]}',
        '{$_REQUEST["town"]}','{$_REQUEST["postcode"]}', '{$_REQUEST["phone"]}', '{$_REQUEST["password"]}');
EOT;

    $query_handle = $db->execute_query($query);
    if (!$query_handle) {
      echo "<p> fail to execute insert quiery </p>";
      exit();
    } else {
      echo '<div class="alert alert-success">  
              <a class="close" data-dismiss="alert">×</a>  
              <strong>Success!</strong>You have successfully registered.  
            </div>';
    }
  }

?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
  </body>
</html>
