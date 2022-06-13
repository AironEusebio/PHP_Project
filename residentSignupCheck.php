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
            header("Location: residentSignup.php?err");
            exit();
        }else{
            $password = md5($password);
            $sql = "SELECT * FROM residents WHERE residentUsername='$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                header("Location: residentSignup.php?error=The email is taken try another&$userData");
                exit();
            }else{
                $sql2 = "INSERT INTO residents(residentUsername, residentPassword, residentEmail, residentName) VALUES('$username', '$password', '$email', '$registerFullname')";
                $result2 = mysqli_query($conn, $sql2);

                if ($result2) {
                    header("Location: residentSignup.php?success=Your account has been created successfully");
                    exit();
                }else {
                    header("Location: residentSignup.php?error=unknown error occurred&$userData");
                    exit();
                }
            }

        }

        

    }else{
        header("Location: residentSignup.php");
        exit();
    }

?>
