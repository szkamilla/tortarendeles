<?php
$host = 'localhost';
$db = 'tortarendeles';
$user = 'root'; // XAMPP alapértelmezett
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}
?>
