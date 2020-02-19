<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=matcha;host=127.0.0.1';
$user = 'adespina';
$password = '123';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>