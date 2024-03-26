<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup-view.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>

<body class="loginform">

    <h3 class="login">Login</h3>
    <form action=" includes/login.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="psw" placeholder="Password">
        <button>Login</button>
    </form>

    <h3 class="signup">Sign up</h3>
    <form action="includes/signup.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="psw" placeholder="Password">
        <input type="text" name="email" placeholder="Email">
        <button>Sign Up</button>
    </form>

    <?php
        check_signup_errors();
    ?>
</body>

</html>
<footer class="chawy">
    <hr />

    <p>&copy; Chawy <?php $currYr = date('Y');
    echo $currYr; ?>
    </p>
</footer>