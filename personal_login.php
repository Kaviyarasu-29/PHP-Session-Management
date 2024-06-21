<?php
session_start();
include 'session.php';
// check_session_expiration();


if (isset($_POST["login_submit"])) {
    $PEmail = $_POST['PEmail'];
    $PersonalPass = $_POST['PersonalPass'];

    // Connect to the db
    $servername = "localhost";
    $dbusername = "root";
    $dbname = "newtry";
    $port = 3308;
    $conn = new mysqli($servername, $dbusername, "", $dbname, $port);

    // Check db connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // hashed password from the db
    $sql = "SELECT * FROM mydata WHERE PEmail=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $PEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["PersonalPass"];

        // Verify hashed pass
        if (password_verify($PersonalPass, $hashed_password)) {
            $_SESSION['PEmail'] = $PEmail; 
            $_SESSION['PName'] = $row["PersonalName"];
            $_SESSION['LinkedIn'] = $row["LinkedIn"];
            $_SESSION['profileImage'] = $row['profileImageName'];
            header("Location: Personal_info.php");
            
            exit();
        } else {
            echo "<h3 style='color:red'>Email or Password error!</h3>";
        }
    } else {
        echo "<h3 style='color:red'>Email not found</h3>";
    }

    $stmt->close();
    $conn->close();
}
?>
