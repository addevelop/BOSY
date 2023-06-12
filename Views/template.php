<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/source/css/grid.css" />
    <link rel="stylesheet" href="public/source/css/style.css" />

    <link rel="stylesheet" href="public/source/css/menu.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src=" public/source/script/load.js">
    </script>
</head>

<body>
    <div class="container-loaded" id="loaded">
        <img class="loaded" src="public/images/dots_2.gif" />
    </div>
    <?php
    require_once("Views/common/menu.php");
    ?>
    <?php echo $content;
    ?>
    <script src="Controllers/basket/getNumBasket.js"></script>
</body>

</html>