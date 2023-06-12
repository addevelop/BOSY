$(document).ready(function(){

$("[data-click='addProductDirect'").click(function(e){
    addProductDirect($(e.target).attr("data-product"), 1);
    console.log(window.location.href);
})

});

function addProductDirect(idsneaker, quantity)
{
  console.log("heu");
$.ajax({
    type: "POST",
    data: {
      sneaker: idsneaker,
      quantity: quantity,
      type: "direct"
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
    $("#getNumBasket").text(data);
    
    }
  }); 
}