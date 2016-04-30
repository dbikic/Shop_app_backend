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
                	<h2><span>
                        <?php
                            $sql= mysql_query ("select name from chain_store where id='". $_SESSION['chain_store']."'");
                            $row = mysql_fetch_array($sql);
                            echo "Chain store: " . $row['name'];
                        ?>
                        </span></h2>

                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable">
                        	<thead>
                                <tr >
                                    <th style="width:10%; text-align:center;" >Name</th>
                                    <th style="width:10%; text-align:center;">Address</th>
                                    <th style="width:10%; text-align:center;">Telephone</th>
                                    <th style="width:10%; text-align:center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

								<?php
                                    $sql= mysql_query ("SELECT * FROM store WHERE id_chain_store = '".$_SESSION['chain_store']."' order by id");
                                    while ($row = mysql_fetch_array($sql)) {
                                        echo "<tr>
                    								<td class='align-center'>".$row['name']."</td>
                    								<td class='align-center'>".$row['address']."</td>
                    								<td class='align-center'>".$row['telephone']."</td>
                    								<td class='align-center'>
                    									<a href='edit_store.php?id=".$row['id']."'><img src='../img/pencil.gif'  width='16' height='16' title='Edit' /></a>&nbsp;&nbsp;
                    									<a href='store_discounts.php?id=".$row['id']."'><img src='../img/discounts.png'  width='16' height='16' title='Discounts' /></a>&nbsp;&nbsp;
                    									<img src='../img/minus-circle.gif'  onclick='delete_store(".$row['id'].")' width='16' height='16' title='Briši' />&nbsp;&nbsp;
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
