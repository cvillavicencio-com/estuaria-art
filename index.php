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
	<title><?php echo $titulo; ?></title>

	<!-- Normalize -->

	<link rel="stylesheet" href="css/assets/normalize.css" type="text/css">

	<!-- Bootstrap -->

	<link href="css/assets/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Font-awesome.min -->

	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Effet -->

	<link rel="stylesheet" href="css/gallery/foundation.min.css"  type="text/css">
	<link rel="stylesheet" type="text/css" href="css/gallery/set1.css" />

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

	<main class="main-wrapper" id="container"> 
	    
	    <!-- image Gallery -->
	    
	    <div class="wrapper">
		<div class="">
		    <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-5 masonry">

			<?php
			$gS = "SELECT * FROM infoObras WHERE coleccionId = '$coleccionDef';";
			$gQ = $conn->query($gS);
			if ($gQ->num_rows > 0) {
			    while($gL = $gQ->fetch_assoc()) {
				$archivo = substr($gL['imagenObr'],0,-4).'_thumb.jpg';
				echo '
			<li class="masonry-item grid">
			    <figure class="effect-sarah"> <img src="'.$archivo.'" alt="" />
				<figcaption>
				    <h2>'.$gL['nombreObr'].'</h2>
				    <p>'.$gL['infoObr'].'</p>
				    <a href="obra.php?id='.$gL['idObr'].'">View more</a> </figcaption>
			    </figure>
			</li>
				    ';
			    }
			}
			?>
		    </ul>
		</div>
	    </div>
	</main>

	<!-- Image Gallery --> 

	<!-- footer -->

	<footer class="footer">
	    <h3>Stay connected with us</h3>
	    <div class="container footer-bot">
		<div class="row"> 
		    
		    <!-- logo -->
		    
		    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <img src="images/footer-logo.png" alt="Picxa" title="Picxa"/>
			<p class="copy-right"><?php echo $titulo; ?></p>
		    </div>
		    
		    <!-- logo --> 
		    
		    <!-- address -->
		    
		    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
			<address>
			    <p>200 Broadway Av</p>
			    <p>West Beach SA 5024  Australia</p>
			</address>
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
			<p class="made-by">Made with by <i class="fa fa-heart" aria-hidden="true"></i> <a href="http://www.designstub.com/" target="_blank">Designstub</a>
			    <p> 
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
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> 
	<script src="js/maps.js" type="text/javascript"></script> 
	<script src="js/custom.js" type="text/javascript"></script> 
	<script src="js/jquery.contact.js" type="text/javascript"></script> 
	<script src="js/main.js" type="text/javascript"></script> 
	<script src="js/gallery/masonry.pkgd.min.js" type="text/javascript"></script> 
	<script src="js/gallery/imagesloaded.pkgd.min.js" type="text/javascript"></script> 
	<script src="js/gallery/jquery.infinitescroll.min.js" type="text/javascript"></script> 
	<script src="js/gallery/main.js" type="text/javascript"></script> 
	<script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
    </body>
</html>
