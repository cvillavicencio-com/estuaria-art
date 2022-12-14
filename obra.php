<?php
session_start();
// temporal -->
$log = $_SESSION['log'] ;
echo $log;
$logged = ($log == 'test') ? true : false;
// <-- temporal

include('dbconfig.php');
include('loadconf.php');

$idObra = intval($_GET['id']);

$oS="SELECT * FROM infoObras WHERE idObr = '$idObra'";
$oQ=$conn->query($oS);
$oL = $oQ->fetch_row();
// idObr nombreObr infoObr imagenObr tecnicaObr fechaObr precioObr linkventaObr autorId coleccionId idCol nombreCol infoCol fechaCol idAut nombreAut infoAut 	
// 0     1         2       3         4          5        6         7            8       9           10    11        12      13       14    15        16
?>
<!DOCTYPE html>
<html class="no-js"  lang="en">
    <head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<title><?php echo $oL[1].' - '.$titulo; ?></title>

	<meta content="<?php echo $oL[1]; ?>" property="og:title">
	<meta content="<?php echo $oL[11] ?>" property="og:description">
	<meta content="https://estuaria.art/<?php echo "obra.php?id=".$oL[0]; ?>" property="og:url">
	<meta content="Estuaria.Art" property="og:site_name">	

	
	<!-- Normalize -->
	<link rel="stylesheet" href="css/assets/normalize.css" type="text/css"> 
	<!-- Bootstrap -->
	<link href="css/assets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- Font-awesome.min -->
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Main Style -->
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<!-- Responsive Style -->
	<link href="css/responsive.css" rel="stylesheet" type="text/css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
 	<script src="js/assets/modernizr-2.8.3.min.js" type="text/javascript"></script>
	

    </head>
    <body>
	<!-- header -->
	<?php include('header.php'); ?>	
        <!-- header -->
        <!-- main-wrapper-inner -->
        <main class="main-wrapper-inner" id="container">
            <div class="container">
                <div class="wrapper-inner">
                    <!-- details-image -->
                    <figure class="details-image">
                        <img src="<?php echo $oL['3'] ?>" alt="" class="img-responsive"/>
                    </figure>
                    <!-- details-image -->
                    <!-- content -->
                    <div class="details-content">
                        <!-- left -->
                        <section class="inner-left">
                            <header>
				<h3><?php echo substr($oL['5'],0,4); ?></h3>
                                <h4><?php echo $oL[1]; ?></h4>
                                <h5><?php echo 'Colecci??n: '.$oL[11]; ?></h5>
                            </header>
                        </section>
                        <!-- left -->
                        <!-- right -->
                        <section class="inner-right">
                            <p><?php


			       

			       echo nl2br($oL[2]); ?></p>
                            <header>
                                <h2>T??cnica</h2>
                                <h3><?php echo $oL[4]; ?></h3>
                                <h5><br><?php
				    if(empty($oL[6])){
					echo '';
				    } else {
					if ($oL[6] == 1){
					    echo 'Vendida';
					} else {
					    echo '$'.$oL[6];
					}
				    }
					?>
				</h5>
				<p>

				    <?php if ($logged){ ?>
				    <form action="accion.php?f=ao" method="post">
					nombreObr <input name="nombreObr" value="<?php echo $oL[1]; ?>"><br>
					infoObr <textarea name="infoObr" ><?php echo $oL[2]; ?></textarea><br>
					tecnicaObr <input name="tecnicaObr" value="<?php echo $oL[4]; ?>"><br>
					Colecci??n<select name="coleccionId">
					    <?php
					    $colS = "SELECT * FROM colecciones;";
					    $colQ = $conn->query($colS);
					    if ($colQ->num_rows > 0) {
						while($colL = $colQ->fetch_assoc()) {
					    ?>
						<option value="<?php echo $colL['idCol'] ?>"><?php echo $colL['nombreCol']; ?></option>
					    <?php
					    }}
					    ?>
					</select><br>
					precioObr <input name="precioObr" value="<?php echo $oL[6]; ?>"><br>
					linkventaObr <input name="linkventaObr" value="<?php echo $oL[7]; ?>"><br>
					idObr <input name="idObr" value="<?php echo $oL[0]; ?>" readonly><br>

					<input type="submit" value="actualizar">
				    </form>
				    <?php } ?>
				</p>
                            </header>
                        </section>
                        <!-- right -->
                    </div>
                    <!-- content -->
                </div>
            </div>
        </main>
        <!-- main-wrapper-inner -->
        <!-- footer -->
        <footer class="footer">
            <h3>Stay connected with us</h3>
            <div class="container footer-bot">
                <div class="row">
                    <!-- logo -->
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    	<img src="images/footer-logo.png" alt="Picxa" title="Picxa"/>
                    	<p class="copy-right">&copy; Reserved Picxa inc 2016.</p>
                    </div>
                    <!-- logo -->
                    <!-- address -->
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
                    	<address><p>200 Broadway Av</p>
			    <p>West Beach SA 5024  Australia</p></address>
                    </div>
                    <!-- address -->
                    <!-- email -->
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
                        <p><a href="mailto:contact@Picxa.com">contact@Picxa.com</a></p>
                        <p>01 (2) 34 56 78</p>
                    </div>
                    <!-- email -->
                    <!-- social -->
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
                     	<ul class="social">
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-delicious" aria-hidden="true"></i></a></li>
                        </ul>
                    	<p class="made-by">Made with by <i class="fa fa-heart" aria-hidden="true"></i> <a href="http://www.designstub.com/" target="_blank">Designstub</a><p>
                    </div>
                    <!-- social -->
                </div>
            </div>
        </footer>
        <!-- footer -->
	

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/assets/jquery.min.js"><\/script>')</script>
	<script src="js/assets/plugins.js" type="text/javascript"></script>
	<script src="js/assets/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>	
	
	
    </body>
</html>
