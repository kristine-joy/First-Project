<?php
    // Start the session
    session_start();

    // Check if the user is logged in, if not then redirect them to the login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("Location: login.php");
        exit;
    }

    // Your existing variables
    $name = "Paul John";
    $role = "Body Guard";
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profiles</title>
</head>
<body>
    <h1>Hello, my name is <?php echo $name; ?>!</h1>
    <p>I am a <?php echo $role; ?>.</p>
    
    <br>
    <a href="logout.php">Sign Out of Your Account</a>
</body>
</html>