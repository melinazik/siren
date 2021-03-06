<?php include 'server.php' ?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf 8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="This page is about life below water and how to protect it from human behavior">
  <meta name="keywords" content="sealife, marine, water">
  <meta name="author" content="C. Christidis, A. Georgopoulou, C. Pozrikidou, M. Zikou">

  <title>Siren</title>

  <link rel="icon" type="image/png" href="../imgs/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="../css/styles.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

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

        <?php if (isset($_SESSION['username']) && ($_SESSION['username'] == 'admin')) : ?>
          <li><a href="admin.php"><?php echo $_SESSION['username']; ?></a></li> <?php endif ?>
        <?php if (isset($_SESSION['username']) && ($_SESSION['username'] != 'admin')) : ?>
          <li><a href="profile.php">
              <?php
              $userId = $_SESSION['userId'];

              $query = "SELECT * FROM user WHERE id = $userId";
              $result = mysqli_query($db, $query);
              $image = mysqli_fetch_assoc($result);
              $path = $image['imagePath'];
              $username =  $_SESSION['username'];

              echo "<div class=\"nav-name\"> $username <img id=\"photo-prof-nav\" src=\"$path\"> </div>";

              ?></a></li><?php endif ?>
        <?php if (!isset($_SESSION['username'])) : ?>
          <li><a href="login.php">Login/Register</a></li> <?php endif ?>

      </ul>
      <a href="javascript:void(0);" class="icon" onclick="hamburger()">
        <div class="menu-icon"></div>
      </a>

    </div>
  </div>


  <div id="page-view">
    <div id="home-view-title2">How to help</div>
  </div> <br><br>

  <div class="help-header">
    Want to help? This is your chance.
  </div>

  <div class="container">
    <div class="description-container">
      <div class="description-container-text">
        <p>The oceans need our help. While it's important to learn about the issues and the dangers that underwater
          organisms face,
          it's also essential that we all do something to help in practice. Whether that is voluntary work, raising
          awareness and spreading the word
          or donating to conservationist organisms, you can find useful links below on how to do so. We strongly
          encourage taking action in order to
          save our planet. It's in our hand.</p>
        <br>
        <hr>
        <hr>
      </div>
    </div>
  </div>

  <div class="logos-container">

    <div class="help-title"><br>
      International Marine Life related NGOs
    </div> <br> <br>

    <div class="img-row">
      <div class="img-column">
        <a href="https://oceana.org" target="_blank"><img class="resp-img image-resize" src="../imgs/oceana.png"> </a>
      </div>
      <div class="img-column">
        <a href="https://greenpeace.org" target="_blank"><img class="resp-img image-resize" src="../imgs/greenpeace.png"> </a>
      </div>
      <div class="img-column">
        <a href="https://bahamasplasticmovement.org" target="_blank"><img class="resp-img image-resize" src="../imgs/bpm.png"> </a>
      </div>
    </div> <br><br>

    <div class="img-row">
      <div class="img-column">
        <a href="https://www.noaa.gov/" target="_blank"><img class="resp-img image-resize" src="../imgs/noaa.png"> </a>
      </div>
      <div class="img-column">
        <a href="https://www.barrierreef.org/" target="_blank"><img class="resp-img image-resize" src="../imgs/barrierreef.png"> </a>
      </div>
      <div class="img-column">
        <a href="https://www.wetlands.org/" target="_blank"><img class="resp-img image-resize" src="../imgs/wetlands.png"> </a>
      </div>
    </div><br><br><br><br>

    <div class="help-title"> <br>
      Greek Marine Life related NGOs </div> <br>

    <div class="img-row">
      <div class="img-column">
        <a href="https://archipelago.gr" target="_blank"><img class="resp-img image-resize" src="../imgs/archipelago.png"> </a>
      </div>
      <div class="img-column">
        <a href="https://medasset.org/" target="_blank"><img class="resp-img image-resize" src="../imgs/medasset.jpg">
        </a>
      </div>
      <div class="img-column">
        <a href="https://archelon.gr" target="_blank"><img class="resp-img image-resize" src="../imgs/archelon.jpg">
        </a>
      </div>
    </div> <br><br>

    <div class="img-row">
      <div class="img-column">
        <a href="http://medsos.gr/medsos/" target="_blank"><img class="resp-img image-resize" src="../imgs/medsos.PNG">
        </a>
      </div>
      <div class="img-column">
        <a href="https://mom.gr" target="_blank"><img class="resp-img image-resize" src="../imgs/mom.jpg"> </a>
      </div>
      <div class="img-column">
        <a href="https://www.helmepa.gr/" target="_blank"><img class="resp-img image-resize" src="../imgs/helmepa.png">
        </a>
      </div>
    </div><br><br><br>

    <div class="help-button-container">
      <button class="help-button">
        <div class="rescue-link">
          <a href="https://nmlc.org/rehabilitation/what-you-can-do-for-a-stranded-marine-animal/#:~:text=9.,Guard%20on%20VHF%20Channel%2016." target="_blank">
            See how you can help if you come across an endangered marine animal
          </a>
        </div>
      </button>
    </div><br> <br>

    <div class="hotline-title">
      Useful Hotlines <br>
    </div>

    <div class="img-row">
      <div class="img-column">
        <div class="hotline-title"><br> Greece (+30)</div>
        <div class="container-help-text">
          <p class="hotline-par">Hellenic Coast Guard: 108</p>
          <p class="hotline-par">Greenpeace Greece: 210 3840774<br></p>
          <p class="hotline-par">Medasset: 210 364038<br></p>
          <p class="hotline-par">Rhodes National Aquarium: 2241 027308</p>
        </div>
      </div>

      <div class="img-column">
        <div class="hotline-title"><br>EU </div>
        <p class="hotline-par">
          </pclass>European Emergency Number: 112 <br> </p>
        <p class="hotline-par">
          </pclass>EUCC Coastal & Marine: +31(0)715143719<br> </p>
        <p class="hotline-par">
          </pclass>UK Marine Conservation Society: +44 01989 566017</p>
      </div>

      <div class="img-row">
        <div class="hotline-title"><br>USA </div>
        <p class="hotline-par">NOAA Marine Animal Entanglement: 1-800-900-3622 </p>
        <p class="hotline-par">New England Aquarium: (617) 973-5247 <br> </p>
        <p class="hotline-par">Ocean Conservancy: 800-519-1541<br> </p>
      </div><br>
    </div>
  </div>
  </div>

  <!--footer-->
  <footer>
    <div class="footer-content">
      <div class="row">
        <div class="col about">
          <h4>About Us</h4>
          <p class="footer-about">We are a group of university students hoping to motivate you to take action. We are
            providing you
            with a bunch of useful articles, documentaries and links to research the matter yourself.
            <br> We should not sit back and watch our planet get destroyed.<br>We must protect it.
          </p>
        </div>

        <div class="col contact-info">
          <h4 class="contact-footer">Contact Us</h4>
          <ul>
            <li><span><i class="fas fa-map-marker-alt"></i>&nbsp; Thessaloniki, Greece</span></li>
            <li><span><i class="fas fa-phone"></i>&nbsp; 2310-097834</span></li>
            <li><span style="text-transform: lowercase;"><i class="fas fa-envelope"></i>&nbsp; info@sirenauth.com</span>
            </li>
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
