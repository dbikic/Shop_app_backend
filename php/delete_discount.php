<?php

    session_start();
    include("../config/db_connect.php");
    	
    $id = $_GET['id'];	
	$query = "DELETE FROM discounts WHERE id = ". $id . "";
	
	if (mysql_query($query) or die(mysql_error())) {
		header("Location: store_discounts.php?id=" . $_GET['store']); 
	}
	
?>