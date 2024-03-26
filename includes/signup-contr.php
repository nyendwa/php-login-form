<?php

declare(strict_types=1);
 Function is_input_empty(string $username,string $psw,string $email){
    if(empty($username) || empty($psw) || empty($email)){
        return true;
    }
    else{
        return false;
    }
 }
function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
function is_username_taken(object $pdo,$username)
{
    if (get_username($pdo,$username)) {
        return true;
    } else {
        return false;
    }
}
function is_email_taken(object $pdo,$email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}