<?php 
    session_start();
    $username = "Guest";
    $email = "";
    $pwd = "";
    $newPwd = "";
    $password_repeat="";
    $_SESSION['success'] = '';
    $contactName="";
    $contactEmail="";
    $contactText="";
    $errors = array();
    $_SESSION['age']="Age";
    $_SESSION['gender']="Gender";
    $_SESSION['lctn']="Location";



    //connecting to db
    $db = mysqli_connect('localhost', 'root', '','sirendb') or die("could not connect to db");

    //getting user's data
    /*$username = $_SESSION['username'];
    $query = "SELECT age FROM user WHERE username='$username'";
    $_SESSION['age'] = mysqli_query($db, $query);
    if(is_null($_SESSION['age'])){
        $_SESSION['age'] = "Age";
    }
    $query = "SELECT gender FROM user WHERE username='$username'";
    $_SESSION['gender'] = mysqli_query($db, $query);
    if(is_null($_SESSION['gender'])){
        $_SESSION['gender'] = "Gender";
    }
    $query = "SELECT location FROM user WHERE username='$username'";
    $_SESSION['lctn'] = mysqli_query($db, $query);
    if(is_null($_SESSION['lctn'])){
        $_SESSION['lctn'] = "Location";
    }*/
    
    

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
        header('location: home.php?signup=success');
        }
    else{
            header('location: login.php?signup=failed');
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
                if($_SESSION['username']=='admin'){
                    header('location: admin.php?login=success');
                } else {
                    header('location: home.php?login=success');
                }
            } else{
                array_push($errors, "Wrong password or username, please try again.");
                header('location: login.php?login=failed');
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

    //add article -- ADMIN 
    if(isset($_POST['add'])){
        $articleURL = mysqli_real_escape_string($db, $_POST['articleURL']);
        $articleImg = mysqli_real_escape_string($db, $_POST['articleImg']);
        $articleTitle = mysqli_real_escape_string($db, $_POST['articleTitle']);
        $query = "INSERT INTO article (numberOfLikes, articleURL, articleImg, articleTitle) VALUES (0, '$articleURL','$articleImg', '$articleTitle')";
        mysqli_query($db, $query);
        header('location: admin.php');
    }

    //reset password
    if(isset($_POST['reset'])){
        $pwd = mysqli_real_escape_string($db, $_POST['pwdOld']);
        $pwd = md5($pwd);
        $newPwd = mysqli_real_escape_string($db, $_POST['pwdNew']);
        $password_repeat = mysqli_real_escape_string($db, $_POST['pwdNewRep']);
        $username = $_SESSION['username'];

        if(isset($_SESSION['username'])){                   //checking if a user is logged in
            $query = "SELECT pwd FROM user WHERE username='$username'";
            $results = mysqli_query($db, $query);
            if(mysqli_num_rows($results)){                  //checking if the query was successful
                $row = mysqli_fetch_assoc($results);
                if(($pwd = $row["pwd"])&&($newPwd == $password_repeat)){                 //checking if passwords match
                    $newPwd = md5($newPwd);
                    $query = "UPDATE user SET pwd='$newPwd' WHERE username='$username'";
                    mysqli_query($db, $query);
                    header('location: home.php?reset=success');
                } else {
                    header('location: profile.php?reset=failed');
                }
            } else {
                header('location: profile.php?reset=failed'); 
            }
        } else {
            header('location: profile.php?reset=failed');
        }
    }

    
    //reset request
    if(isset($_POST['reset-request'])){  //if user forgot password, a templated, automatic contact message with subject "password change" is inserted into the DB for future reference.
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $query = "INSERT INTO messages (contactName, contactEmail, contactText) VALUES ('user', '$email', 'PWD CHANGE REQUEST')";
        mysqli_query($db, $query);
        header('location: login.php?reset=requested');
    }

    //user's data update
    if(isset($_POST['done'])){
        $username = $_SESSION['username'];
        $_SESSION['age'] = mysqli_real_escape_string($db, $_POST['age']);
        $_SESSION['gender'] = mysqli_real_escape_string($db, $_POST['gender']);
        $_SESSION['lctn'] = mysqli_real_escape_string($db, $_POST['location']);
        $age = $_SESSION['age'];
        $gender = $_SESSION['gender'];
        $lctn = $_SESSION['lctn'];
        $query = "UPDATE user SET age='$age', gender='$gender', location = '$lctn' WHERE username='$username'";
        $results= mysqli_query($db, $query);
        $headerString = "profile.php?&";
        $headerString = $headerString . $age . "&" . $gender . "&" . $lctn;
        //echo $headerString;
        header("location: $headerString");
    }


    
    // upload image
    if (isset($_POST['upload'])&& $_FILES["image"]["error"] == 0) {
        
        $filename = $_FILES["image"]["name"];
   
            $folder = "image/".$filename;
            
            // Get all the submitted data from the form
            $sql = "INSERT INTO image (filename) VALUES ('$filename')";
    
            // Execute query
            mysqli_query($db, $sql);
            
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($filename, $folder))  {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
        }
        echo $msg;
    }
    $result = mysqli_query($db, "SELECT * FROM image");


    // // File upload path
    // $targetDir = "image/";
    // $fileName = basename($_FILES["image"]["name"]);
    // $targetFilePath = $targetDir . $fileName;
    // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // if(isset($_POST["upload"]) && !empty($_FILES["image"]["name"])){
    //     // Allow certain file formats
    //     $allowTypes = array('jpg','png','jpeg','gif','pdf');
    //     if(in_array($fileType, $allowTypes)){
    //         // Upload file to server
    //         if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
    //             // Insert image file name into database
    //             $insert = $db->query("INSERT into image (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
    //             if($insert){
    //                 $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
    //             }else{
    //                 $statusMsg = "File upload failed, please try again.";
    //             } 
    //         }else{
    //             $statusMsg = "Sorry, there was an error uploading your file.";
    //         }
    //     }else{
    //         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    //     }
    // }else{
    //     $statusMsg = 'Please select a file to upload.';
    // }
    
?>