document.addEventListener("DOMContentLoaded", function(){
    getNumBasket();
})

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