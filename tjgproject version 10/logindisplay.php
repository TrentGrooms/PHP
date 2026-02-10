<?php
session_start();

$isLogin = false;
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


function searchPasswordFile($username, $password) {

    $lines = file("password.txt", FILE_IGNORE_NEW_LINES);

    for ($i = 0; $i < count($lines); $i += 2) {

        if (isset($lines[$i + 1])) {

            if ($lines[$i] === $username &&
                    $lines[$i + 1] === $password) {

                return true;
            }
        }
    }

    return false;
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

        $_SESSION['isLogin'] = false;
        echo "<p>Username and password are required.</p>";

    } else {
        $isLogin = searchPasswordFile($username, $password);
        $_SESSION['isLogin'] = $isLogin;

        if ($isLogin) {
            setcookie("username", $username, time() + (86400 * 30), "/");
            echo "<p>Login successful. Welcome, $username.</p>";

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

        setcookie("username", $username, time() + (86400 * 30), "/");

        $_SESSION['isLogin'] = true;

        echo "<p>Account created successfully.</p>";
    }
}
?>

</body>
</html>


