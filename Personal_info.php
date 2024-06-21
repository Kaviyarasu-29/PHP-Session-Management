<?php
include 'session.php';
if (check_session_expiration()) {
    header("Location: newOP.php");
    exit();
}
if (!check_logged_in()) { // Ensure the user is logged in
    header("Location: newOP.php");
    exit();
} else {
    check_session_expiration();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Welcome, <?php echo $_SESSION['PName']; ?></h1>

    <br>
    <p>
        Hello, chief! We're excited to have you on board as part of our development team. Your technical skills and innovative thinking will be instrumental in tackling our upcoming projects. We believe your expertise will help us deliver exceptional solutions to our clients. If there's anything you need to get started or any ideas you'd like to share, feel free to reach out. We're here to collaborate and support you every step of the way. Once again, welcome to the team, chief!
    </p>
    <a href="profile.php"></a>



</body>

</html>