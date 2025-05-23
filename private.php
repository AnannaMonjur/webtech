<?php
$token = "";
$token2 = "";
session_start();
if (isset($_SESSION["uname"])) {
      echo "Hello, you are now logged in"."<br>";
      echo "";
      $token ="signout.php";
      $token2= "Sign Out";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title>PHP APP</title>
</head>
<body>
<p style="text-align:left">
<?php
      if (isset($_SESSION["uname"])) {
            echo "Username: "."<b style=\"color:red\">".$_SESSION["uname"]."</b><br>";
            echo "<br>Your Profile Pic:<br>";
            echo "<img src=\"https://media.gcflearnfree.org/content/5ef2084faaf0ac46dc9c10be_06_23_2020/box_model.png\" width=\"250\">";
            
      }
      //
?>
</p>
<br>
<a href="index.php">Home</a>
<a href=<?php echo $token; ?>><?php echo $token2; ?></a>
</body>
</html>