<?php

session_start();
require_once("Order.php");


$conn = new mysqli("localhost", "root", "", "tjgdatabase");
if ($conn->connect_error) {
    die("Connection failed");
}


$itemList = $conn->query("SELECT item_id, pc_name, price FROM items");

$errors = [];
$orderCreated = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item_id = $_POST['item_id'] ?? '';
    $quantity = $_POST['quantity'] ?? '';

    if (empty($item_id))
        $errors[] = "Item must be selected.";

    if (empty($quantity) || !is_numeric($quantity) || $quantity <= 0)
        $errors[] = "Quantity must be a positive number.";


    $stmt = $conn->prepare("SELECT price FROM items WHERE item_id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $errors[] = "Selected item does not exist.";
    }

    if (empty($errors)) {

        $row = $result->fetch_assoc();
        $price = $row['price'];

        $order_date = date("Y-m-d");
        $total_cost = $price * $quantity;

        $order = new Order($item_id, $quantity, $order_date, $total_cost);

        $_SESSION['order'] = $order;

        $orderCreated = true;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Make Order</title>
</head>
<body>

<h2>Place an Order</h2>

<?php
foreach ($errors as $e) {
    echo "<p style='color:red'>$e</p>";
}
?>

<?php if ($orderCreated): ?>

    <p>Item is on order.</p>
    <a href="checkout.php">Proceed to Checkout</a>

<?php else: ?>

<form method="post">

    Select Item:
    <select name="item_id">
        <?php while ($row = $itemList->fetch_assoc()): ?>
            <option value="<?= $row['item_id'] ?>">
                <?= $row['pc_name'] ?>
            </option>
        <?php endwhile; ?>
    </select>
    <br><br>

    Quantity:
    <input type="text" name="quantity">
    <br><br>

    <input type="submit" value="Place Order">

</form>

<?php endif; ?>

</body>
</html>

