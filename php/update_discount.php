<?php

    function formatDateTime($d){
        $d[10] = ' ';
        return $d;
    }
    session_start();
    include("../config/db_connect.php");
    
    $start = new DateTime(formatDateTime($_POST['start']));
    $end = new DateTime(formatDateTime($_POST['end']));

    if($end < $start) 
        echo "End date is before start date, please enter valid time.";
    else{
        
        $query = "UPDATE `discounts` SET 
            name = '".$_POST['name']."',
            product = '".$_POST['product']."',
            new_price = '".$_POST['newPrice']."',
            old_price = '".$_POST['oldPrice']."',
            id_beacon = '".$_POST['beacon']."',
            valid_from = '".formatDateTime($_POST['start'])."',
            valid_to = '".formatDateTime($_POST['end'])."'
            WHERE id =".$_POST['id']."";

            echo $query;

         if (mysql_query($query) or die(mysql_error())) {
             $sql= mysql_query ("SELECT id_store FROM discounts where id=". $_POST['id']);
            $row = mysql_fetch_array($sql);
            
             header("Location: store_discounts.php?id=" . $row['id_store']);     
         }
    }
?>