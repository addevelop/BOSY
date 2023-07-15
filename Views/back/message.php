<?php

ob_start();

?>

<link rel="stylesheet" href="public/source/css/message.css" />
<section class="blockBody flex flexCenter">
    <div class="message">
        <div class="textCenter"><?= $message ?></div>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once("Views/template.php");

?>