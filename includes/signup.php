<?php 
// Check if $_SERVER["REQUEST_METHOD"] is set and if it's a POST request
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST"){
    // Check if form fields are set
    if(isset($_POST["username"], $_POST["psw"], $_POST["email"])){
        // Retrieving form data
        $username = $_POST["username"];
        $psw = $_POST["psw"]; // [password]
        $email = $_POST["email"];
        
        try {
            // Including necessary files
            require_once 'dbh.inc.php';
            require_once 'signup-model.php';
            require_once 'signup-contr.php';
            
            // Initializing error array
            $errors = [];
            
            // Checking for empty inputs
            if (is_input_empty($username, $psw, $email)){
                $errors["empty_input"] = "Fill in all fields!";
            }
            
            // Validating email format
            if(is_email_invalid($email)){
                $errors["invalid_email"] = "Invalid email!";
            }
            
            // Checking if username is already taken
            if(is_username_taken($pdo, $username)){
                $errors["username_taken"] = "Username already taken";
            }
            
            // Checking if email is already registered
            if(is_email_taken($pdo, $email)){
                $errors["email_used"] = "Email already registered!";
            }   
            
            // Starting session
            require_once 'config_session.inc.php';
            
            // If there are errors, redirect back to the index page with error messages
            if($errors){
                $_SESSION["errors_signup"] = $errors;
                header("Location: ../index.php");
                exit(); // Terminate script execution
            }
        } catch (PDOException $e) {
            // Handling database errors
            die("Query failed: " . $e->getMessage()); 
        } 
    } else {
        // Redirect if form fields are not set
        header("Location: ../index.php");
        exit(); // Terminate script execution
    }
} else {
    // Redirecting if request method is not POST
    header("Location: ../index.php");
    exit(); // Terminate script execution
}