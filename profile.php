
<?php


include("login_function.php");
if(pf_check_number($_GET['id']) == TRUE) {
    $validid = $_GET['id'];
    }
    else {
    header("Location:index.php");
    }
    

    $query = "SELECT * FROM reg_table WHERE login_id =".$validid;
    $result = $db->query($query);
    
    $row = mysqli_fetch_assoc($result);
            echo '<p>'.$row['name'].'</p>';
            echo '<p>'.$row['othername'].'</p>';
            echo '<p>'.$row['surname'].'</p>';
            echo '<p>'.$row['address'].'</p>';
            echo '<p>'.$row['phone'].'</p>';
            echo '<p>'.$row['email'].'</p>';
            echo '<a><img src="'.$row['pic'].'" class="img-responsive" alt="'.$row['name'].'"></a>';
            echo $row['login_id'];
        
    
    if(!$query){
        echo "Sorry No Profile Available For This User";
    }


?>