$(document).ready(function(){

$("[data-click='addProductDirect'").click(function(e){
    addProductDirect($(e.target).attr("data-product"), 1, $("input[name='size']:checked").val());
    console.log(window.location.href);
    
})
$("[data-select='updateOnBasket'").on("change", function(e){
      updateProductOnBasket($(e.target).val(), $(e.target).attr("data-id"), $(e.target).attr("data-stock"));
    })
});

function addProductDirect(idsneaker, quantity, size)
{

$.ajax({
    type: "POST",
    url: "Models/Ajax/Basket.php",
    data: {
      sneaker: idsneaker,
      quantity: quantity,
      size: size,
      addProductDirect: "true",
    },
    success: function(data) {
    //   result=data;
    console.log("t" + data);
    getNumBasket();
    
    }
  });    

 
}

function getNumBasket()
{
  console.log('heu');
   $.ajax({
    type: "POST",
    url: "Models/Ajax/Basket.php",
    data: {
      getNumBasket: "true"
    },
    success: function(data) {
    //   result=data;
    console.log("ti" + data);
    $("#getNumBasket").text(data);
    
    }
  }); 
}

function getNumBasket()
{
  console.log('heu');
   $.ajax({
    type: "POST",
    url: "Models/Ajax/Basket.php",
    data: {
      getNumBasket: "true"
    },
    success: function(data) {
    //   result=data;
    console.log("ti" + data);
    $(".getNumBasket").text(data);
    
    }
  }); 
}

function updateProductOnBasket(value, id, size)
{
  console.log(value);
  $.ajax({
    type: "POST",
    url: "Models/Ajax/Basket.php",
    data: {
      sneaker: id,
      quantity: value, 
      size: size,
      updateProductOnBasket: "true"
    },
    success: function(data) {
    //   result=data;
    console.log("ti" + data);
      getNumBasket();
      // $("[name='price']").text("recharger la page");

    }
  }); 
}