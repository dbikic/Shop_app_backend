<?php

    function getCode(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $string = '';
        for ($i = 0; $i < 9; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        $string[4] = '-';
        return $string;
    }
    $response['status'] = FALSE;
    
    $code = getCode();

    include("../config/db_connect.php");
    $query = "INSERT INTO  codes (
        id_discount ,
        user_id ,
        code 
        )
        VALUES (
        '".$_POST['discount_id']."',
        '".$_POST['uid']."',
        '".$code."'
        )";
    mysql_query($query) or die(mysql_error());
    $response['code'] = $code; 
    $response['status'] = TRUE;

    echo json_encode($response);
?>