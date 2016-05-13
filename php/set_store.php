<?php

    session_start();
    include("../config/db_connect.php");

    $query = "INSERT INTO  store (
        id_chain_store ,
        name ,
        address ,
        telephone
        )
        VALUES (
        '".$_SESSION['chain_store']."',
        '".$_POST['name']."',
        '".$_POST['address']."',
        '".$_POST['telephone']."'
        )";

        echo $query;

     if (mysql_query($query) or die(mysql_error())) {
         header("Location: create_store.php");     
     }
?>
