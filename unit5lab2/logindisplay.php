<?php

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Display</title>
</head>
<body>


<p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
<p><strong>Password:</strong> <?php echo htmlspecialchars($password); ?></p>

</body>
</html>

