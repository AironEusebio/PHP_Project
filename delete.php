

<?php

session_start();

include 'config.php';

if(isset($_POST['insertData'])){
    function validate($userData){
        $userData = trim($userData);
        $userData = stripslashes($userData);
        $userData = htmlspecialchars($userData);
        return $userData;
    }

    $username = validate($_POST['registerUsername']);
    $password = validate($_POST['registerPass']);
    $email = validate($_POST['registerEmail']);
    $registerFullname = validate($_POST['registerFullname']);
    $registerID = validate($_POST['registerID']);


    $userData = 'registerUsername='. $username. '&registerEmail='. $email;

        $sql2 = "DELETE FROM user WHERE userID='$registerID'";
        $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: home.php?success=deleted");
                mysqli_close($conn);
                exit();
            }else {
                header("Location: home.php?error=unknown error occurred&$userData");
                mysqli_close($conn);
                exit();
            }

    

}else{
    header("Location: home.php");
    exit();
}

?>
