<?php
$conn = new mysqli("localhost", "root", "", "tjgdatabase");
if ($conn->connect_error) {
    die("Connection failed");
}

$sql = "
SELECT 
    o.order_id,
    i.pc_name,
    o.quantity,
    o.order_date,
    o.total_cost
FROM orders o
JOIN items i ON o.item_id = i.item_id
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders Display</title>
</head>
<body>

<h2>All Orders</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Order ID</th>
        <th>PC Name</th>
        <th>Quantity</th>
        <th>Order Date</th>
        <th>Total Cost</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['order_id'] ?></td>
            <td><?= $row['pc_name'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['order_date'] ?></td>
            <td>$<?= $row['total_cost'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>


