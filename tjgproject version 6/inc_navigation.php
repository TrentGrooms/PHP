<?php

$navCaptions = ["Home", "Products"];
$navLinks    = ["index.php", "products.php"];
foreach ($navCaptions as $i => $caption) {
    echo "<a href='{$navLinks[$i]}'></a>";
}




