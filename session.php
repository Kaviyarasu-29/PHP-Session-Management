<?php


// Function to set session expiration time
function set_session_expiration($duration_in_minutes = 1440) {
    $_SESSION['expire_time'] = time() + ($duration_in_minutes * 60); // Set expiration time
}

// Function to check session expiration
function check_session_expiration() {
    if (isset($_SESSION['expire_time']) && $_SESSION['expire_time'] < time()) {
        // Session expired, destroy session
        session_unset();
        session_destroy();
        header("Location: login.php");
       exit();
    }
}

// Function to check if user is logged in
function check_logged_in() {
    return isset($_SESSION['PName']) && isset($_SESSION['PEmail']);
}



check_session_expiration();


?>
