<?php
session_start();
// include 'session_management.php';
// check_session_expiration();

if (isset($_POST['signup_btn'])) {
    $PName = $_POST['PersonalName'];
    $PEmail = $_POST['newPEmail'];
    $LinkedIn = $_POST['LinkedIn'];
    $PersonalPass = $_POST['newPersonalPass'];

    if (empty($PName) || empty($PEmail) || empty($PersonalPass)) {
        echo "All fields are required";
        exit();
    }

    // Connect to the database
    $servername = "localhost";
    $dbusername = "root";
    $dbname = "newtry";
    $port = 3308;
    $conn = new mysqli($servername, $dbusername, "", $dbname, $port);

    // Check database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    // image upload

    $msg = "";
    $fileName = "";
    $allowedTypes = ['png', 'jpg', 'jpeg'];
    $fileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    $myfile = $_FILES["image"]["tmp_name"];

    if (!in_array($fileType, $allowedTypes)) {
        $msg = "<div style='background-color: tomato;'>
        Image upload failed.</div>";
    }else{
        $fileName = time(). "." . $fileType;
        if(move_uploaded_file($myfile, "ImageFolder/".$fileName)){
            $msg = "<div style='background-color: green;'>
            Image upload successfully.</div>";
        }
    }




    // Hash password
    $hashed_password = password_hash($PersonalPass, PASSWORD_DEFAULT);

    // Check if email already exists
    $sql_check = "SELECT * FROM mydata WHERE PEmail=?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $PEmail);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "<h3 style='color:red'>Email already exists<h3>";
    } else {
        // Insert new user into database
        $sql_insert = "INSERT INTO mydata (PersonalName, PEmail, LinkedIn, profileImageName, PersonalPass, CheckPass) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssssss", $PName, $PEmail, $LinkedIn, $fileName, $hashed_password, $PersonalPass);
        if ($stmt_insert->execute()) {
            echo "Inserted";
            header("Location: newOP.php");
            exit();
        } else {
            echo "Error in registration. Please try again.";
        }
    }

    $stmt_check->close();
    $stmt_insert->close();
    $conn->close();
}
