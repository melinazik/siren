<?php include('server.php')?>

<!DOCTYPE html>
<html lang ="en">



  <head>
    <meta charset="utf 8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This page is about life below water and how to protect it from human behavior">
    <meta name="keywords" content="sealife, marine, water">
    <meta name="author" content="C. Christidis, A. Georgopoulou, C. Pozrikidou, M. Zikou">

    <title>Siren</title>
    <link rel="icon" type="image/png" href="../imgs/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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

  				<?php if(isset($_SESSION['username'])&&($_SESSION['username']=='admin')):?>
					<li><a href="admin.php"><?php echo $_SESSION['username'];?></a></li> <?php endif?>
					<?php if(isset($_SESSION['username'])&&($_SESSION['username']!='admin')): ?>
					<li><a href="profile.php"><?php echo $_SESSION['username'];?></a></li> <?php endif?>
					<?php if(!isset($_SESSION['username'])): ?>
					<li><a href="login.php">Login/Register</a></li> <?php endif ?>

  			</ul>
  			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
  				<div class="menu-icon"></div>
  			</a>

  		</div>
  	</div>
    <div id="page-view">
  		<div id="home-view-title2">Login / Signup</div>
  	</div>


    <!-- error messages, they appear based on occasion-->
      <?php
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
        <?php if(strpos($url, "signup=failed")==true): ?>
          <div class="alert"> <!-- error messages section -->
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php echo "Signup failed, please try again"; ?>
          </div> <?php endif ?>

        <?php if(strpos($url, "login=failed")==true): ?>
          <div class="alert"> <!-- error messages section -->
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php echo "Wrong username or password"; ?>
          </div> <?php endif ?>


        <?php if(strpos($url, "reset=failed")==true): ?>
          <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php echo "Wrong username, try again"; ?>
          </div> <?php endif ?>

          <?php if(strpos($url, "reset=requested")==true): ?>
          <div class="alert success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php echo "Password reset requested successfully!"; ?>
          </div> <?php endif ?>





  <!-- login form  -->
  <main class="main-holder">

    <div class="login-section">
      <!-- login form  -->
      <form class="login-form" action="server.php"  method="post">
          <input type="text" class="login-form-text" placeholder="Username" required name="username" id="username"> <!-- login is done with username only, not email-->
          <input type="password" class="login-form-text" placeholder="Password" required name="pwd" id="pwd" >

          <button type="submit" style="width:150px;" name="login" id="login">Login </button>
        </form>
      </div>

    <div class="login-section">
      <p>
        Click the button below to create an account.
      </p>
      <!-- signup form - appears when you click signup button -->
      <button onclick="document.getElementById('id01').style.display='block'" style="width:150px;">Sign Up</button>

      <div id="id01" class="popup">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close popup">&times;</span>
        <form class="popup-content" action="server.php" method="post">
            <h1>Sign Up</h1>
            <input class="login-form-text" type="text" placeholder="Email" name="email" required id="email" >
            <input class="login-form-text" type="text" placeholder="Username" name="username" required id="username">
            <input class="login-form-text" type="password" placeholder="Password" name="pwd" required id="pwd">
            <input class="login-form-text" type="password" placeholder="Repeat Password" name="password_repeat" required id="password_repeat">

          <!-- TODO privacy policy -->
          <p>
            By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.
          </p>

          <button type="submit" style="width:150px;" name="register" id="register">Sign Up</button>
        </form>
      </div>
    </div>
    <div class="login-section">
      <p>Click the button below if you forgot your password.</p>
      <!-- signup form - appears when you click signup button -->
      <button onclick="document.getElementById('id02').style.display='block'" style="width:200px;">Reset Password</button>

      <div id="id02" class="popup">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close popup">&times;</span>
        <form class="popup-content" action="server.php" method="post">
            <h1>Reset password</h1>
            <input  class="login-form-text" type="text" placeholder="Insert your email" name="email" required id="email">
            <button type="submit" style="width:150px;" name="reset-request" id="reset-request">Submit</button>
        </form>
      </div>
    </div>


  </main>

  <!--footer-->
  <footer>
    <div class="footer-content">
      <div class="row">
      <div class="col about">
        <h4>About Us</h4>
        <p class="footer-about">We are a group of university students hoping to motivate you to take action. We are providing you
          with a bunch of useful articles, documentaries and links to research the matter yourself.
          <br> We should not sit back and watch our planet get destroyed.<br>We must protect it.
        </p>
      </div>

      <div class="col contact-info">
        <h4 class="contact-footer">Contact Us</h4>
        <ul>
          <li><span><i class="fas fa-map-marker-alt"></i>&nbsp; Thessaloniki, Greece</span></li>
          <li><span><i class="fas fa-phone"></i>&nbsp; 2310-097834</span></li>
          <li><span style="text-transform: lowercase;"><i class="fas fa-envelope"></i>&nbsp; info@sirenauth.com</span></li>
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
  </div>
  </footer>
  <!-- /.footer -->
  	</body>

  </html>
