<?php 
    session_start();
    $username = "Guest";
    $email = "";
    $pwd = "";
    $password_repeat="";
    $_SESSION['success'] = '';
    $contactName="";
    $contactEmail="";
    $contactText="";

    $errors = array();

    //connecting to db
    $db = mysqli_connect('localhost', 'root', '','sirendb') or die("could not connect to db");

    //registering user
    if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    $password_repeat = mysqli_real_escape_string($db, $_POST['password_repeat']);

    if(empty($username)){array_push($errors, "Username required");}
    if(empty($email)){array_push($errors, "email required");}
    if(empty($pwd)){array_push($errors, "password required");}
    if($pwd != $password_repeat){array_push($errors,"Passwords don't match");}

    //form validation and insertion
    $user_check_query = "SELECT * FROM user WHERE username = '$username' or email='$email' LIMIT 1";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);
    if($user){
        if($user['username']===$username){array_push($errors, "Username already exists");}
        if($user['email']===$email){array_push($errors, "email already exists");}
        }

    //register user if no errors appeared
    if(count($errors) == 0){

        $pwd_encrypted = md5($pwd); //password encrypted
        $query = "INSERT INTO user (email, username, pwd) VALUES ('$email','$username', '$pwd_encrypted')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now registered";
        header('location: home.php');
    }
    }


    // Login
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $pwd = mysqli_real_escape_string($db, $_POST['pwd']);

        if(empty($username)){
            array_push($errors, "Username is required");
        }

        if(empty($pwd)){
            array_push($errors, "Password is required");
        }

        if(count($errors)==0){
            $pwd = md5($pwd);
            $query = "SELECT * FROM user WHERE username='$username' AND pwd='$pwd'";
            $results = mysqli_query($db, $query);

            if(mysqli_num_rows($results)){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in!";
                header('location: login.php');
            } else{
                array_push($errors, "Wrong password or username, please try again.");
                header('location: login.php');
            }

        }
    }

    //logout 
    if (isset($_POST['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: home.php');
    }

    //contact part
    if(isset($_POST['send'])){
        $contactName = mysqli_real_escape_string($db, $_POST['contactName']);
        $contactEmail = mysqli_real_escape_string($db, $_POST['contactEmail']);
        $contactText = mysqli_real_escape_string($db, $_POST['contactText']);
        $query = "INSERT INTO messages (contactName, contactEmail, contactText) VALUES ('$contactName','$contactEmail', '$contactText')";
        mysqli_query($db, $query);
        header('location: contact.php');
    }

    //reset password
    if(isset($_POST['reset'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
        $pwd = md5($pwd);
        $user_check_query = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $results = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($results);
        if(mysqli_num_rows($results)){
            $query = "UPDATE user SET pwd='$pwd' WHERE username='$username'";
            mysqli_query($db, $query);
            header('location: home.php');
        } else{
            array_push($errors, "Wrong username, please try again.");
            header('location: login.php');
        }
    }
?>