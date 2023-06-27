function checkAddressifExist()
{
    $.ajax({
    type: "POST",
    url: "Controllers/user/CostumersControllerHandle.php",
    data: {
      title: $("input[name='title'").val(),
      address: $("input[name='address']").vala(),
      zip_code: $("input[name='zip_code']").val(),
      city: $("input[name='city']").val(),
      description: $("textarea[name='description']").val(),
      addressExist: "true"
    },
    success: function(data) {
    //   result=data;
    
    
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

