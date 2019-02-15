<?php
require_once("dbConnect.php");
include("header.php");
include("login_function.php");
?>
<h3>Edit Post</h3>
<?php
$query1 = $db->query("SELECT * FROM blog_table WHERE id = ".$postid."");
$postid = $_GET['id'];
if(pf_check_number($_GET['id'])==TRUE){
    $postid = $_GET['id'];
} else {
    echo "Unable to get post id";
}
if(isset($_POST['submit'])){
    $check = getimagesize($_FILES["post_pic"]["tmp_name"]);
    if($check !== false){
        $image = 'images/';
        $image = $image .basename($_FILES["post_pic"]["tmp_name"]);
        
        $subject = $_POST['subject'];
        $post = $_POST['post'];
        $query = $db->query("UPDATE blog_table SET subject = ".$subject.", post = ".$post.", post_pic = ".$image." WHERE id = ".$postid." ");
        if($query && move_uploaded_file($_FILES['post_pic']['tmp_name'])){
            header("Locattion:index.php");
            exit;
        }
        else{
            echo "Unable to Update post";
        }
        
    }
   
}
?>
<form action='<?php $SCRIPT_NAME ?>' method='post' enctype='multipart/form-data'>



<p><label>Subject</label><br />
<input type='text' name='subject' value=''></p>

<p><label>Post</label><br />
<textarea name='post' cols='60' rows='10' value= ''></textarea></p>

<p><label>Image</label><br />
<input type='file' name='post_pic' value=''></p>

<p><input type='submit' name='submit' value='Submit'></p>

</form>