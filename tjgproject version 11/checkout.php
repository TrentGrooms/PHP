<?php

require_once("Order.php");
session_start();


$conn = new mysqli("localhost", "root", "", "tjgdatabase");
if ($conn->connect_error) {
    die("Connection failed");
}


if (!isset($_SESSION['order'])) {
    echo "<p>No order found. Please create an order first.</p>";
    exit();
}

$order = $_SESSION['order'];

$stmt = $conn->prepare("
    INSERT INTO orders (item_id, quantity, order_date, total_cost)
    VALUES (?, ?, ?, ?)
");

$itemId    = $order->getItemId();
$quantity  = $order->getQuantity();
$orderDate = $order->getOrderDate();
$totalCost = $order->getTotalCost();

$stmt->bind_param("iisd", $itemId, $quantity, $orderDate, $totalCost);

if ($stmt->execute()) {

    echo "<h2>Order Placed Successfully</h2>";
    echo "<p>Item ID: " . $order->getItemId() . "</p>";
    echo "<p>Quantity: " . $order->getQuantity() . "</p>";
    echo "<p>Order Date: " . $order->getOrderDate() . "</p>";
    echo "<p>Total Cost: $" . $order->getTotalCost() . "</p>";

    unset($_SESSION['order']);

} else {
    echo "<p>Error placing order.</p>";
}

$stmt->close();
$conn->close();
?>

