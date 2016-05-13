<?php

    session_start();
    include("../config/db_connect.php");

    $id = $_GET['id'];
	$query = "DELETE FROM discounts WHERE id_store = ". $id . "";
	mysql_query($query) or die(mysql_error());

	$query = "DELETE FROM store WHERE id = ". $id . "";
	if (mysql_query($query) or die(mysql_error())) {
		header("Location: stores.php");
	}

?>
