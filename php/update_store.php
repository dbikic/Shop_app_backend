<?php

    session_start();
    include("../config/db_connect.php");
    
    $query = "UPDATE `store` SET 
            name = '".$_POST['name']."',
        address = '".$_POST['address']."',
        telephone = '".$_POST['telephone']."'
        WHERE id =".$_POST['id']."";

        echo $query;
     
     if (mysql_query($query) or die(mysql_error())) {
         header("Location: stores.php");     
     }
?>