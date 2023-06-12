<?php
ob_start();

?>

<link rel="stylesheet" href="public/source/css/home.css" />

<section class="">

</section>


<?php

$content = ob_get_clean();
require_once("Views/template.php");
?>