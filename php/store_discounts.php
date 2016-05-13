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
                     <a href="stores.php"  class="button">
                        	<span>Nazad&nbsp;&nbsp;<img src="../img/arrow-180.gif" width="12" height="9"  /></span>
                    </a><a href="create_discount_for_store.php?store=<?php echo $_GET['id']; ?>"  class="button"><span>Dodaj popust&nbsp;&nbsp;<img src="../img/add.gif" width="12" height="9"  /></span></a>

                	<h2><span>
                        <br/>
                        <?php

                            $sql= mysql_query ("select name from store where id='". $_GET['id']."'");
                            $row = mysql_fetch_array($sql);
                            echo $row['name'] . ":";
                        ?>
                        </span></h2>

                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr >
                                    <th style="width:10%; text-align:center;" >Naziv proizvoda</th>
                                    <th style="width:10%; text-align:center;">Proizvod</th>
                                    <th style="width:10%; text-align:center;">Stara cijena</th>
                                    <th style="width:10%; text-align:center;">Nova cijena</th>
                                    <th style="width:10%; text-align:center;">Oglašivač</th>
                                    <th style="width:10%; text-align:center;">Vrijedi od</th>
                                    <th style="width:10%; text-align:center;">Vrijedi do</th>
                                    <th style="width:10%; text-align:center;">Akcije</th>
                                </tr>
                            </thead>
                            <tbody>

								<?php
                                    $sql= mysql_query ("SELECT *, b.id as bid, d.id as did FROM `discounts` as d  inner join beacon as b on d.id_beacon = b.id where d.id_store =  '".$_GET['id']."' ORDER BY d.id");
                                    while ($row = mysql_fetch_array($sql))
                                    {
                                        echo "<tr>
                    								<td class='align-center'>".$row['name']."</td>
                    								<td class='align-center'>".$row['product']."</td>
                    								<td class='align-center'>".$row['old_price']."</td>
                    								<td class='align-center'>".$row['new_price']."</td>
                    								<td class='align-center'>".$row['beacon_name']."</td>
                    								<td class='align-center'>".$row['valid_from']."</td>
                    								<td class='align-center'>".$row['valid_to']."</td>
                    								<td class='align-center'>
                    									<a href='edit_discount.php?id=".$row['did']."'><img src='../img/pencil.gif'  width='16' height='16' title='Uredi' /></a>&nbsp;&nbsp;
                    									<a href='discount_codes.php?id=".$row['did']."&store=".$_GET['id']."'><img src='../img/codes.png'  width='16' height='16' title='Pregledaj kodove' /></a>&nbsp;&nbsp;
                    									<img src='../img/minus-circle.gif'  onclick='delete_discount(".$row['did'].", ".$_GET['id'].")' width='16' height='16' title='Briši' />&nbsp;&nbsp;

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
