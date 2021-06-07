
<?php include('server.php')?>
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
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
		<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
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

					<?php if(!isset($_SESSION['username'])):?>
					<li><a href="login.php">Login/Register</a></li>
					<?php else: ?>
					<li><a href="profile.php"><?php echo $_SESSION['username'];?></a></li>
        			<?php endif ?>


				</ul>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
					<div class="menu-icon"></div>
				</a>

			</div>
		</div>

		<div id="page-view">
			<div id="home-view-title2">Causes</div>
		</div>

		<!--Info section -->
		<section class="info">
			<div class="container">
				<div class="description-container">

					<div class="description-container-text">
						<img src="../imgs/ice-caps.jpg" alt="sewage" class="img-responsive floating-image right">
						<h3 class="container-title">Climate change</h3>
						<p>Global warming has resulted in melting of polar ice caps. This means sea levels are increasing
							and the water is getting warmer. For this reason,
							many species that rely mainly on glaciers for continued existence, are forced to move further
							north. In consequence, the fish species will reduce
							and so will be the survival of the birds and animals that are dependent and adapted to the
							glacier habitats.</p>
						<p>Warm waters are also increasing coral bleaching events, causing the coral reefs to shed the
							zooxanthellae, which gives them their brilliant colors.
							It is important to know that corals support the life and breeding of many marine creatures and
							if they continue to be affected by climate change
							– highly influenced by greenhouse emissions, they will continue to die.
						</p><br>
						<hr>
						<hr>
					</div>

					<div class="description-container-text">
						<img src="../imgs/overfishing.jpg" alt="sewage" class="img-responsive floating-image left">
						<h3 class="container-title">Overfishing</h3>
						<p>Overfishing occurs when more fish are caught than the population can replace through natural
							reproduction, according to WWF. Due to unrestricted,
							unregulated fishing (UUF), over 75% of the world’s fish have been fully exploited or depleted.
							The results not only affect the balance of life in the oceans,
							but also the social and economic well-being of the coastal communities who depend on fish for
							their way of life. Although, it is very difficult to regulate
							fishing areas due to lack of resources and tracking activity. In addition to that, most areas in
							the world have a total lack of oversight related to their
							fishing industry, which means the activity of fishing fleets is barely even monitored.</p><br>
						<hr>
						<hr>
					</div>

					<div class="description-container-text">
						<img src="../imgs/floating-bag.jpg" alt="sewage" class="img-responsive floating-image right">
						<h3 class="container-title">Marine pollution</h3>
						<p>Marine pollution mainly comes from the mainland into the ocean, although it might arise from the
							oceans themselves, like during oil spills. It originates primarily
							from domestic, commercial, and industrial resources. Organic waste and chemical nutrients end up
							in our seas and can lead to oxygen depletion, decay of plant life
							and serious decline in the quality of the seawater. Not to mention that many animals are
							becoming entangled in the floating debris, or mistake it for food and swallow it.
						</p><br><br><br>
						<hr>
						<hr>
					</div>

					<div class="description-container-text">
						<img src="../imgs/coral-reef.jpg" alt="sewage" class="img-responsive floating-image left">
						<h3 class="container-title">Ocean Acidification</h3>
						<p>Ocean acidification is the process whereby ocean waters increase in acid concentration, and the
							pH level falls beyond normal. Mainly it arises due to the release of
							sulfur and nitrogen oxides, and carbon dioxide from greenhouse gases, which also cause global
							warming and climate change. As the water becomes more acidic, it loses its
							ability to sustain marine organisms. Some marine creatures lose their ability to form shells and
							there is an increased chance for disruption in their reproductive processes.
							Thus, a great deal of marine species disappears from the aquatic ecological environment.</p>
					</div>
				</div>

				<!-- CAROUSEL -->
				<div class="carousel-wrap">
					<h1>Related Articles</h1>
					<div class="carousel" data-flickity='{"wrapAround": true, "autoPlay": true }'>
						<div class="carousel-cell">
							<a href="https://www.nrdc.org/stories/global-climate-change-what-you-need-know" target="_blank"><img class="carousel-image" src="../imgs/bear_iceberg.PNG"></a>
							<div class="carousel-article-title">Global Climate Change: What You Need to Know.</div>
						</div>
						<div class="carousel-cell">
							<a href="https://www.conserve-energy-future.com/causes-effects-solutions-depleting-marine-life.php" target="_blank"><img class="carousel-image" src="../imgs/fish_ocean.PNG"></a>
							<div class="carousel-article-title">What is Marine Life?</div>
						</div>
						<div class="carousel-cell">
							<a href="https://www.nationalgeographic.com/magazine/article/plastic-planet-health-pollution-waste-microplastics" target="_blank"><img class="carousel-image" src="../imgs/plastic_bottle.PNG"></a>
							<div class="carousel-article-title">We Know Plastic Is Harming Marine Life. What About Us?</div>
						</div>
						<div class="carousel-cell">
							<a href="https://www.wwf.org.au/news/blogs/what-do-sea-turtles-eat-unfortunately-plastic-bags#gs.z3r46c" target="_blank"><img class="carousel-image" src="../imgs/turtle_plastic.PNG"></a>
							<div class="carousel-article-title">What do sea turtles eat? Unfortunately, plastic bags.</div>
						</div>
						<div class="carousel-cell">
							<a href="https://www.wayfairertravel.com/inspiration/worlds-most-endangered-marine-species/" target="_blank"><img class="carousel-image" src="../imgs/sea_otter.PNG"></a>
							<div class="carousel-article-title">10 of the World's Most Endangered Marine Species.</div>
						</div>
						
						<div class="carousel-cell">
							<a href="https://www.worldwildlife.org/stories/how-climate-change-relates-to-oceans" target="_blank"><img class="carousel-image" src="../imgs/ocean_sunset.PNG"></a>
							<div class="carousel-article-title">How climate change relates to oceans.</div>
						</div>
					</div>
				</div>

			</div>
		</section class="info">
		<!-- ./info section-->

		<!-- FOOTER -->
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
							<li><span><i class="fas fa-envelope"></i>&nbsp; info@sirenauth.com</span></li>
						</ul>
					</div>

					<div class="col follow-us">
						<h4 class="follow-footer">Follow us</h4>
						<div class="social-links">
							<a href="https://www.facebook.com/siren.auth/" target="_blank"><i class="fab fa-facebook-f"></i></a>
							<a href="https://twitter.com/AuthSiren" target="_blank"><i class="fab fa-twitter"></i></a>
							<a href="https://www.instagram.com/siren_auth/" target="_blank"><i class="fab fa-instagram"></i></a>
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					&copy; Siren 2021
				</div>
			</div>
		</footer>
		<!-- ./FOOTER -->

	</body>
</html>