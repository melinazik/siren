<?php 
    session_start();

    //connecting to db
    $db = mysqli_connect('localhost', 'root', '','sirendb') or die("could not connect to db");
 
    if(isset($_GET["favorite"]) and isset($_GET["articleId"]) and isset($_GET["userId"])) {
        
        $userId =  $_GET["userId"];
        $articleId = $_GET["articleId"];

        $query = "INSERT INTO userlikesarticle (userId, articleId) VALUES ($userId, $articleId)";
        mysqli_query($db, $query);

    }
?>