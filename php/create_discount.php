<?php
    session_start();
    if(!isset($_SESSION["ulogiraniUser"])) header("Location: 404.php"); 
?>
<!DOCTYPE html>
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
                    print_menu(2);                
                ?>
            <div style="clear: both;"></div>
        </div>
        <div >
                <!-- Body -->
                <div class="module">
                     <h2><span>Add new discount</span></h2>
                        
                     <div class="module-body">
                        <form method="POST" action="set_discount.php" id="forma" onsubmit="return validacija()">
							
						<p>
                            <label>Discount name</label>
                            <input type='text'  name='name' placeholder='Name' class='input-short' value='' required/>
                        </p>
                         <p>
                            <label>Product</label>
                            <input type='text'  name='product' placeholder='Product' class='input-short' value='' required/>
                        </p>
                         <p>
                            <label>Old price</label>
                            <input type='text'  name='oldPrice' placeholder='Old price' class='input-short' value='' required/>
                        </p>
                         <p>
                            <label>New price</label>
                            <input type='text'  name='newPrice' placeholder='New price' class='input-short' value='' required/>
                        </p>   
                         <p>
                            <label>Start date and time  (mm/dd/yyyy, hh:mm)</label>
                            <input id="start" name="start" type="datetime-local" required>
                        </p>   
                         <p>
                            <label>End date and time (mm/dd/yyyy, hh:mm)</label>
                            <input id="end" name="end" type="datetime-local" required>
                        </p>   
                            <?php
                                echo "Select beacon for discount:</br><select name='beacon' required>
                                <option value=''>Please select</option>";
                                $sql= mysql_query ("SELECT * FROM beacon");
                                while ($row = mysql_fetch_array($sql))
                                {
                                    echo "<option value='" .$row['id']. "'>" .$row['beacon_name']. "</option>";
                                }
                                echo "</select>";


                                echo "</br></br>Select stores in which discount is available:</br><select name='stores[]' multiple required>";
                                $sql= mysql_query ("SELECT * FROM store WHERE id_chain_store = '".$_SESSION['chain_store']."'");
                                while ($row = mysql_fetch_array($sql))
                                {
                                    echo "<option value='" .$row['id']. "'>" .$row['name']. "</option>";
                                }
                                echo "</select>";
                            ?>
                            
                            <br/><br/>    <input  type="submit" value="Submit" /> 
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
