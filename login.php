<?php
require_once("dbConnect.php");
include("header.php");
include("login_function.php");
if(isset($_SESSION['user'])){
 header("Location:dashboard.php?id=".$_SESSION['user_id']);
}
?>
<div id="login">
    <?php
    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
      $query = "SELECT * FROM login_table WHERE username='". pf_fix_slashes($_POST['username'])."' AND password='".pf_fix_slashes($_POST['password'])."';";
      $result = $db->query($query);
      $count = mysqli_num_rows($result);
    if($count == 1) {
          $row = mysqli_fetch_array($result);
          $_SESSION['user'] = $username;
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['logged_in'] = true;
          header("Location:dashboard.php?id=".$_SESSION['user_id']);
    } else {
           echo "<p>Wrong Username or Password</p>";
           exit;
    } 
    if($row['id'] == 1){
       $_SESSION['admin'] = $row['id'];
    }
    } else {
       echo '
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class= "login">
    <img src="images/Admin.png" class="icon">
    <form action="login.php" method= "post">
      <p><i class="fa fa-user"></i> Username: </p> 
      <input type="text" name="username" placeholder="Enter your username" />
      <p><i class="fa fa-lock"></i> Password:</p>
      <input type="password" name="password" placeholder="Enter your password" /><br>
      <input type="submit" name="submit" value="login" /><br>
      <a href="recover-password.php"> Lost Your Password</a><br>
    </form>
    </div>';
    }
    ?>
    <link rel="stylesheet" type="text/css" href="login_stylesheet.css"> 
</div>