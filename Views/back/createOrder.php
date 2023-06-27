<?php

ob_start();


?>

<section>
    hello
</section>

<?php

$content = ob_get_clean();
require_once("Views/template.php");
?>