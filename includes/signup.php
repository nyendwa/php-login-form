<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $psw=$_POST["psw"]; //[password]
    $email=$_POST["email"];
    
    try {
        
        require_once 'dbh.inc.php';
        require_once 'signup-model.php';
        require_once 'signup-contr.php';
        //Error handlers
        $errors = [];
        if (is_input_empty($username,$psw,$email)){
            $errors["empty_inpty"] = "Fill in all fields!";
        }
        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Inavlid email!";
        }
        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username already taken";
        }
        if(is_email_taken($pod,$email)){
            $errors["email_used"] = "Emailalready registered!";
        }   
        require_once 'config_session.inc.php';
        
        if($errors){
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
        }
    } 
    
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage()); 
    
    } 
}
else{
    header("Location:../index.php");
    die();
}