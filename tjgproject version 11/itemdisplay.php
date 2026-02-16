<?php
$conn = new mysqli("localhost", "root", "", "tjgdatabase");
if ($conn->connect_error) {
    die("Connection failed");
}

// Load items for dropdown
$itemList = $conn->query("SELECT item_id, pc_name FROM items");

$selectedItem = null;

if (isset($_POST['item_id'])) {
    $stmt = $conn->prepare(
            "SELECT * FROM items WHERE item_id = ?"
    );
    $stmt->bind_param("i", $_POST['item_id']);
    $stmt->execute();
    $selectedItem = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Item Display</title>
</head>
<body>

<h2>Select Gaming PC</h2>

<form method="post">
    <select name="item_id">
        <?php while ($row = $itemList->fetch_assoc()): ?>
            <option value="<?= $row['item_id'] ?>">
                <?= $row['pc_name'] ?>
            </option>
        <?php endwhile; ?>
    </select>
    <input type="submit" value="View">
</form>

<?php if ($selectedItem): ?>
    <h3>PC Details</h3>
    <p>Name:<?= $selectedItem['pc_name'] ?></p>
    <p>GPU: <?= $selectedItem['gpu'] ?></p>
    <p>RAM: <?= $selectedItem['ram_gb'] ?> GB</p>
    <p>Storage: <?= $selectedItem['storage_gb'] ?> GB</p>
    <p>Price: $<?= $selectedItem['price'] ?></p>
<?php endif; ?>

</body>
</html>


