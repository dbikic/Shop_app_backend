<?php
    session_start();
    if(!isset($_SESSION["ulogiraniUser"])) header("Location: 404.php"); 
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Admin panel</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css" />
        <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="../js/moj.js" ></script>
    </head>
    <body>
    <?php
        include("../config/db_connect.php");
    ?>
        <!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div >
                    <div >
                    &nbsp;
                    </div>
                    <div >
                        <?php include "logout_menu.php"; ?>                        
                    </div>
                </div>
                <div style="clear:both;"></div>
                
                <?php 
                    include('menu.php'); 
                    print_menu(1);                
                ?>
            <div style="clear: both;"></div>
        </div>
        <div >
                <!-- Body -->
            
                <div class="module">
                    
                             <?php 
                                $sql= mysql_query ("SELECT id_store FROM discounts where id=" . $_GET['id']);
                                $row = mysql_fetch_array($sql);          
                                echo '<a href="store_discounts.php?id=' . $row['id_store'] . '" " class="button">';                             
                             ?>                            
                             
                        	<span>Back&nbsp;&nbsp;<img src="../img/arrow-180.gif" width="12" height="9"  /></span>
                        </a>
                     <h2><span><br/>Edit discount</span></h2>
                        
                     <div class="module-body">
                        <form method="POST" action="update_discount.php" id="forma" onsubmit="return validacija()">
							
                            <?php

                        function formatDate($d){
                            $d[10] = 'T';
                            return $d;
                        }

                                $sql= mysql_query ("SELECT * FROM discounts where id=" . $_GET['id']);
                                $row = mysql_fetch_array($sql);                            
                        echo "
						<p>
                            <label>Discount name</label>
                            <input type='text'  name='name' placeholder='Name' class='input-short' value='".$row['name']."' required/>
                        </p>
                         <p>
                            <label>Product</label>
                            <input type='text'  name='product' placeholder='Product' class='input-short' value='".$row['product']."' required/>
                        </p>
                         <p>
                            <label>Old price</label>
                            <input type='text'  name='oldPrice' placeholder='Old price' class='input-short' value='".$row['old_price']."' required/>
                        </p>
                         <p>
                            <label>New price</label>
                            <input type='text'  name='newPrice' placeholder='New price' class='input-short' value='".$row['new_price']."' required/>
                        </p>   
                         <p>
                            <label>Start date and time (mm/dd/yyyy, hh:mm)</label>
                            <input id='start' name='start' type='datetime-local' value='".formatDate($row['valid_from'])."' required>
                        </p>   
                         <p>
                            <label>End date and time (mm/dd/yyyy, hh:mm)</label>
                            <input id='end' name='end' type='datetime-local' value='".formatDate($row['valid_to'])."' required>
                        </p>   
                                Select beacon for discount:</br><select name='beacon' required>
                                <option value=''>Please select</option>";
                                

                            $sql= mysql_query ("SELECT * FROM beacon");
                                while ($beacon_row = mysql_fetch_array($sql))
                                {
                                    echo "<option value='" .$beacon_row['id'] . "'";
                                    if($beacon_row['id'] == $row['id_beacon'])
                                        echo " selected";
                                    echo ">" .$beacon_row['beacon_name'] . "</option>";
                                }
                                echo "</select>
                                <input type='hidden'  name='id' value='".$_GET['id']."' required/>";

                            ?>
                            
                            <br><br>  <input  type="submit" value="Update" /> 
                        </form>
                     </div> 

                </div>
        		<div style="clear:both;"></div>
            </div> 
			</div> 
            <div style="clear:both;"></div>
            <div style="clear:both;"></div>
        </div>
				<div id="kontejner"></div>

	</body>
</html>
