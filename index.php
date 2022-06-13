<?php

    session_start();

    include 'config.php';
    
    if(isset($_POST['userLogin']) && isset($_POST['passLogin'])){
        function validate($userData){
            $userData = trim($userData);
            $userData = stripslashes($userData);
            $userData = htmlspecialchars($userData);
            return $userData;
        }

        $username = validate($_POST['userLogin']);
        $password = validate($_POST['passLogin']);


        if (empty($username)) {
            header("Location: login.php?err=User Name is required");
            exit();
        }else if(empty($password)){
            header("Location: login.php?err=Password is required");
            exit();
        }else{

            $password = md5($password);

            $sql = "SELECT * FROM user WHERE username = '$username' AND pass = '$password'";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                
                if($row['username'] === $username && $row['pass'] === $password){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['userID'] = $row['userID'];
                    header('Location: home.php');
                    exit();
                }else{
                    header('Location: login.php?err=Incorect User name or password');
                    exit();
                }
    
            }else{
                header('Location: login.php?err=Incorect User name or password');
                exit();
            }
        }

        

    }else{
        header("Location: login.php");
        exit();
    }

?>
