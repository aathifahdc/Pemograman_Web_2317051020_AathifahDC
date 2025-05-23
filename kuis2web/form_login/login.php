<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (check_credentials($username, $password)) {
        $_SESSION["username"] = $username;
        $_SESSION["logged_in"] = true;

        header("Location: dashboard.php");
        exit;
    } else {

        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Login Form</h1>
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_message ?>
            </div>
        <?php } ?>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

