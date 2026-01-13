<?php

function currentDateInfo() {
    return date(" F j, Y");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Business</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background: grey;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .content {
            padding: 20px;
            max-width: 900px;
            margin: auto;
            background: white;
        }

        img {
            width: 100%;
            max-width: 500px;
            display: block;
            margin: 20px auto;
        }
        footer {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>

<header>
    <h1>Gaming PC shop</h1>
    <p> <?php echo currentDateInfo(); ?></p>
</header>

<!-- NavBar -->
<nav>
    <a href="index.php">Home</a>
    <a href="#">Prebuilt PCs</a>
    <a href="#">Custom Builds</a>
    <a href="#">Contact</a>
</nav>

<!-- Content area -->
<div class="content">
    <h2>About Our Company</h2>
    <p>
        We are a company that sells high performing gaming pcs at a good price.
        You can order one of our prebuilt standard option pcs or customize one yourself.
    </p>

    <img src="images/logo.jpg" alt="Logo">


</div>

<footer>
    © 2025 Gaming PC Shop – All rights reserved.
</footer>

</body>
</html>


