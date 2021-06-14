<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<?php if (isset($_SESSION['username']) && ($_SESSION['username'] != 'admin')) {
  header('location: home.php?access=denied');                              //can't access admin page if it's a regular user
} ?>

<?php if (!isset($_SESSION['username'])) {
  header('location: home.php?access=denied');                              //can't access admin page if not logged in
} ?>


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
        <?php if (isset($_SESSION['username']) && ($_SESSION['username'] == 'admin')) : ?>
          <li><a href="admin.php"><?php echo $_SESSION['username']; ?></a></li> <?php endif ?>
        <?php if (isset($_SESSION['username']) && ($_SESSION['username'] != 'admin')) : ?>
          <li><a href="profile.php"><?php echo $_SESSION['username']; ?></a></li> <?php endif ?>
        <?php if (!isset($_SESSION['username'])) : ?>
          <li><a href="login.php">Login/Register</a></li> <?php endif ?>


      </ul>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <div class="menu-icon"></div>
      </a>

    </div>
  </div>


  <!-- success or error messages, they appear based on occasion-->
  <?php
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
  <?php if (strpos($url, "entry=success") == true) : ?>
    <div class="alert success">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <?php echo "Article added successfully!"; ?>
    </div> <?php endif ?>

  <?php
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
  <?php if (strpos($url, "entry=failed") == true) : ?>
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <?php echo "Could not add article into database"; ?>
    </div> <?php endif ?>

  <div id="page-view">
    <div class="sticky-title">! You are logged in as admin !</div>
  </div>

  <div id="admin-container">
    <div class="admin-actions">
      <!-- onclick="callAddArticle()"-->
      <div class="admin-action-panel">
        <p>Add a new Article</p>
        <div class="admin-action-image" id="action-image1" onclick="document.getElementById('add-article').style.display='block'"></div>

        <div id="add-article" class="popup">
          <span onclick="document.getElementById('add-article').style.display='none'" class="close" title="Close popup">&times;</span>
          <form class="popup-content" action="server.php" method="post">
            <h1>Add Article</h1>
            <input class="login-form-text" type="text" placeholder="Article URL" required name="articleURL" id="articleURL">
            <input class="login-form-text" type="text" placeholder="Article Image" required name="articleImg" id="articleImg">
            <input class="login-form-text" type="text" placeholder="Article Title" required name="articleTitle" id="articleTitle">
            <button type="submit" style="width:150px;" name="add" id="add">Add Article</button>
          </form>

        </div>
      </div>
      <div class="admin-action-panel">
        <p>Remove Article</p>
        <div class="admin-action-image" id="action-image2" onclick="document.getElementById('remove-article').style.display='block'"></div>

        <div id="remove-article" class="popup">
          <span onclick="document.getElementById('remove-article').style.display='none'" class="close" title="Close popup">&times;</span>
          <form class="popup-content" action="server.php" method="post">
            <h1>Remove Article</h1>
            <input class="login-form-text" type="text" placeholder="Article URL" required name="articleURL" id="articleURL">
            <input class="login-form-text" type="text" placeholder="Article Image" required name="articleImg" id="articleImg">
            <input class="login-form-text" type="text" placeholder="Article Title" required name="articleTitle" id="articleTitle">
            <button type="submit" style="width:150px;" name="add" id="add">Remove Article</button>
          </form>

        </div>
      </div>
    </div>

    <div>
      <!-- onclick="callSeeMessages()"-->
      <h3 class="see-msgs-header">User Messages</h3>

      <div class="contact-inbox">
        <ul>
          <?php $query = "SELECT * FROM messages";
          $results = mysqli_query($db, $query);
          $messages = mysqli_fetch_all($results, MYSQLI_ASSOC);
          $size = count($messages);
          for ($i = 0; $i < $size; $i++) {
            $name = sprintf($messages[$i]['contactName']);
            $email = sprintf($messages[$i]['contactEmail']);
            $text =  sprintf($messages[$i]['contactText']);
            echo "

                            <li>
                                <div class=\"messages\">
                                  <div class=\"list-left\"><div class=\"name-display\"> $name </div>
                                </div>
                                <div class=\"list-right\">
                                  <div class=\"message\">
                                    <div class=\"mail-display\">$email</div>
                                    <div class=\"msg-display\">$text</div>
                                  </div>
                               </div>
                            </li>";
          }
          ?>

        </ul>
      </div>
    </div>


    <div class="login-section">
      <form class="login-form" action="server.php" method="post">
        <button type="submit" style="width:150px;" name="logout" id="logout">Logout</button>
      </form>
    </div>
    <!--<button class="admin-action-button" onclick="callAddArticle()">Add Article</button>-->
    <!--<button class="admin-action-button" onclick="callSeeMessages()">See Messages</button>-->

  </div>
  </div>

  <script src="../js/javascript.js"> </script>

  </div>

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
