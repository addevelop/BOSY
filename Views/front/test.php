<?php
ob_start();
?>


<?php
if (isset($_POST["quantity"])) {
    var_dump($_POST);
} else {
    echo "post";
}


?>

<form action="" method="POST">
    <input type="text" name="sneaker" />
    <input type="text" name="quantity" />
    <input type="submit" name="type" value="direct" />
</form>
<a>ok</a>
<!-- <script src="Controllers/basket/basketAjax.js"></script> -->
<script>
    $("a").click(function() {
        console.log("heu");
        $.ajax({
            type: "POST",
            url: "",
            data: {
                sneaker: 1,
                quantity: 2,
                type: "direct"
            },
            success: function(data) {
                //   result=data;
                // console.log("t" + data);
                // getNumBasket();

            }
        });
    })
</script>

<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>