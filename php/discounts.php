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
		<script type="text/javascript" src="../js/jquery.tablesorter.pager.js"></script>
		<script type="text/javascript" src="../js/moj.js" ></script>
        
    <script src='pdfmake.min.js'></script>
 	<script src='vfs_fonts.js'></script>
   

        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() {
				$("#myTable")
				.tablesorter({
					widgets: ['zebra'],
					headers: {
						9: {
							sorter: false
						}
					}
				})
			.tablesorterPager({container: $("#pager")});
		});
		</script>
	</head>
	<body>
	<?php
			//include("../php/config.php");
			//connect();
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
                        <a href="logout.php" id="logout">Logout
                        </a>
                    </div>
                </div>
                <div style="clear:both;"></div>
                
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                <li id="current"><a href="pregledaj_aute.php">Pregledaj aute</a></li>
                                <li><a href="dodaj_novi_auto.php">Dodaj auto</a></li>
                            </ul>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>
            <div style="clear: both;"></div>

        </div>

		<div class="container_12">


                <!-- Example table -->
                <div class="module">
                	<h2><span>Svi auti</span></h2>

                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr >
                                    <th style="width:10%; text-align:center;" >Marka</th>
                                    <th style="width:10%; text-align:center;">Model</th>
                                    <th style="width:10%; text-align:center;">Godište</th>
                                    <th style="width:10%; text-align:center;">Kilometraža</th>
                                    <th style="width:10%; text-align:center;">Motor</th>
                                    <th style="width:5%; text-align:center;">Boja</th>
                                    <th style="width:10%; text-align:center;">Cijena [EUR]</th>
                                    <th style="width:10%; text-align:center;">Uređen</th>
                                    <th style="width:6%; text-align:center;">Aktivan</th>
                                    <th style="width:12%; text-align:center;">Akcije</th>
                                </tr>
                            </thead>
                            <tbody>

								<?php
/*
									$sql= mysql_query ("SELECT auto.id,auto.aktivan, auto.uredjen, marka_auta.marka, auto.model_dodatno, auto.cijena, auto.dodan , auto.godina, auto.kilometri, auto.motor, auto.boja
														FROM `auto`,`marka_auta`
														WHERE auto.marka = marka_auta.id_marka");
									while ($row = mysql_fetch_array($sql)){
										echo "
										<tr>
											<td class='align-center'>".$row['marka']."</td>
											<td class='align-center'>".$row['model_dodatno']."</td>
											<td class='align-center'>".$row['godina']."</td>
											<td class='align-center'>".$row['kilometri']."</td>
											<td class='align-center'>".$row['motor']."</td>
											<td class='align-center'>".$row['boja']."</td>
											<td class='align-center'>".$row['cijena']."</td>
											<td class='align-center'>".$row['uredjen']."</td>
											<td class='align-center'>"; if($row['aktivan'] == '0') echo "Ne"; else echo "Da";echo "</td>
											<td class='align-center'>
												<a href='uredi_auto.php?id=".$row['id']."'><img src='pencil.gif'  width='16' height='16' title='Uredi' /></a>&nbsp;&nbsp;
												<a href='dodaj_dodatno.php?id=".$row['id']."'><img src='dodaj.jpg'  width='16' height='16' title='Dodatno' /></a>&nbsp;&nbsp;
												<img src='minus-circle.gif'  onclick='validacija_brisanja(".$row['id'].")' width='16' height='16' title='Briši' />&nbsp;&nbsp;
												<a href='slike.php?id=".$row['id']."'><img src='slike.png'  width='16' height='16'  title='Galerija' /></a>&nbsp;&nbsp;
												<a href='#' onclick='pokreni_spremanje(".$row['id'].");'><img src='pdf.gif'  width='16' height='16'  title='Skini pdf' /></a>
											</td>
										</tr>  ";
									}*/
echo "
										<tr>
											<td class='align-center'>23</td>
											<td class='align-center'>32</td>
											<td class='align-center'>44</td>
											<td class='align-center'>23</td>
											<td class='align-center'>44</td>
											<td class='align-center'>22</td>
											<td class='align-center'>11</td>
											<td class='align-center'>444</td>
											<td class='align-center'>12</td>
											<td class='align-center'>
												<a href='uredi_auto.php?id=1'><img src='../img/pencil.gif'  width='16' height='16' title='Uredi' /></a>&nbsp;&nbsp;
												<a href='dodaj_dodatno.php?id=1'><img src='../img/dodaj.jpg'  width='16' height='16' title='Dodatno' /></a>&nbsp;&nbsp;
												<img src='../img/minus-circle.gif'  onclick='validacija_brisanja(1)' width='16' height='16' title='Briši' />&nbsp;&nbsp;
												<a href='slike.php?id=1'><img src='../img/slike.png'  width='16' height='16'  title='Galerija' /></a>&nbsp;&nbsp;
												<a href='#' onclick='pokreni_spremanje(1);'><img src='../img/pdf.gif'  width='16' height='16'  title='Skini pdf' /></a>
											</td>
										</tr>  ";
echo "
										<tr>
											<td class='align-center'>2</td>
											<td class='align-center'>32</td>
											<td class='align-center'>44</td>
											<td class='align-center'>23</td>
											<td class='align-center'>44</td>
											<td class='align-center'>22</td>
											<td class='align-center'>11</td>
											<td class='align-center'>444</td>
											<td class='align-center'>12</td>
											<td class='align-center'>
												<a href='uredi_auto.php?id=1'><img src='../img/pencil.gif'  width='16' height='16' title='Uredi' /></a>&nbsp;&nbsp;
												<a href='dodaj_dodatno.php?id=1'><img src='../img/dodaj.jpg'  width='16' height='16' title='Dodatno' /></a>&nbsp;&nbsp;
												<img src='../img/minus-circle.gif'  onclick='validacija_brisanja(1)' width='16' height='16' title='Briši' />&nbsp;&nbsp;
												<a href='slike.php?id=1'><img src='../img/slike.png'  width='16' height='16'  title='Galerija' /></a>&nbsp;&nbsp;
												<a href='#' onclick='pokreni_spremanje(1);'><img src='../img/pdf.gif'  width='16' height='16'  title='Skini pdf' /></a>
											</td>
										</tr>  ";
								?>
                            </tbody>
                        </table>
                        </form>
                        <div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="../img/arrow-stop-180.gif"  alt="first"/>
                                <img class="prev" src="../img/arrow-180.gif" alt="prev"/>
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="../img/arrow.gif"  alt="next"/>
                                <img class="last" src="../img/arrow-stop.gif"  alt="last"/>
                                <select class="pagesize input-short align-center">
                                    <option value="30" selected="selected">30</option>
                                    <option value="60">60</option>
                                    <option value="90">90</option>
                                    <option value="120">120</option>
                                </select>
                                </div>
                            </form>
                        </div>

                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->




			</div> <!-- End .grid_12 -->


            <div style="clear:both;"></div>


            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
				<div id="kontejner"></div>

	</body>
</html>
