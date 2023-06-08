<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
require_once("Models/login.php");
if (isset($_POST["login"])) {
    $login = new Login;
    $login->setEmail($_POST["email"]);
    $login->setPassword($_POST["password"]);
    $connect = $login->login();
    print_r($connect);
    if (isset($_SESSION["connect"])) {
        print_r($_SESSION["connect"]);
    }
}



?>

<body>
    <form action="" method="POST">
        <input type="email" name="email" />
        <input type="password" name="password" />
        <input type="submit" name="login" />
    </form>
</body>

</html>