<?php 
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'webtest');
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    } else{
        $stmt = $conn ->prepare("insert into registration(email,username,password,password_repeat) values(?,?,?,?)");
        $stmt->bind_param("ssss", $email,$username, $password,$password_repeat);
        $stmt->execute();
        echo "registration successful";
        $stmt->close();
        $conn->close();
    }
?>