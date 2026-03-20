<?php
// Start a session to remember the user after they log in
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: index.php");
    exit;
}

// Process the form data when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // For this simple example, we are using a hardcoded username and password.
    if ($username === 'admin' && $password === 'password123') {
        // Password is correct, start a new session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        // Redirect the user to the profile page
        header("Location: index.php");
        exit;
    } else {
        // Display an error message if the credentials are wrong
        $login_err = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>
    
    <?php 
    if(!empty($login_err)){
        echo '<p style="color:red;">' . $login_err . '</p>';
    }        
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Username:</label><br>
            <input type="text" name="username" required>
        </div>
        <br>
        <div>
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>
        <br>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
</body>
</html>