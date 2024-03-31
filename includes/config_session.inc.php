<?php

// Setting session configurations
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

// Setting session cookie parameters
session_set_cookie_params([
    'lifetime'=>1800,      // Session lifetime: 1800 seconds (30 minutes)
    'domain'=>'localhost',// Domain for which the session cookie is available
    'path'=>'/',          // Path on the domain where the cookie will be available
    'secure'=>true,       // Cookie will only be sent over secure (HTTPS) connections
    'httponly'=>true      // Cookie accessible only through HTTP protocol
]);

// Starting the session
session_start();

// Checking if last session regeneration time is set
if(!isset($_SESSION["last_regeneration"])){
   // Regenerating session ID if last regeneration time is not set
   session_regenerate_id(); 
   $_SESSION["last_regeneration"]=time(); // Updating last regeneration time
}
else{
    // Regenerating session ID if last regeneration time exceeds the defined interval
    $interval = 60 * 30; // 30 minutes interval
    if(time()-$_SESSION["last_regeneration"]>=$interval){
        session_regenerate_id(); // Regenerating session ID
        $_SESSION["last_regeneration"] = time(); // Updating last regeneration time
    }
}

// Function to manually regenerate session ID
function regeneration_session_id(){
    session_regenerate_id(); // Regenerating session ID
    $_SESSION["last_regeneration"] = time(); // Updating last regeneration time
}