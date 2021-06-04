<?php 

    session_start();
    $username = "";
    $email = "";
    $pwd = "";
    $password_repeat="";

    $errors = array();

    //connecting to db

    $db = mysqli_connect('localhost', 'root', '','webtest') or die("could not connect to db");

    //registering user

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    $password_repeat = mysqli_real_escape_string($db, $_POST['password_repeat']);

    $pwd_encrypted = md5($pwd); //password encrypted
    $query = "INSERT INTO registration (email, username, pwd) VALUES ('$email','$username', '$pwd_encrypted')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now registered";
    
    echo"SUCCESS!!!"
?>