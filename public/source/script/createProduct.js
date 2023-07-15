function appear(e)
{
    var input = e.attr("data-click");
    if(Math.floor(e.val()) != e.val())
    {
        $("." + input).css("display", "block");
    }
    else
    {
        $("." + input).css("display", "none");
        $("." + input).children("input").val("");
    }
    
}