<?php

    function checkLogin($conn){
        $id = $_SESSION['userID'];
        $query = "select * from users where userID = `$id` limit 1";

        $result = mysqli_master_query($conn, $query);

        if($result && mysqli_num_rows($result) > 0){
            $userData = mysqli_fetch_assoc($result);
            return $userData;
            echo"<script>alert(meron)</script>";
        }else{
            echo"<script>alert(wala)</script>";
        }
    }

    header("Loacation: login.php");
    die;

?>