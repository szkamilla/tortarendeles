<?php
session_start();
require 'db.php';

// Lekérdezzük az opciókat az adatbázisból
$options_query = "SELECT * FROM options ORDER BY category";
$options_result = $conn->query($options_query);

// Csoportosítjuk az opciókat kategóriák szerint a könnyebb elérés érdekében
$options = [];
while ($row = $options_result->fetch_assoc()) {
    $options[$row['category']][] = $row['value'];
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torta Rendelés</title>
    <link href="styles.css?v=<?php echo time(); ?>" rel="stylesheet">

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
                            <form action="dashboard.php" method="get">
                                <button type="submit">Rendeléseim</button>
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
    
    <form id="cake-form">
        <h1>Rendelés</h1>
        <label for="slice">Hány szeletes tortát szeretnél?</label>
            <select id="slice" name="slice">
                <option value="" disabled selected>Válassz...</option>
                <?php
                    // Dinamikusan megjelenítjük a piskóta ízeket az adatbázisból
                    if (isset($options['slice'])) {
                        foreach ($options['slice'] as $slice) {
                            echo "<option value='{$slice}'>{$slice}</option>";
                        }
                    }
                ?>
            </select>
        
        <label for="cake-shape">Milyen formájú piskótát szeretnél?</label>
            <select id="cake-shape" name="cake-shape">
                <option value="" disabled selected>Válassz...</option>
                <?php
                    // Dinamikusan megjelenítjük a piskóta ízeket az adatbázisból
                    if (isset($options['shape'])) {
                        foreach ($options['shape'] as $shape) {
                            echo "<option value='{$shape}'>{$shape}</option>";
                        }
                    }
                ?>
            </select>

        <label for="cake-flavor">Milyen ízű piskótát szeretnél?</label>
            <select id="cake-flavor" name="cake-flavor">
                <option value="" disabled selected>Válassz...</option>
                <?php
                    // Dinamikusan megjelenítjük a piskóta ízeket az adatbázisból
                    if (isset($options['flavor'])) {
                        foreach ($options['flavor'] as $flavor) {
                            echo "<option value='{$flavor}'>{$flavor}</option>";
                        }
                    }
                ?>
            </select>

        <label for="cream-flavor">Milyen ízű krémet szeretnél?</label>
            <select id="cream-flavor" name="cream-flavor">
                <option value="" disabled selected>Válassz...</option>
                <?php
                    // Dinamikusan megjelenítjük a krém ízeket az adatbázisból
                    if (isset($options['cream'])) {
                        foreach ($options['cream'] as $cream) {
                            echo "<option value='{$cream}'>{$cream}</option>";
                        }
                    }
                ?>
            </select>

        <label for="cake-icing">Milyen borítása legyen a tortának?</label>
            <select id="cake-icing" name="cake-icing">
                <option value="" disabled selected>Válassz...</option>
                <?php
                    // Dinamikusan megjelenítjük a krém ízeket az adatbázisból
                    if (isset($options['icing'])) {
                        foreach ($options['icing'] as $icing) {
                            echo "<option value='{$icing}'>{$icing}</option>";
                        }
                    }
                ?>
            </select>

        <label for="cake-decor">Milyen díszítést szeretnél?</label>
            <select id="cake-decor" name="cake-decor">
                <option value="" disabled selected>Válassz...</option>
                <?php
                    // Dinamikusan megjelenítjük a krém ízeket az adatbázisból
                    if (isset($options['decor'])) {
                        foreach ($options['decor'] as $decor) {
                            echo "<option value='{$decor}'>{$decor}</option>";
                        }
                    }
                ?>
            </select>

        <button type="submit">Rendelés</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
