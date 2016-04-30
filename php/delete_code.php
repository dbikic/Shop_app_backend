<?php

    session_start();
    include("../config/db_connect.php");
    	
    $code = $_GET['code'];	
    $discount = $_GET['discount'];	
    $store = $_GET['store'];

	$query = "DELETE FROM codes WHERE id = ". $code . "";
	if (mysql_query($query) or die(mysql_error())) {
		header("Location: discount_codes.php?id=".$discount."&store=".$store.""); 
	}
	
?>