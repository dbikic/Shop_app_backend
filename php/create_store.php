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
                    print_menu(3);                
                ?>
            <div style="clear: both;"></div>
        </div>
        <div >
            <!-- Body -->
                <div class="module">
                     <h2><span>Add new store</span></h2>
                        
                     <div class="module-body">
                        <form method="POST" action="set_store.php" id="forma" onsubmit="return validacija()">
							
						<p>
                            <label>Store name</label>
                            <input type='text'  name='name' placeholder='Name' class='input-short' value='' required/>
                        </p>
                         <p>
                            <label>Store address</label>
                            <input type='text'  name='address' placeholder='Address' class='input-short' value='' required/>
                        </p>
                         <p>
                            <label>Telephone</label>
                            <input type='text'  name='telephone' placeholder='Telephone' class='input-short' value='' required/>
                        </p>                            
                            
                            <br>    <input  type="submit" value="Submit" /> 
                        </form>
                     </div> 

                </div>  
        		<div style="clear:both;"></div>
            </div> 

			</div>


            <div style="clear:both;"></div>


            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
				<div id="kontejner"></div>

	</body>
</html>
