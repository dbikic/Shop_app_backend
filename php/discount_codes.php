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
                     <a href="store_discounts.php?id=<?php echo $_GET['store'];?>"  class="button">
                        	<span>Nazad&nbsp;&nbsp;<img src="../img/arrow-180.gif" width="12" height="9"  /></span>
                    </a


                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr >
                                    <th style="width:10%; text-align:center;" >Korisnički IMEI</th>
                                    <th style="width:10%; text-align:center;">Kod</th>
                                    <th style="width:10%; text-align:center;">Vrijeme</th>
                                    <th style="width:10%; text-align:center;">Akcije</th>
                                </tr>
                            </thead>
                            <tbody>

								<?php
                                    $sql= mysql_query ("SELECT * FROM `codes` WHERE id_discount = ".$_GET['id']."");
                                    while ($row = mysql_fetch_array($sql))
                                    {
                                        echo "<tr>
                    								<td class='align-center'>".$row['user_id']."</td>
                    								<td class='align-center'>".$row['code']."</td>
                    								<td class='align-center'>".$row['time']."</td>
                    								<td class='align-center'>
                    									<img src='../img/minus-circle.gif'  onclick='delete_code(".$row['id'].", ".$_GET['id'].", ".$_GET['store'].")' width='16' height='16' title='Briši' />&nbsp;&nbsp;

                    								</td>
                    							</tr>  ";
                                    }
								?>
                            </tbody>
                        </table>
                        </form>


                        <div style="clear: both"></div>
                     </div>
                </div>
    	       </div>
            <div style="clear:both;"></div>
            <div style="clear:both;"></div>
        </div>
				<div id="kontejner"></div>

	</body>
</html>
