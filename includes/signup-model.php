<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){
    $query = "SELECT username from users WHERE username=:username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email){
    $query = "SELECT email from users WHERE email=:email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function set_user(object $pdo,string $psw,string $username,string $email)
{
    $query = "INSERT INTO users(username,psw,email,) VALUES (:username,:psw,:email);";
    $stmt = $pdo->prepare($query);

    $options = [
'cost'=>12
    ];

    $hashedpsw=password_hash($psw,PASSWORD_BCRYPT,$options);
    
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":psw", $hashedpsw);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}