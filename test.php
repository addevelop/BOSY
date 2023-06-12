<?php
ob_start();
?>
<html lang="en">


<?php



?>

<form action="" method="POST">
    <input type="text" name="sneaker" />
    <input type="text" name="quantity" />
    <input type="submit" name="type" value="direct" />
</form>
<script src="Controllers/basket/basketAjax.js"></script>
<script>
    $.ajax({
        type: "POST",
        data: {
            sneaker: 1,
            quantity: 2,
            type: "direct"
        },
        success: function(data) {
            //   result=data;
            console.log("t" + data);

        }
    });
</script>

<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>