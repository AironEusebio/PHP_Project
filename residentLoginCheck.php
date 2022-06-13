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
            header("Location: residentLogin.php?err=User Name is required");
            exit();
        }else if(empty($password)){
            header("Location: residentLogin.php?err=Password is required");
            exit();
        }else{

            $password = md5($password);

            $sql = "SELECT * FROM residents WHERE residentUsername = '$username' AND residentPassword = '$password'";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                
                if($row['residentUsername'] === $username && $row['residentPassword'] === $password){
                    $_SESSION['residentUsername'] = $row['residentUsername'];
                    $_SESSION['residentEmail'] = $row['residentEmail'];
                    $_SESSION['residentID'] = $row['residentID'];
                    header('Location: homeResident.php');
                    exit();
                }else{
                    header('Location: residentLogin.php?err=Incorect User name or password');
                    exit();
                }
    
            }else{
                header('Location: residentLogin.php?err=Incorect User name or password');
                exit();
            }
        }

        

    }else{
        header("Location: residentLogin.php");
        exit();
    }

?>
