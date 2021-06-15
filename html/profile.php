<?php include('server.php') ?>

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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

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
        <?php if (!isset($_SESSION['username'])) : ?>
          <li><a href="login.php">Login/Register</a></li> <?php endif ?>
        <?php if ($_SESSION['username'] == 'admin') : ?>
          <li><a href="admin.php"><?php echo $_SESSION['username']; ?></a></li>
        <?php else : ?>
          <li><a href="<?php echo $url; ?>"><?php echo $_SESSION['username']; ?></a></li>
        <?php endif ?>

      </ul>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <div class="menu-icon"></div>
      </a>

    </div>
  </div>

  <!-- success or error messages, they appear based on occasion-->
  <?php
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
  <?php if (strpos($url, "update=success") == true) : ?>
    <div class="alert success">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <?php echo "Data updated successfully!"; ?>
    </div> <?php endif ?>

  <?php
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
  <?php if (strpos($url, "update=failed") == true) : ?>
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <?php echo "Couldn't update user data"; ?>
    </div> <?php endif ?>



  <div id="page-view">
    <div id="home-view-title2">Profile</div>
  </div>

  <div class="profile" id="admin-actions-container">
    <div class="box">
      <div class="profile-img">
       <?php 
          // $userId = $_SESSION['userId'];

          // $query = "SELECT * FROM user WHERE id = '$userId";
          // $result = mysqli_query($db, $query);
          // $image = mysqli_fetch_all($result, MYSQLI_ASSOC);
          // $path = $image['imagePath'];
          // echo $path;
          
          // echo "<img id=\"photo-prof\" src=\"$path\"></image>";


        ?>
        <img id="photo-prof" src="../imgs/siren.png"></image>
        <form action="server.php" method="post" enctype="multipart/form-data">
          <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" />
          <button type="submit" value="" name="upload" value="Upload">Upload Image</button>

        </form>
      </div>


      <div class="prof-section">
        <form class="prof-form" action="server.php" method="post">
          <input type="text" name="location" placeholder="<?php echo implode('["', $_SESSION['lctn']); ?>">
          <input type="text" name="age" placeholder="<?php echo implode('["', $_SESSION['age']); ?>">
          <input type="text" name="gender" placeholder="<?php echo implode('["', $_SESSION['gender']); ?>">
          <button type="submit" name="done" id="done">Done</button>
          <button type="submit" name="logout" id="logout">Logout</button> <!-- LOGOUT BUTTON -->
        </form>
      </div>
    </div>
    <div class="contact-container">
      <!-- onclick="callSeeMessages()"-->
      <h3 class="see-msgs-header">Your favorite Articles</h3>

      <div class="contact-inbox">
        <ul>
          <?php $query = "SELECT * FROM userlikesarticle";
          $results = mysqli_query($db, $query);
          $likes = mysqli_fetch_all($results, MYSQLI_ASSOC);
          $size = count($likes);

         
          for ($i = 0; $i < $size; $i++) {
            $articleId = sprintf($likes[$i]['articleId']);
            // $articleId = $likes[$i]['articleId'];
            // $query = "SELECT * FROM articles WHERE id= '$articleId'";
            // $results = mysqli_query($db, $query);
            // $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
            // $articleId = sprintf($articles['id']);
                    
            echo "
            <li>
                <div class=\"messages\">
                  <div class=\"list-left\"><div class=\"name-display\"> USER LIKES</div>
                </div>
                <div class=\"list-right\">
                  <div class=\"message\">
                    <div class=\"mail-display\">$articleId</div>
                    <div class=\"msg-display\">NOTHING HERE YET</div>
                  </div>
                </div>
            </li>";
          }
            
          ?>
      </div>
    </div>
  </div>

  </div>



  <script src="../js/javascript.js"> </script>


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
	</footer>
  <!-- /.footer -->
</body>

</html>
