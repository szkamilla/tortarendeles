<?php
require 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM options WHERE id=$id");
header("Location: admin.php");
