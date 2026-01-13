<?php


$isLogin = false;

function searchPasswordFile($username, $password) {
    global $isLogin;

    $file = fopen("password.txt", "r");

    while (!feof($file)) {
        $fileUser = trim(fgets($file));
        $filePass = trim(fgets($file));

        if ($fileUser === $username && $filePass === $password) {
            $isLogin = true;
            break;
        }
    }

    fclose($file);
}


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

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

