<?php
session_start();

if(isset($_SESSION['cpuser'])){
    $user = $_SESSION['cpuser'];
    
    if(isset($_POST['submit'])){
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        
        if($pass == $cpass)
        {
            $con = mysqli_connect('localhost','root','','app_users');
            $sql = "UPDATE records SET `password` = '$pass' WHERE username = '$user' ";
            
            if(mysqli_query($con, $sql))
            {
                echo "Password updated. Redirecting...";
                header("refresh: 2; url = index.php");
                session_destroy();
                exit();
            } else {
                echo "Error updating password.";
            }
        } else {
            echo "Passwords do not match.";
        }
    }
}else{
        echo 'Invalid Request!';
        header("refresh: 1; url = index.php");
    }
?>