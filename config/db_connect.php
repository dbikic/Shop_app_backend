<?php
/*    
    $username = "root";
    $password = "";
    $hostname = "localhost";
    $database = "shop_app";
    */
    error_reporting(-1);

    $username = "dbikic";
    $password = "dinokrk";
    $hostname = "localhost";
    $database = "nfc";

    //connection to the database
    $connection = mysql_connect($hostname, $username, $password)
     or die(mysql_error());

    $db_selected = mysql_select_db($database,$connection)
      or die(mysql_error());

    mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'", $connection);
?>