function checkAddress()
{
  var title = $("input[name='title'").val();
  var address = $("input[name='address']").val();
  var zip_code = $("input[name='zip_code']").val();
  var city = $("input[name='city']").val();
  var description = $("textarea[name='description']").val();
    $.ajax({
    type: "POST",
    url: "Controllers/user/CostumersControllerHandle.php",
    data: {
      title: title,
      address: address,
      zip_code: zip_code,
      city: city,
      description: description,
      addressExist: "true"
    },
    success: function(data) {
    //   result=data;
    console.log(data);
    
    
    }
  }); 
}

function updateAddress()
{
  $.ajax({
    type: "POST",
    url: "Controllers/user/CostumersControllerHandle.php",
    data: {
      updateAddress: "true"
    },
    success: function(data) {
    //   result=data;

    }
  }); 
}

