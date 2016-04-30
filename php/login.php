<?php

    session_start();
    include("../config/db_connect.php");

    $sql= mysql_query ("SELECT * FROM users WHERE username = '".$_POST['user']."' and password = '".$_POST['password']."'");
    if(mysql_num_rows($sql) > 0)
    {
        $row = mysql_fetch_array($sql);
		        
        $_SESSION['ulogiraniUser'] = '1';    
        $_SESSION['chain_store'] = $row['chain_store'];  
        $_SESSION['username'] = $_POST['user'];  
        header("Location: stores.php"); 
            
    }else{
        header("Location: ../index.php");         
	}
?>