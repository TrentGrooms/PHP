<?php




echo "<h1>PHP Autoglobals Lab</h1>";

echo "<h2>Single value from \$_SERVER</h2>";
echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "<br><br>";

echo "<h2>Single value from \$_ENV using getenv()</h2>";
echo "USERNAME: " . getenv('USERNAME') . "<br><br>";

echo "<h2>Dump of \$_SERVER</h2>";
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";

echo "<h2>Dump of \$GLOBALS</h2>";
echo "<pre>";
var_dump($GLOBALS);
echo "</pre>";

echo "<h2>phpinfo()</h2>";
phpinfo();


/*

Question: What is the version of PHP?
Answer: 8.0.30
Autoglobal: Source: phpinfo()

Question: What is the server name?
Answer: PhpStorm 2025.2.5
Autoglobal: Variable: $_SERVER['SERVER_NAME']


Question: What is the Operating System?
Answer: Windows_NT
Autoglobal: Variable: $_SERVER['OS']

Question: What port does the server use?
Answer: 63342
Autoglobal: Variable: $_SERVER['SERVER_PORT']

Question: What is the USERNAME?
Answer: trent
Autoglobal: Variable: getenv('USERNAME')

Question: What is the computer name?
Answer: TRENT
Autoglobal: Variable: $_SERVER['COMPUTERNAME']

Question: What is the script name?
Answer: /TJGPHP/PHP/autoglobals/autoglobals.php
Autoglobal: Variable: $_SERVER['SCRIPT_NAME']

Question: What is the Document root path?
Answer: C:\xampp\htdocs\TJGPHP
Autoglobal: Variable: $_SERVER['DOCUMENT_ROOT']

Question: What is the Request method?
Answer: GET
Autoglobal: Variable: $_SERVER['REQUEST_METHOD']


Question: What is the server address?
Answer: 127.0.0.1
Autoglobal: Variable: $_SERVER['SERVER_ADDR']

*/




