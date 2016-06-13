<?php
    include_once 'session.php';
?>
<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Turistika</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
                <script src="http://maps.googleapis.com/maps/api/js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Karla%7CMontserrat">
                <!--<link rel="stylesheet" href="css/screen.css">-->
                <link rel="stylesheet" href="css/lightbox.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://sachinchoolur.github.io/lightGallery/lightgallery/css/lightgallery.css">
		<link rel="stylesheet" href="css/gallery.css">
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
		<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lightgallery.js"></script>
		<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-fullscreen.js"></script>
		<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-autoplay.js"></script>
		<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-zoom.js"></script>
		<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-hash.js"></script>
		<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-pager.js"></script>
		<script src="http://sachinchoolur.github.io/lightGallery/external/jquery.mousewheel.min.js"></script>
	</head>
	<body class="homepage">

		<!-- Header -->
			<header id="header">
				<!-- Banner -->
				<div id="banner-wrapper">
					<section id="banner">
						<h2>TURISTIKA - NAJBOLJŠE DESTINACIJE TA HIP</h2>
					</section>
				</div>
			</header>

		<!-- Nav -->
			<?php

			$current_site = basename($_SERVER['SCRIPT_FILENAME'], '.php');
?>
			<nav id="nav" class="skel-layers-fixed">
				<ul>
					<li id="li-index"><a href="index.php">Domov</a></li>
                                        <li id="li-countries"><a href="countries.php">Države</a></li>
                                        <li id="li-destinations"><a href="destinations.php">Destinacije</a></li>
                                        <?php 
                                            if (!isset($_SESSION['user_id'])) {
                                                echo '<li id="li-login"><a href="login.php">Prijava</a></li>';
                                                echo '<li id="li-registration"><a href="registration.php">Registracija</a></li>';
                                            }
                                            else {
                                                echo '<li id="li-travels"><a href="travels.php">Moja potovanja</a></li>';
                                                echo '<li id="li-logout"><a href="logout.php">Odjava ('.
                                                        $_SESSION['first_name'].' )</a></li>';
                                            }
                                        ?>
					                                   
										
				</ul>
			</nav>

<script>

    $(document).ready(function(){
        $('#li-<?php echo $current_site; ?>').addClass('current');
    });
</script>

		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<!--<div class="row 200%">
						<div class="12u">
							
							<!-- Highlight 
								<section class="box highlight">
									<ul class="special">
										<li><a href="#" class="icon fa-search"><span class="label">Magnifier</span></a></li>
										<li><a href="#" class="icon fa-tablet"><span class="label">Tablet</span></a></li>
										<li><a href="#" class="icon fa-flask"><span class="label">Flask</span></a></li>
										<li><a href="#" class="icon fa-cog"><span class="label">Cog?</span></a></li>
									</ul>
									<header>
										<h2>A random assortment of icons in circles</h2>
										<p>And some text that attempts to explain their significance</p>
									</header>
									<p>
										Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper mod quis eget mi. Etiam eu<br />
										ante risus. Aliquam erat volutpat. Aliquam luctus et mattis lectus amet pulvinar. Nam nec turpis consequat.
									</p>
								</section>

						</div>
					</div>-->
					<div class="row 200%">
						<div class="12u">

							<!-- Features -->
								<section class="box features">
									<div>
                                                                            <?php 
                                                                                //preverimo za error
                                                                                if (isset($_SESSION['error'])) {
                                                                                    echo '<div id="error">';
                                                                                    echo $_SESSION['error'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['error']);
                                                                                }
                                                                                //preverimo za success
                                                                                if (isset($_SESSION['success'])) {
                                                                                    echo '<div id="success">';
                                                                                    echo $_SESSION['success'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['success']);
                                                                                }
                                                                            ?>