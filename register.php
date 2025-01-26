<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (registerUser($name, $email, $password, $role)) {
        echo "Registration successful.";
    } else {
        echo "Error: Could not register user.";
    }
}
?>
