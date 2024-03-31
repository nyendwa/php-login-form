<?php

$host = 'localhost:3307';
$dbname = 'mydb';
$dbusername = 'root';
$dbpassword = '';
//Connection failed: SQLSTATE[HY000] [2002] No connection could be made because the target machine actively refused it
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}