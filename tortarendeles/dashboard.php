<?php
session_start();
require 'db.php';

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
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
<body>
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
                            <form action="index.php" method="get">
                                <button type="submit">Rendelés</button>
                            </form>
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
    <h1>Rendeléseim</h1>
    <div id="order-table">
    <table>
        <thead>
            <tr>
                <th>Szeletek</th>
                <th>Ízesítés</th>
                <th>Borítás</th>
                <th>Rendelés dátuma</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $user_id = $_SESSION['user_id'];
        $result = $conn->query("SELECT * FROM orders WHERE user_id = $user_id");
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['slice']} szeletes</td>
                        <td>{$row['flavor']}</td>
                        <td>{$row['icing']}</td>
                        <td>{$row['order_date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nincsenek rendelések</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
