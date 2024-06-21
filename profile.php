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

if (isset($_POST['logout_btn'])) {
    session_unset();
    session_destroy();
    header("Location: newOP.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>

<body>
    <div>
        <h1>UserName : <?php echo $_SESSION['PName']; ?></h1>
        <br>
        <p>Email: <?php echo $_SESSION['PEmail']; ?></p>
        <br>
        <p>Want to check out your LinkedIn profile? <?php echo "<a href=" .  $_SESSION['LinkedIn'] . "> Click here! </a>"; ?></p>
        <br>

        <div>
            <img src="ImageFolder/<?php echo $_SESSION['profileImage']; ?>" alt="Profile Image" style="max-width: 300px; max-height: 300px; border-radius: 50%; ;
            border-width: 10px 4px;">

        </div>

        <br>
        <form action="" method="post">
            <button type="submit" name="logout_btn">Logout</button>
        </form>
    </div>
</body>

</html>