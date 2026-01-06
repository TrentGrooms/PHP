<?php
$itemName = "";
$price = "";
$extras = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['itemName'])) {
        $errors['itemName'] = "Item name is required.";
    } else {
        $itemName = $_POST['itemName'];
    }

    if (empty($_POST['price'])) {
        $errors['price'] = "Price is required.";
    } elseif (!is_numeric($_POST['price'])) {
        $errors['price'] = "Price must be numeric.";
    } else {
        $price = $_POST['price'];
    }

    if (!empty($_POST['extras'])) {
        $extras = $_POST['extras'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gaming PC Form</title>
</head>
<body>

<h2>Add Gaming PC</h2>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>

    <h3>Form Accepted</h3>
    <p><strong>Item Name:</strong> <?php echo $itemName; ?></p>
    <p><strong>Price:</strong> $<?php echo $price; ?></p>
    <p><strong>Type:</strong> Gaming PC</p>
    <p><strong>Extras:</strong> <?php echo implode(", ", $extras); ?></p>

<?php else: ?>

    <form method="post">

        Item Name:<br>
        <input type="text" name="itemName" value="<?php echo $itemName; ?>">
        <span style="color:red"><?php echo $errors['itemName'] ?? ''; ?></span>
        <br><br>

        Price:<br>
        <input type="text" name="price" value="<?php echo $price; ?>">
        <span style="color:red"><?php echo $errors['price'] ?? ''; ?></span>
        <br><br>

        Type:<br>
        <strong>Gaming PC</strong>
        <br><br>

        Extras:<br>
        <input type="checkbox" name="extras[]" value="RGB" <?php if (in_array("RGB",$extras)) echo "checked"; ?>> RGB
        <input type="checkbox" name="extras[]" value="Liquid Cooling" <?php if (in_array("Liquid Cooling",$extras)) echo "checked"; ?>> Liquid Cooling
        <input type="checkbox" name="extras[]" value="WiFi" <?php if (in_array("WiFi",$extras)) echo "checked"; ?>> WiFi
        <br><br>

        <input type="submit" value="Submit">

    </form>

<?php endif; ?>

</body>
</html>



