<?php
require_once("dbConnect.php");
include("header.php");
?>
<h3>Edit Post</h3>
<?php
if(isset($_POST['submit'])){
    $check = getimagesize($_FILES["post_pic"]["tmp_name"]);
    if($check !== false){
        $image = 'images/';
        $image = $image .basename($_FILES["post_pic"]["tmp_name"]);
        
        $subject = $_POST['subject'];
        $post = $_POST['post'];
        $query = $db->query("UPDATE blog_table SET subject = '$subject', post = '$post', post_pic = '$image' WHERE id = postid)";
        if($query){
            echo 'Successfully Updated';
            header('Location:index.php?action=updated');
            exit;
        }
    }
    try{
        $set = $db->prepare('SELECT id, subject, post, post_pic FROM blog_table WHERE id = postid');
        $set->execute(array('postid' => $_GET['id']));
        $row = $set->fetch();
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<form action='<?php $SCRIPT_NAME ?>' method='post' enctype='multipart/form-data'>

<p><label>Subject</label><br />
<input type='text' name='subject' value='<?php echo $row['subject'] ?>'></p>

<p><label>Post</label><br />
<textarea name='post' cols='60' rows='10' value= '<?php echo $row['subject'] ?>'></textarea></p>

<p><label>Image</label><br />
<input type='file' name='post_pic' value='<?php echo $row['subject'] ?>'></p>

<p><input type='submit' name='submit' value='Submit'></p>

</form>