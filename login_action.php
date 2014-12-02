<?php
    session_start(); 
    include("scr/base.php");
    $db = new Mysql_DB("localhost", "root", NULL, "couriersdb");
  
    $query = <<<EOT
      SELECT * FROM user where email = '{$_REQUEST['email']}' and password = '{$_REQUEST['password']}';
EOT;
    $query_handle = $db->execute_query($query);
    if (!$query_handle) {
      echo "<p> failed to execute query select from user</p>";
      exit();
    }
  
    if (mysql_num_rows($query_handle) == 0) {
      echo '<div class="alert alert-error">  
              <a class="close" data-dismiss="alert">×</a>  
              <strong>Error!</strong>Wrong e-mail or password.  
            </div>';
      exit;
    }
    else {
      $_SESSION['email'] = $_REQUEST['email'];
      $results = mysql_fetch_array($query_handle);
      $_SESSION['userid'] = $results[0];
      $_SESSION['username'] = $results[2];
      // echo '<div class="alert alert-success">  
      //         <a class="close" data-dismiss="alert">×</a>  
      //         <strong>Success!</strong>You have successfully logged in. 
      //       </div>';
      header('Location: index.php');
    } 
?>
