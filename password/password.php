<?php


$passwords = [
    "short1A!",
    "alllowercase123!",
    "ALLUPPERCASE123!",
    "NoSpecialChar123",
    "Has Space123!",


    "StrongPass123!",
    "Secur3@Password",
    "MyC0mpl3x#Pass",
    "Valid@Pass2025",
    "Sup3r!SafePass"
];
function checkPassword($password)
{
    if (strlen($password) < 12) {
        return "$password is invalid: must be at least 12 characters long.";
    }

    if (preg_match('/\s/', $password)) {
        return "$password is invalid: cannot contain spaces.";
    }

    if (!preg_match('/[0-9]/', $password)) {
        return "$password is invalid: must contain at least one number.";
    }

    if (!preg_match('/[a-z]/', $password)) {
        return "$password is invalid: must contain at least one lowercase letter.";
    }

    if (!preg_match('/[A-Z]/', $password)) {
        return "$password is invalid: must contain at least one uppercase letter.";
    }

    if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
        return "$password is invalid: must contain at least one special character.";
    }


    return true;
}



foreach ($passwords as $pwd) {

    $result = checkPassword($pwd);

    if ($result === true) {
        echo "$pwd is a GOOD password.";
    } else {
        echo "$result";
    }
}
