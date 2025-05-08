<?php
require 'db.php';
$category = $_POST['category'];
$value = $_POST['value'];

$stmt = $conn->prepare("INSERT INTO options (category, value) VALUES (?, ?)");
$stmt->bind_param("ss", $category, $value);
$stmt->execute();
header("Location: admin.php");
