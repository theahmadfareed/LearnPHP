<?php
session_start(); // Start the session


if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} elseif (isset($_COOKIE['user'])) {
    $user = unserialize($_COOKIE['user']);
} else {
    $user = null;
}


if ($user) {
    echo "<h1>Welcome!</h1>";
    echo "Username: " . htmlspecialchars($user->username) . "<br>";
    echo "Hashed Password: " . htmlspecialchars($user->hash_password) . "<br>";
} else {
    echo "No user data found.";
}
