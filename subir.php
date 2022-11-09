<!DOCTYPE html>
<?php
include('dbconfig.php');
include('loadconf.php');

?>

<html class="no-js"  lang="en">

    <head>

	

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

	<title>:: Picxa | About ::</title>

	

	

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


                    <!-- content -->

                    <div class="about-content">

                        <!-- left -->

                        <section class="inner-left">

                            <header>
                            	<h3>Agregar obra</h3>
                            </header>

                        </section>

                        <!-- left -->

                        <!-- right -->

                        <section class="inner-right">

			    <form enctype="multipart/form-data" action="accion.php?f=no" method="POST">
				<p>Autor<br> <select name="autorId">
				    <?php
				    $colS = "SELECT * FROM autores;";
				    $colQ = $conn->query($colS);
				    if ($colQ->num_rows > 0) {
					while($colL = $colQ->fetch_assoc()) {
				    ?>
					<option value="<?php echo $colL['idAut'] ?>"><?php echo $colL['nombreAut']; ?></option>
				    <?php
				    }}
				    ?>
				</select></p>
				<p>Nombre de obra<br><input name="nombreObr"></p>
				<p>Información<br><textarea name="infoObr" cols="" rows=""></textarea></p>
				<p>Técnica<br><input name="tecnicaObr"></p>
				<p>Archivo<br><input name="imagenObr" type="file" required/></p>
				<p>Colección<br> <select name="coleccionId">
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
				</select></p>
				<p>Precio <br><input name="precioObra"></p>
				<p>Link de venta <br><input name="linkventaObra"></p>
				<br><br>
				<p><input type="submit" value="Agregar obra"></p>

			    </form>

			    

                        </section>

                        <!-- right -->

                    </div>

                    <div style="background-color:#cacaca;" class="about-content">

                        <!-- left -->

			<br>
                        <section class="inner-left">

                            <header>
                                <h3>Agregar colección</h3>


                            </header>

                        </section>

                        <!-- left -->

                        <!-- right -->

                        <section class="inner-right">

			    <form enctype="multipart/form-data" action="accion.php?f=nc" method="POST">
				<form enctype="multipart/form-data" action="upload.php" method="POST">
				    <p>Nombre de colección<br><input name="nombreCol"></p>
				    <p>Información<br><textarea name="infoCol" cols="" rows=""></textarea></p>
				    <br><br>
				    <p><input type="submit" value="Agregar colección"></p>

				</form>

				

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
