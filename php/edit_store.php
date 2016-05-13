
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
		<script type="text/javascript" src="../js/jquery.tablesorter.min.js" ></script>
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
                <div class="container_12">
                    <div class="grid_8">
					&nbsp;
                    </div>
                    <div class="grid_4">
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

		<div class="container_12">
 <div class="grid_12">

                <div class="module">
                    <a href="stores.php"  class="button">
                        	<span>Nazad&nbsp;&nbsp;<img src="../img/arrow-180.gif" width="12" height="9"  /></span>
                    </a>
                     <h2><span><br/>Uredi poslovnicu</span></h2>


                     <div class="module-body">
                        <form method="POST" action="update_store.php" id="forma" onsubmit="return validacija()">

                    <?php
                        $sql= mysql_query ("SELECT * FROM store where id='".$_GET['id']."'");
                        $row = mysql_fetch_array($sql);

                        echo "
						<p>
                            <label>Ime poslovnice</label>
                            <input type='text'  name='name' placeholder='Ime poslovnice' class='input-short' value='".$row['name']."' required/>
                        </p>
                         <p>
                            <label>Adresa poslovnice</label>
                            <input type='text'  name='address' placeholder='Adresa poslovnice' class='input-short' value='".$row['address']."' required/>
                        </p>
                         <p>
                            <label>Telefon</label>
                            <input type='text'  name='telephone' placeholder='Telefon' class='input-short' value='".$row['telephone']."' required/>
                        </p>
                            <input type='hidden'  name='id' value='".$_GET['id']."' required/>
                        ";

                          ?>
                            <br>    <input  type="submit" value="Spremi" />
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
