<?php
    $password = "lampung123";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $isPasswordValid = password_verify($password, $hashedPassword);

    echo "Password: $password\n";
    echo "Hashed Password: $hashedPassword\n";
    echo "Is Password Valid? " . ($isPasswordValid ? "Yes" : "No") . "\n";

?>
