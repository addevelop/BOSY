<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

require_once("Models/verifExist.php");
$verif = new verifExist();
if (isset($_POST["email"])) {
    echo $verif->emailExist($_POST["email"]);
}
?>

<body>
    <form action="" method="POST">
        <input type="email" name="email" />
        <input type="submit" name="test" />
    </form>
</body>

</html>