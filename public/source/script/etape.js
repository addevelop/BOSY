document.addEventListener("DOMContentLoaded", function(){
    etape(1);
    etape2();
    etape3();
})

function etape(n)
{
    $("[data-etape='" + n + "']").css("opacity", "1");
    $(".datasectionetape").css("display", "none");
    $("[data-sectionetape='" + n + "']").css("display", "block");
}

$("#etape2").find("input").on("keyup", function(){
    etape2();
})
$("#etape3").find("input").click(function(){
    etape3();
})
function etape2()
{
    var address = true;
    $("#etape2").find("input").each((ind, element) => {
        if($(element).val() == "")
        {
            $(element).css("border", "1px solid red");
            address  = false;
        }
        else
        {
            $(element).css("border", "1px solid black");
        }
    });

    if(address == true)
    {
        checkAddressifExist();
        $("[data-click='2']").css("display", "block");
    }
}

function etape3()
{
    var etape3 = false;
    $("#etape3").find("input").each(function(item, index){
        console.log(index);
        if($(index).is(':checked'))
        {
            $("p[data-click='3']").css("display", "block");
        }
    })
    
}