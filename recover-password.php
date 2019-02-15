<?php
require_once("dbConnect.php");
include("header.php");
if(isset($_SESSION['user'])){
    header("Location:dashboard.php?id=".$_SESSION['user_id']);
}
if(isset($_POST) & !empty($_POST)){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $query = "SELECT * FROM login_table INNER JOIN reg_table WHERE username AND name =".$username;
    $result = $db->query($query);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $row = mysqli_fetch_assoc($result);
        $password = rand(999, 99999);
        $password_hash = md5($password);
        $username = $row['username'];
        $email = $row['email'];
        $sql = "UPDATE password FROM login_table WHERE password=".$password_hash;
        $result = $db->query($sql);
        if($result == TRUE){
            $subject = "Recovery password";
            $message = $username." your recovery password is ".$password_hash." .Click <a href=http://127.0.0.1/vacayhome/login.php>here</a> to login and change password";
            $headers = "From: kevinohiro@gmail.com";
            if(mail($email, $subject, $message, $headers)){
                echo "Your Recovery password has been sent to your mail";
            } else{
                echo "Unable to recover password, try again";
            }
        }
    } else {
        echo "Wrong Username try again";
    }   
} 
?>
<body>
<link rel="stylesheet" type="text/css" href="login_stylesheet.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class = "login">
    <img src="images/Admin.png" class="icon">
    <h2>Recover Password</h2>
    <form action="recover-password.php" method= "post">
        <p><i class="fa fa-user"></i> Username: </p>
        <input type="text" name="username" placeholder="Enter your username" />
        <input type="submit" name="submit" value="Recover Password" />
    </form>

</div>