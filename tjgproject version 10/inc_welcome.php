<?php
session_start();

$isLogin = $_SESSION['isLogin'] ?? false;
$username = $_COOKIE['username'] ?? '';
?>

<?php if ($isLogin): ?>

    <p>Welcome back, <?php echo htmlspecialchars($username); ?>!</p>

<?php else: ?>

    <p>You are not logged in.</p>

<?php endif; ?>



