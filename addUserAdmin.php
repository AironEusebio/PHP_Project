<?php

    session_start();

    include 'config.php';
    
    if(isset($_POST['registerUsername']) && isset($_POST['registerPass']) &&
        isset($_POST['registerEmail']) && isset($_POST['registerRePass']) && 
        isset($_POST['registerFullname'])){
        function validate($userData){
            $userData = trim($userData);
            $userData = stripslashes($userData);
            $userData = htmlspecialchars($userData);
            return $userData;
        }

        $username = validate($_POST['registerUsername']);
        $password = validate($_POST['registerPass']);
        $email = validate($_POST['registerEmail']);
        $repass = validate($_POST['registerRePass']);
        $registerFullname = validate($_POST['registerFullname']);


        $userData = 'registerUsername='. $username. '&registerEmail='. $email;

        if($password !== $repass){
            header("Location: home.php?err");
            exit();
        }else{
            $password = md5($password);
            $sql = "SELECT * FROM user WHERE username='$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                header("Location: home.php?error=The email is taken try another&$userData");
                exit();
            }else{
                $sql2 = "INSERT INTO user(username, pass, email, fullName) VALUES('$username', '$password', '$email', '$registerFullname')";
                $result2 = mysqli_query($conn, $sql2);

                if ($result2) {
                    header("Location: home.php?success=Your account has been created successfully");
                    exit();
                }else {
                    header("Location: home.php?error=unknown error occurred&$userData");
                    exit();
                }
            }

        }

        

    }else{
        header("Location: register.php");
        exit();
    }

?>
