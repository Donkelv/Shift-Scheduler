<?php
require_once("dbConfig.php");
        $db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME); 
        if(mysqli_connect_error()){
                die("Could not establish connection to database");
        }

        
        

?>