<?php
session_start();
$username = "Guest";
$email = "";
$pwd = "";
$newPwd = "";
$password_repeat = "";
$_SESSION['success'] = '';
$contactName = "";
$contactEmail = "";
$contactText = "";
$errors = array();
$_SESSION['age'] = "Age";
$_SESSION['gender'] = "Gender";
$_SESSION['lctn'] = "Location";

//connecting to db
$db = mysqli_connect('localhost', 'root', '', 'sirendb') or die("could not connect to db");

//loading user's data from db
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT age FROM user WHERE username='$username'";
    $result = mysqli_query($db, $query);

    $_SESSION['age'] = mysqli_fetch_row($result);

    $query = "SELECT gender FROM user WHERE username='$username'";
    $result = mysqli_query($db, $query);
    $_SESSION['gender'] = mysqli_fetch_row($result);

    $query = "SELECT location FROM user WHERE username='$username'";
    $result = mysqli_query($db, $query);
    $_SESSION['lctn'] = mysqli_fetch_row($result);
}

//registering user
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    $password_repeat = mysqli_real_escape_string($db, $_POST['password_repeat']);

    if (empty($username)) {array_push($errors, "Username required");}
    if (empty($email)) {array_push($errors, "email required");}
    if (empty($pwd)) {array_push($errors, "password required");}
    if ($pwd != $password_repeat) {array_push($errors, "Passwords don't match");}

    //form validation and insertion
    $user_check_query = "SELECT * FROM user WHERE username = '$username' or email='$email' LIMIT 1";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
        if ($user['username'] === $username) {array_push($errors, "Username already exists");}
        if ($user['email'] === $email) {array_push($errors, "email already exists");}
    }

    //register user if no errors appeared
    if (count($errors) == 0) {

        $pwd_encrypted = md5($pwd); //password encrypted
        $imagePath = "../imgs/siren.png";
        $query = "INSERT INTO user (email, username, pwd, imagePath) VALUES ('$email','$username', '$pwd_encrypted', '$imagePath')";
        mysqli_query($db, $query);

        $query = "SELECT * FROM user WHERE username='$username'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results)) {
            $row = $results->fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $row['id'];
            $_SESSION['success'] = "You are now registered";

            header('location: home.php?signup=success');
        }
    } else {
        header('location: login.php?signup=failed');
    }
}

// Login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($pwd)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $pwd = md5($pwd);
        $query = "SELECT * FROM user WHERE username='$username' AND pwd='$pwd'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results)) {
            $row = $results->fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $row['id'];
            $_SESSION['success'] = "You are now logged in!";
            if ($_SESSION['username'] == 'admin') {
                header('location: admin.php?login=success');
            } else {
                header('location: home.php?login=success');
            }
        } else {
            array_push($errors, "Wrong password or username, please try again.");
            header('location: login.php?login=failed');
        }
    }
    return;
}

//logout
if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: home.php'); 
}

//contact part
if (isset($_POST['send'])) {
    $contactName = mysqli_real_escape_string($db, $_POST['contactName']);
    $contactEmail = mysqli_real_escape_string($db, $_POST['contactEmail']);
    $contactText = mysqli_real_escape_string($db, $_POST['contactText']);
    $query = "INSERT INTO messages (contactName, contactEmail, contactText) VALUES ('$contactName','$contactEmail', '$contactText')";
    $results = mysqli_query($db, $query);
    if (!$results) {
        header('location: contact.php?contact=failed');
    } else {
        header('location: contact.php?contact=success');
    }
}

//add article -- ADMIN
if (isset($_POST['add'])) {
    $articleURL = mysqli_real_escape_string($db, $_POST['articleURL']);
    $articleImg = mysqli_real_escape_string($db, $_POST['articleImg']);
    $articleTitle = mysqli_real_escape_string($db, $_POST['articleTitle']);
    $articleCategory = mysqli_real_escape_string($db, $_POST['articleCategory']);
    $query = "INSERT INTO article (numberOfLikes, articleURL, articleImg, articleTitle, category) VALUES (0, '$articleURL','$articleImg', '$articleTitle', '$articleCategory')";
    $result = mysqli_query($db, $query);
    if (!$result) {
        header('location: admin.php?entry=failed');
    } else {
        header('location: admin.php?entry=success');
    }
}

//remove article -- ADMIN
if (isset($_POST['remove'])) {
    $articleId = mysqli_real_escape_string($db, $_POST['articleId']);
    $query = "SELECT * FROM article WHERE article.id = '$articleId'";
    $titleResult = mysqli_query($db, $query);
    if (mysqli_num_rows($titleResult) == 0) {
        header('location: admin.php?remove=failed');
    } else {
        $query = "DELETE FROM article WHERE id = '$articleId'";
        $removalArticle = mysqli_query($db, $query);
        if (!$removalArticle) {
            header('location: admin.php?remove=failed');
        } else {
            $query = "DELETE FROM userlikesarticle WHERE articleId = '$articleId"; //also removing it from the likes table
            $removalUserLikesArticle = mysqli_query($db, $query);
            header('location: admin.php?remove=success');
        }
    }
}

//add favorite
if (isset($_POST['fav'])) {
    $userId = mysqli_real_escape_string($db, $_POST[$_SESSION['id']]);
    $articleTitle = mysqli_real_escape_string($db, $_POST['articleTitle']);
    $query = "INSERT INTO userlikesarticle (userId, articleTitle) VALUES ($userId, $articleTitle)";
    mysqli_query($db, $query);
    header('location: effects.php');
}

//reset request
if (isset($_POST['reset-request'])) { //if user forgot password, a templated, automatic contact message with subject "password change" is inserted into the DB for future reference.
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $query = "SELECT * FROM user WHERE email = '$email'";
    $results = mysqli_query($db, $query);
    if (!$results) {
        header('location: login.php?reset=failed');
    } else {
        $query = "INSERT INTO messages (contactName, contactEmail, contactText) VALUES ('user', '$email', 'PWD CHANGE REQUEST')";
        mysqli_query($db, $query);
        header('location: login.php?reset=requested');
    }
}

//user's data update
if (isset($_POST['done'])) {

    $_SESSION['age'] = mysqli_real_escape_string($db, $_POST['age']);
    $_SESSION['gender'] = mysqli_real_escape_string($db, $_POST['gender']);
    $_SESSION['lctn'] = mysqli_real_escape_string($db, $_POST['location']);

    if (is_null($_SESSION['age']) || ($_SESSION['age'] == "")) {
        $_SESSION['age'] = "Age";
    }

    if (is_null($_SESSION['gender']) || ($_SESSION['gender'] == "")) {
        $_SESSION['gender'] = "Gender";
    }

    if (is_null($_SESSION['lctn']) || ($_SESSION['lctn'] == "")) {
        $_SESSION['lctn'] = "Location";
    }

    $age = $_SESSION['age'];
    $gender = $_SESSION['gender'];
    $lctn = $_SESSION['lctn'];

    $query = "UPDATE user SET age='$age', gender='$gender', location = '$lctn' WHERE username='$username'";
    $results = mysqli_query($db, $query);
    if (!$results) {
        header("location: profile.php?update=failed");
    } else {
        header("location: profile.php?update=success");
    }
}

// upload image
if (isset($_POST['upload'])) {
    $userId = $_SESSION['userId'];

    $target_dir = "../uploads/";
    $target_file = $target_dir . "user" . $userId . "_" . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Get all the submitted data from the form
    $query = "UPDATE user SET imagePath = '$target_file' WHERE id = $userId";

    // Execute query
    mysqli_query($db, $query);
    header("location: profile.php?update=success");
}
