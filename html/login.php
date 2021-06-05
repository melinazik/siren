<?php 
    session_start();
    $username = "";
    $pwd = "";

    $errors = array();
    
    //connecting to db
    $db = mysqli_connect('localhost', 'root', '','webtest') or die("could not connect to db");
    
    if(isset($_POST['submit'])){
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
            $query = "SELECT * FROM registration WHERE username='$username' AND pwd='$pwd'";
            $results = mysqli_query($db, $query);

            if(mysqli_num_rows($results)){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in!";
                header('location: home.html');
            } else{
                array_push($errors, "Wrong password or username, please try again.");
                header('location: help.html');
            }

        }
    }
?>