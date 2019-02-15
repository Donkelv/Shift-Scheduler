<?php
require_once("dbConnect.php");
include("header.php");
include("carousel.php");

?>
<body>
    <section class="resort-overview-block">
        <div class="container">
            <div class = "row">
            <?php
            $query = "SELECT id, subject, post, date_time, post_pic FROM blog_table ORDER BY date_time DESC LIMIT 6";
            $result = $db->query($query);
            $count = $result->num_rows;
            if($count==0){
                echo '<h1 class="stories_error">There are no stories yet</h1>';
            }
            else{
                while($row = mysqli_fetch_assoc($result)){                      
                    echo '<div class="col-md-6 col-sm-12 col-xs-12 remove-padd-right">';
                    echo '<div class="side-A">';
                    echo '<div class="product-thumb">';
                    echo '<div class="image">';
                    echo '<a><img src="'.$row['post_pic'].'" class="img-responsive" alt="'.$row['subject'].'"></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="side-B">';
                    echo '<div class="product-desc-side">';
                    echo '<h3><a href=viewstory.php?id='.$row['id'].'>'.$row['subject'].'</a></h3>';
                    echo '<p>'.$row['post'].'</p>';                       
                    echo "<div class='links'><a href=viewstory.php?id=".$row['id'].">Read more</a></div>";                       
                    echo '</div>'; 
                    echo '</div>';
                    echo '</div>';
                }   
            }
            
            ?>
            </div>
        </div>
    </section>
</body>