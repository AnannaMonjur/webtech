<?php
 if (session_status()>=0){
      session_start();
      if(isset($_SESSION["uname"])) {
            header("refresh: 1; url = library.php");
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
    <div align = "center" class = "reg">
        <h2>Answer the Security Question</h2>
    <form action="forgotprocess.php" method="post">
        <label for="">Enter your username : </label>
        <input type="text" name="user">
        <br><br>
        <label for="">What is you favorite automobile company?</label>
        <input type="text" name="security-question">
        <br><br>
        <input type="submit" name="submit">
    </form>
    </div>
</body>
</html>