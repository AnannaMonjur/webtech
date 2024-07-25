<?php
$error = [];
$sname = "";
$sid = "";
$btitle = "";
$borDate = "";
$expDate = "";
$cookie_name = "";

function isValid()
{
    global $error, $sname, $sid, $btitle, $borDate, $expDate;
    $sname = $_POST['sname'];
    $sid = $_POST['sid'];
    $btitle = $_POST['btitle'];
    $expDate = date('d-m-Y', strtotime($_POST['expDate']));
    $isValid = true;

    if (!preg_match("/^([a-zA-Z]+(?:\s[a-zA-Z]+)*)$/", $sname)) {
        $error[] = "Invalid Name";
        $isValid = false;
    }

    if (!preg_match("/^\d{2}-\d{5}-[1-3]$/", $sid)) {
        $error[] = "Invalid ID";
        $isValid = false;
    }

    $borDate = date('d-m-Y');
    $diff = (strtotime($expDate) - strtotime($borDate)) / (60 * 60 * 24);

    if ($diff < 0 || $diff > 7) {
        $error[] = "Invalid Exp date (must be within 7 days from today)";
        $isValid = false;
    }

    return $isValid;
}

$isFormValid = false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
</head>

<body style="height:100vh; display: flex; justify-content:center; align-items:center;">
    <?php if (isset($_POST["submit"])) {
        $isFormValid = isValid();
        if (!$isFormValid) {
            foreach ($error as $err) {
                echo $err . "<br>";
            }
        }
        if ($isFormValid && !isset($_COOKIE[$sid])) { ?>
            <div style="font-size: 20px; background-color:aliceblue; width:auto; height:auto; padding:50px; border-radius:5%;">
                <h1 style="font-size: 25px; text-align:center; margin-bottom:50px;">
                    Book Receipt
                </h1>
                <p>Name: <?php echo $sname; ?></p>
                <p>ID: <?php echo $sid; ?></p>
                <p>Book: <?php echo $btitle; ?></p>
                <p>Borrow Date: <?php echo $borDate; ?></p>
                <p>Exp Date: <?php echo $expDate; ?></p>
            </div>
            <?php
            $cookie_name = $sid;
            $cookie_value = $btitle;
            setcookie($cookie_name, $cookie_value, time() + 604800);
            ?>
    <?php } else if ($isFormValid) {
            echo "<P>Please return the already borrowed book for borrowing a new one.</p>";
        }
    }
    ?>
</body>

</html>