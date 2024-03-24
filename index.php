<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>

<body>
    <div class="loginform">
        <h3>Login</h3>
        <form action="includes/login.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="psw" placeholder="Password">
            <button class="Loginbtn">Login</button>
        </form>
    </div>


</body>

</html>
<footer class="chawy">
    <hr />

    <p>&copy; Chawy <?php $currYr = date('Y');
    echo $currYr; ?>
    </p>
</footer>