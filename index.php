<?php
 if (session_status()>=0){
//
      session_start();
      if(isset($_SESSION["uname"])) {
            header("refresh: 1; url = library.php");
           // echo $_SESSION["uname"];
      }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title>Book Management System</title>
      <style>
            body{
                  background:#2a008b;
                  color:#fff;
            }
            .login{
                  margin-top:200px;
            }
            .link{
                  color:lavender;
            }
      </style>
</head>
<body>
      <div align="center" class="login">
            <h1>Login</h1>
            <br>
      <form action="loginprocess.php" method="post">
      
            <label>Username : </label>
            <input type="text" name = "uname">
            <br><br>
            <label>Password : </label>
            <input type="password" name = "pass">
            <br><br>
            <input type="submit" name="submit">
      
      </form>
      <br>
      <a href="signup.php" class="link">Sign Up</a>
      <br>
      <a href="forgot.php" class="link">Forgot Password?</a>
      </div>
</body>
</html>
