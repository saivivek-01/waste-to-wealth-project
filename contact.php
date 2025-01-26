<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (saveContact($name, $email, $message)) {
        echo "Message sent successfully.";
    } else {
        echo "Error: Could not send message.";
    }
}
?>
