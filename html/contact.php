<?php include 'server.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf 8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="This page is about life below water and how to protect it from human behavior.">
	<meta name="keywords" content="sealife, marine, water">
	<meta name="author" content="C. Christidis, A. Georgopoulou, C. Pozrikidou, M. Zikou">

	<title>Siren</title>

	<link rel="icon" type="image/png" href="../imgs/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../css/styles.css" />
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="../js/javascript.js"> </script>
</head>

<body>
	<!-- Loading icon -->
	<div class="loader"></div>

	<div class="navbar">
		<div class="nav-bar-siren">
			<div class="siren-icon"></div>
			<a href="home.php" class="active">SIREN</a>
		</div>

		<div class="right-navbar" id="navbarID">
			<ul id="nav">
				<li><a href="home.php">Home</a></li>
				<li><a id="sub-menu-hover">Learn More</a>
					<ul id="sub-menu">
						<li><a href="causes.php">Causes</a> </li>
						<li><a href="effects.php">Effects</a></li>
						<li><a href="resources.php">Resources</a></li>
					</ul>
				</li>
				<li><a href="help.php">How to help</a></li>
				<li><a href="contact.php">Contact us</a></li>

				<?php if (isset($_SESSION['username']) && ($_SESSION['username'] == 'admin')): ?>
				<li><a href="admin.php"><?php echo $_SESSION['username']; ?></a></li> <?php endif?>
				<?php if (isset($_SESSION['username']) && ($_SESSION['username'] != 'admin')): ?>
				<li><a href="profile.php">
						<?php
$userId = $_SESSION['userId'];

$query = "SELECT * FROM user WHERE id = $userId";
$result = mysqli_query($db, $query);
$image = mysqli_fetch_assoc($result);
$path = $image['imagePath'];
$username = $_SESSION['username'];

echo "<div class=\"nav-name\"> $username <img id=\"photo-prof-nav\" src=\"$path\"> </div>";

?></a></li><?php endif?>
				<?php if (!isset($_SESSION['username'])): ?>
				<li><a href="login.php">Login/Register</a></li> <?php endif?>

			</ul>
			<a href="javascript:void(0);" class="icon" onclick="hamburger()">
				<div class="menu-icon"></div>
			</a>

		</div>
	</div>

	<!-- success or error messages, they appear based on occasion-->
	<?php
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
	<?php if (strpos($url, "contact=success") == true): ?>
	<div class="alert success">
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		<?php echo "Your message was sent successfully!"; ?>
	</div> <?php endif?>

	<?php
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
	<?php if (strpos($url, "update=failed") == true): ?>
	<div class="alert">
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		<?php echo "Failed to send message."; ?>
	</div> <?php endif?>


	<div id="page-view">
		<div id="home-view-title2">Contact us</div>
	</div>

	<main class="main-holder">
		<div class="contact-section">

			<form class="contact-form" action="server.php" method="post">
				<input type="name" class="contact-form-text" placeholder="Your name" required name="contactName"
					id="contactName">
				<input type="email" class="contact-form-text" placeholder="Your email" required name="contactEmail"
					id="contactEmail">
				<textarea type="text" class="contact-form-text" placeholder="Your message" required name="contactText"
					id="contactText"></textarea>
				<button type="submit" style="width:150px;" name="send" id="send">Send</button>

		</div>
	</main>
	<!--footer-->
	<footer>
		<div class="footer-content">
			<div class="row">
				<div class="col about">
					<h4>About Us</h4>
					<p class="footer-about">We are a group of university students hoping to motivate you to take action.
						We are providing you
						with a bunch of useful articles, documentaries and links to research the matter yourself.
						<br> We should not sit back and watch our planet get destroyed.<br>We must protect it.
					</p>
				</div>

				<div class="col contact-info">
					<h4 class="contact-footer">Contact Us</h4>
					<ul>
						<li><span><i class="fas fa-map-marker-alt"></i>&nbsp; Thessaloniki, Greece</span></li>
						<li><span><i class="fas fa-phone"></i>&nbsp; 2310-097834</span></li>
						<li><span style="text-transform: lowercase;"><i class="fas fa-envelope"></i>&nbsp;
								info@sirenauth.com</span></li>
					</ul>
				</div>


				<div class="col follow-us">
					<h4 class="follow-footer">Follow us</h4>
					<div class="social-links">
						<a href="https://www.facebook.com/siren.auth/" target="_blank"><i
								class="fab fa-facebook-f"></i></a>
						<a href="https://twitter.com/AuthSiren" target="_blank"><i class="fab fa-twitter"></i></a>
						<a href="https://www.instagram.com/siren_auth/" target="_blank"><i
								class="fab fa-instagram"></i></a>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				&copy; Siren 2021
			</div>
		</div>
	</footer>
	<!-- /.footer -->
</body>

</html>