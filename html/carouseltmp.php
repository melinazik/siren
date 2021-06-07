<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf 8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="This page is about life below water and how to protect it from human behavior.">
        <meta name="keywords" content="sealife, marine, water">
        <meta name="author" content="C. Christidis, A. Georgopoulou, C. Pozrikidou, M. Zikou">

        <title>Siren</title>

        <link rel="stylesheet" type="text/css" href="../css/styles.css" />
        <link rel="icon" type="image/png" href="../imgs/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="../js/javascript.js"> </script>
    </head>

    <body>
        <!-- Loading icon -->
        <div class="loader"></div>

        <!-- Navigation Bar -->
        <div class="navbar">
            <div class="nav-bar-siren">
                <div class="siren-icon"></div>
                <a href="home.php" class="active">SIREN</a>
            </div>

            <div class="right-navbar" id="navbarID">
                <ul id="nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="learnmore.php" id="sub-menu-hover">Learn More</a>
                        <ul id="sub-menu">
                            <li><a href="help.php">Causes</a> </li>
                            <li><a href="contact.php">Effects</a></li>
                            <li><a href="login.php">something</a></li>
                        </ul>
                    </li>
                    <li><a href="help.php">How to help</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                    <li><a href="login.php">Login/Register</a></li>

                </ul>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <div class="menu-icon"></div>
                </a>

            </div>
        </div>

        <!-- CAROUSEL -->
        <div class="carousel-wrap">
            <h1>Related Articles</h1>
            <div class="carousel" data-flickity='{"wrapAround": true, "autoPlay": true }'>
                <div class="carousel-cell">
                    <img class="carousel-image" src="../imgs/archelon.jpg">
                    <div class="carousel-article-title">Article no1</div>
                </div>
                <div class="carousel-cell">
                    <img class="carousel-image" src="../imgs/blue-whale.jpg">
                    <div class="carousel-article-title">Article no2</div>
                </div>
                <div class="carousel-cell">
                    <img class="carousel-image" src="../imgs/coral-reef.jpg">
                    <div class="carousel-article-title">Article no3</div>
                </div>
                <div class="carousel-cell">
                    <img class="carousel-image" src="../imgs/archelon.jpg">
                    <div class="carousel-article-title">Article no4</div>
                </div>
                <div class="carousel-cell">
                    <img class="carousel-image" src="../imgs/archelon.jpg">
                    <div class="carousel-article-title">Article no5</div>
                </div>
                <div class="carousel-cell">
                    <img class="carousel-image" src="../imgs/archelon.jpg">
                    <div class="carousel-article-title">Article no6</div>
                </div>
            </div>
        </div>
        <!-- END CAROUSEL -->

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