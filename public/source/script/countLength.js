function countLength()
{
    var text = $(".countLength > span");
    var bloctext = $(".textarea");
    text.text(bloctext.val().length);
}