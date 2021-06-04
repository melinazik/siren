<?php 
    session_start();
    $username = "";
    $email = "";
    $pwd = "";
    $password_repeat="";

    $errors = array();

    //connecting to db

    $db = mysqli_connect('localhost', 'root', '1234','webtest') or die("could not connect to db");

    //registering user

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    $password_repeat = mysqli_real_escape_string($db, $_POST['password_repeat']);


    if(empty($username)){array_push($errors, "Username required");}
    if(empty($email)){array_push($errors, "email required");}
    if(empty($pwd)){array_push($errors, "password required");}
    if($pwd != $password_repeat){array_push($errors,"Passwords don't match");}

    //form validation and insertion
    $user_check_query = "SELECT * FROM registration WHERE username = '$username' or email='$email' LIMIT 1";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if($user){
        if($user['username']===$username){array_push($errors, "Username already exists");}
        if($user['email']===$email){array_push($errors, "email already exists");}
        }

    if(count($errors) == 0){

        $pwd_encrypted = md5($pwd); //password encrypted
        $query = "INSERT INTO registration (email, username, pwd) VALUES ('$email','$username', '$pwd_encrypted')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now registered";
        echo "SUCCESS!!!!"
    }
?>