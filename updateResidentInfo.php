

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

        $sql2 = "UPDATE residents SET residentUsername='$username', residentEmail='$email', residentName='$registerFullname' WHERE residentID='$registerID'";
        $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: homeResident.php?success=updated");
                mysqli_close($conn);
                exit();
            }else {
                header("Location: homeResident.php?error=unknown error occurred&$userData");
                mysqli_close($conn);
                exit();
            }

    

}else{
    header("Location: homeResident.php");
    exit();
}

?>
