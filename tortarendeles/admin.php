<?php
session_start();
require 'db.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['is_admin'] != 1) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torta Rendelés</title>
    <link href="styles.css" rel="stylesheet">
</head>
<h2>Admin mód</h2>
<div class="header">
        <header>
            <table>
                <th>
                    <img src="cake.png" style="height: 75px;">
                </th>
                <th>
                    <p>Rózsás Cukrászda</p>
                </th>
                <th>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                            <form action="logout.php" method="post">
                                <button type="submit">Kijelentkezés</button>
                            </form>
                        <?php else: ?>
                            <form action="login.php" method="get">
                                <button type="submit">Belépés</button>
                            </form>
                        <?php endif; ?>
                </th>
            </table>
        </header>
    </div>

<?php


$result = $conn->query("SELECT * FROM options ORDER BY category");

echo "<h3>Választék módosítása</h3>";

while ($row = $result->fetch_assoc()) {
    echo "<p>{$row['category']}: {$row['value']} <a href='delete_option.php?id={$row['id']}'>[Törlés]</a></p>";
}
?>
<form action="add_option.php" method="post">
    <select name="category">
        <option value="flavor">Piskóta íz</option>
        <option value="cream">Krém</option>
        <!-- stb. -->
    </select>
    <input name="value" placeholder="Új érték">
    <button type="submit">Hozzáadás</button>
</form>
