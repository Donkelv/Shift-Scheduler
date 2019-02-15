<?php
require('dbConnect.php');
include('header.php');
include('login_function.php');

if(pf_check_number($_GET['id']) == TRUE) {
    $validid = $_GET['id'];
} else {
    echo "Unable to get story";
}

$query = "SELECT * FROM blog_table WHERE id = " .$validid;
$result = $db->query($query);
$row = mysqli_fetch_assoc($result);
if(!$query){
    echo "Story Not Available";
}

echo '<section class="blog">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-md-9 col-sm-8 col-xs-12">';
echo '<h2 class="blog-title-head">'.$row['subject'].'</h2>';
echo '<p class="user-info">Posted by <a>Admin</a> on '.date('jS M Y', strtotime($row['date_time'])).  '</p>';
echo '<div class="blog-image-single margin-top-small">';
    echo '<img src="'.$row['post_pic'].'" class="img-responsive">';
echo '</div>';
echo '<p class="blog-desc">'.$row['post'].'</p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';


?>