var menu;
var blockMenu;
var menuBackground;
var lastScroll = 0;
var menuUp = false;
document.addEventListener("DOMContentLoaded", () => {
    menu = document.getElementById("menu");
    blockMenu = document.getElementById("blockMenu");
    menuBackground = document.getElementById("menuafterScroll");
    if(window.innerWidth > 450)
    {
        console.log(document.getElementById("menu"));
        blockMenu.style.height = menu.offsetHeight + "px";
    }
    
    titleSelected();
})
var menu = 0;
function menuopen()
{
    if(menu == 0)
    {
        $(".menuforScroll").css({"max-height": "fit-content", "overflow": "visible"});
        menu = 1;
    }
    else
    {
        $(".menuforScroll").css({"max-height": "0", "overflow": "hidden"});
        menu = 0;
    }
}
document.addEventListener("scroll", (e) => {
    if(window.innerWidth > 450)
    {
    var scroll = window.scrollY;
    if(window.scrollY < blockMenu.offsetHeight && menuUp == false)
    {
        menu.style.top = 0 - window.scrollY + "px";
    }
    else if(window.scrollY >= blockMenu.offsetHeight && !menu.classList.contains("menuScroll") && menuUp == false)
    {
        menu.style.top = 0 + "px";
        menu.classList.add("menuScroll");
        menuBackground.classList.add("menuafterScroll");
        menuUp = true;
    }
    else if(window.scrollY == 0)
    {
        menu.classList.remove("menuScroll");
        menuBackground.classList.remove("menuafterScroll");
        menuUp = false;
    }
    else if(window.scrollY > blockMenu.offsetHeight && lastScroll > scroll)
    {
        menu.style.transform = "translateY(0%)";
    }
    else if(window.scrollY > blockMenu.offsetHeight && lastScroll < scroll)
    {
        menu.style.transform = "translateY(-100%)";
    }
    lastScroll = window.scrollY;
    }
    
})

const paramUrl = window.location.search;
const params = new URLSearchParams(paramUrl);
const Url = window.location.pathname;
const splitUrl = Url.split("/");
function titleSelected()
{
    
    const parameter = splitUrl[2];
    document.getElementById(parameter).classList.add("TitleSelect");
}