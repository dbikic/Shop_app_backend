<?php

    $response['status'] = FALSE;

    include("../config/db_connect.php");
    $response['Id'] =  $_GET['id'] ;
    $response['user'] = $_GET['user'];

    $sqlStore= mysql_query ("SELECT * FROM store where id=". $_GET['id']);
    $rowStore = mysql_fetch_array($sqlStore);
    $response['store'] = $rowStore['name'];
    $response['storeAddress'] = $rowStore['address'];
    $response['telephone'] = $rowStore['telephone'];

    $response['beacons'] = FALSE;
    $sql= mysql_query ("SELECT * FROM beacon");
    
    while($row = mysql_fetch_array($sql)){
        $sqlDiscount= mysql_query ("SELECT * FROM discounts where id_store=". $_GET['id'] ." and id_beacon =". $row['id'] ." order by discounts.id limit 1");
        $rowDiscount = mysql_fetch_array($sqlDiscount);
        if($rowDiscount != null){
            $beacon['discount_id'] = $rowDiscount['id'];
            $beacon['factory_id'] = $row['factory_id'];
            $beacon['discountName'] = $rowDiscount['name'];
            $beacon['discountProduct'] = $rowDiscount['product'];
            $beacon['discountNewPrice'] = $rowDiscount['new_price'];
            $beacon['discountOldPrice'] = $rowDiscount['old_price'];
            $beacon['discountValidFrom'] = $rowDiscount['valid_from'];
            $beacon['discountValidTo'] = $rowDiscount['valid_to'];
            
            $sqlCode= mysql_query ("SELECT * FROM codes where id_discount='". $rowDiscount['id'] ."' AND user_id='".$_GET['user']."'");
            $rowCode = mysql_fetch_array($sqlCode);
            if($rowCode != null){
                $beacon['code'] = $rowCode['code'];
            }else{
                $beacon['code'] = "0";
            }
            
            $response['beacons'][] = $beacon;    
        }        
    }

    $response['status'] = TRUE;
    echo json_encode($response);
?>