<?php

$host = 'localhost';
$dbname = 'myDB';
$dbusername = 'root';
$dbpassword = '';


try {
    //code...

    $conns = new PDO('mysql:host=$host; dbname=$dbname', $dbusername,$dbpassword);
    $conns->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connecttion failed: ' . $e->getMessage());
}