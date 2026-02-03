<?php

$conn = new mysqli("localhost", "root", "", "tjgdatabase");
if ($conn->connect_error) {
    die("Connection failed");
}

$pc_name = "";
$gpu = "";
$ram_gb = "";
$storage_gb = "";
$price = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['pc_name'])) $errors[] = "PC name required";
    else $pc_name = $_POST['pc_name'];

    if (empty($_POST['gpu'])) $errors[] = "GPU required";
    else $gpu = $_POST['gpu'];

    if (empty($_POST['ram_gb']) || !is_numeric($_POST['ram_gb']))
        $errors[] = "RAM must be numeric";
    else $ram_gb = $_POST['ram_gb'];

    if (empty($_POST['storage_gb']) || !is_numeric($_POST['storage_gb']))
        $errors[] = "Storage must be numeric";
    else $storage_gb = $_POST['storage_gb'];

    if (empty($_POST['price']) || !is_numeric($_POST['price']))
        $errors[] = "Price must be numeric";
    else $price = $_POST['price'];

    if (empty($errors)) {
        $stmt = $conn->prepare(
                "INSERT INTO items (pc_name, gpu, ram_gb, storage_gb, price)
             VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("ssiid", $pc_name, $gpu, $ram_gb, $storage_gb, $price);
        $stmt->execute();
        $stmt->close();

        echo "<h3>Gaming PC Added Successfully</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Gaming PC</title>
</head>
<body>

<h2>Add Gaming PC</h2>

<?php
foreach ($errors as $e) {
    echo "<p style='color:red'>$e</p>";
}
?>

<form method="post">
    PC Name: <input type="text" name="pc_name"><br><br>
    GPU: <input type="text" name="gpu"><br><br>
    RAM (GB): <input type="text" name="ram_gb"><br><br>
    Storage (GB): <input type="text" name="storage_gb"><br><br>
    Price: <input type="text" name="price"><br><br>

    <input type="submit" value="Add PC">
</form>

</body>
</html>

