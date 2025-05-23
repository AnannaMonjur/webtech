<?php
//
if (session_status() >= 0){
      session_start();
      if(isset($_SESSION["uname"])) {
            header("refresh: 0.5; url = library.php");
      }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title>PHP APP</title>
      <style>
            body{
                  background:#2a008b;
                  color:#fff;
            }
            .reg{
                  margin-top:200px;
            }
      </style>
</head>
<body>
      <div align="center" class="reg">
      <h1>Registration</h1>
      <form action="process.php" method="post">
      <label for="">Email : </label>
      <input type="text" name="uname">
      <br><br> 
      <label for="">Password : </label>
      <input type="password" name="pass">
      <br><br> 
      <label for="">Confirm Password : </label>
      <input type="password" name="cpass">
      <br><br> 
      <input type="submit" name="submit"><br>
      </form>
      </div>
</body>
</html>
