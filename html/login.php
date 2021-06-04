<?php 
    session_start();
    $username = "";
    $pwd = "";

    $errors = array();
    
    //connecting to db
    $db = mysqli_connect('localhost', 'root', '','webtest') or die("could not connect to db");

    //getting user's input
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    
    if(empty($username)){array_push($errors, "Username required");}
    if(empty($pwd)){array_push($errors, "password required");}
    
    //form validation and insertion
    $user_check_query = "SELECT * FROM registration WHERE username = '$username' or email='$email' LIMIT 1";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);
    if(!$user){
        if($user['username']===$username){array_push($errors, "Username doesn't exist");}
        }
    
?>