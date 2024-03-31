<?php

$host = 'localhost:3307';
$dbname = 'mydb';
$dbusername = 'root';
$dbpassword = '';
//host should have the same variable as the localhost server, assuming the default localhost has been changed to 3307, point it out as shown above. If localhost is a default value=3306 then $host=localhost
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}