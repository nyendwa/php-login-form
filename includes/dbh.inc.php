<?php

$host = 'localhost';
$dbname = 'mydb';
$dbusername = 'root';
$dbpassword = '';


try {
    //code...

    $conns = new PDO("mysql:host=$host; dbname=$dbname", $dbusername,$dbpassword);
    $conns->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} 
catch (PDOException $e) {
    die("Connecttion failed-: " . $e->getMessage());
}