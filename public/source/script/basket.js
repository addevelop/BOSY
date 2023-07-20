document.addEventListener("DOMContentLoaded", function(){
    sumTotal();
})

$("select[name='quantity']").on("change", function(){
    sumTotal();
})
function sumTotal()
{
    var priceTotalProduct = 0;
    var productPrice = 0;
    $("div[name='product']").each(function(product, item){
        var productPrice = parseInt($(item).find("input[name='productPrice']").val()) * parseInt($(item).find("select[name='quantity']").val());
        priceTotalProduct += productPrice;
        $(item).find("span[name='price']").text(productPrice);
        
        
    })

    $("[name='allPrice']").text(priceTotalProduct);
}

function select(id)
{
    if($(id).val() >= 0)
    {
        $(id).parent().parent(".product").css("display", "none");
    }
}