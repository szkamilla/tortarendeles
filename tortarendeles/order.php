<?php
session_start();
require 'db.php';

if (!isset($_SESSION['loggedin'])) {
    echo "Jelentkezz be rendeléshez!";
    exit;
}

$user_id = $_SESSION['user_id'];

$slice = $_POST['slice'];
$shape = $_POST['cake-shape'];
$flavor = $_POST['cake-flavor'];
$cream = $_POST['cream-flavor'];
$icing = $_POST['cake-icing'];
$decor = $_POST['cake-decor'];

$stmt = $conn->prepare("INSERT INTO orders (user_id, slice, shape, flavor, cream, icing, decor) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssss", $user_id, $slice, $shape, $flavor, $cream, $icing, $decor);

if ($stmt->execute()) {
    echo "Sikeres rendelés!";
} else {
    echo "Hiba: " . $stmt->error;
}
