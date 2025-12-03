<?php
/*
 * Trent Grooms
 * 12/1/25
 * Products List gor gaming graphics cards
 */
$products = [
    ["Phoenix Ultra RTX", 1899.99, 8,  "USA"],
    ["ShadowStrike X5",   1499.99, 12, "USA"],
    ["Titan Forge Pro",   2299.99, 5,  "USA"],
    ["Nebula Nova 360",   999.99,  20, "USA"],
    ["Vortex Raptor X",   1299.99, 15, "USA"]

];


$navCaptions = ["Home", "Products"];
$navLinks    = ["index.php", "products.php"];

?>
<!DOCTYPE html>
<html>
<head>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background: grey;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .content {
            padding: 20px;
            max-width: 900px;
            margin: auto;
            background: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        footer {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>

<header>
    <h1>PC Build Shop</h1>
</header>

<nav>
    <?php
    for ($i = 0; $i < count($navCaptions); $i++) {
        echo "<a href='{$navLinks[$i]}'>{$navCaptions[$i]}</a>";
    }
    ?>
</nav>

<div class="content">
    <h2>Custom Prebuilt PC Inventory</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Location</th>
        </tr>

        <?php
        foreach ($products as $pc) {
            echo "<tr>";
            echo "<td>{$pc[0]}</td>";
            echo "<td>\${$pc[1]}</td>";
            echo "<td>{$pc[2]}</td>";
            echo "<td>{$pc[3]}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> PC Build Shop
</footer>

</body>
</html>