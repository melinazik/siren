<?php 
    session_start();

    //connecting to db
    $db = mysqli_connect('localhost', 'root', '','sirendb') or die("could not connect to db");
 
    if(isset($_GET["favorite"]) and isset($_GET["articleId"]) and isset($_GET["userId"])) {
        
        $userId =  $_GET["userId"];
        $articleId = $_GET["articleId"];
        $favorite = $_GET["favorite"];

        $query = "SELECT * FROM userlikesarticle WHERE userId = '$userId' and articleId = '$articleId'";
        $results = mysqli_query($db, $query);
        
        if($favorite == 'true'){
            if(!mysqli_num_rows($results)){
                $query = "INSERT INTO userlikesarticle (userId, articleId) VALUES ('$userId', '$articleId')";
                mysqli_query($db, $query);
            }
        }
        else{
            $query = "DELETE FROM userlikesarticle WHERE userId = '$userId' and articleId = '$articleId'";
            mysqli_query($db, $query);
        }

        $count = "SELECT COUNT(articleId) FROM userlikesarticle WHERE articleId = '$articleId'";
        echo $count;
        $query = "UPDATE article SET numberOfLikes='$count' WHERE articleId = '$articleId'";
        mysqli_query($db, $query);

    }
