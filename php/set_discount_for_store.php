<?php

    function formatDateTime($d){
        $d[10] = ' ';
        $d .= ':00';
        return $d;
    }

    $start = new DateTime(formatDateTime($_POST['start']));
    $end = new DateTime(formatDateTime($_POST['end']));

    if($end < $start) 
        echo "End date is before start date, please enter valid time.";
    else{
        session_start();
        include("../config/db_connect.php");

            $query = "INSERT INTO  discounts (
                                    id_store ,
                                    id_beacon ,
                                    name ,
                                    product ,
                                    new_price ,
                                    old_price ,
                                    valid_from ,
                                    valid_to
                                    )
                                    VALUES (
                                            '".$_POST['store']."',
                                            '".$_POST['beacon']."',
                                            '".$_POST['name']."',
                                            '".$_POST['product']."',
                                            '".$_POST['newPrice']."',
                                            '".$_POST['oldPrice']."',
                                            '".formatDateTime($_POST['start'])."',
                                            '".formatDateTime($_POST['end'])."'
                                    )";
            echo $query;
            if (mysql_query($query) or die(mysql_error())) {
                header("Location: store_discounts.php?id=" . $_POST['store']);     
            }
            
    }

?>