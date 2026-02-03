<?php
// part 2 was already done and its located in the products.php file
$isLogin = false;
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

function searchPasswordFile($username, $password) {
    global $isLogin;


    $lines = file("password.txt", FILE_IGNORE_NEW_LINES);

    $usernames = [];
    $passwords = [];


    for ($i = 0; $i < count($lines); $i += 2) {
        $usernames[] = $lines[$i];
        $passwords[] = $lines[$i + 1];
    }


    for ($i = 0; $i < count($usernames); $i++) {
        if ($usernames[$i] === $username && $passwords[$i] === $password) {
            $isLogin = true;
            break;
        }
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Display</title>
</head>
<body>

<?php

if (isset($_POST['submit'])) {

    if (empty($username) || empty($password)) {
        echo "<p>Username and password are required.</p>";
    } else {
        searchPasswordFile($username, $password);

        if ($isLogin) {
            echo "<p>Login successful. Welcome, <strong>$username</strong>.</p>";
        } else {
            echo "<p>Login failed. Username or password incorrect.</p>";
        }
    }
}

if (isset($_POST['create'])) {

    if (empty($username) || empty($password)) {
        echo "<p>Username and password are required to create an account.</p>";
    } else {
        $file = fopen("password.txt", "a");
        fwrite($file, $username . PHP_EOL);
        fwrite($file, $password . PHP_EOL);
        fclose($file);

        echo "<p>Account created successfully.</p>";
    }
}
?>

</body>
</html>

