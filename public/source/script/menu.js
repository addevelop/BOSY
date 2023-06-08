var menu = document.getElementById("menu");
var blockMenu = document.getElementById("blockMenu");
var menuBackground = document.getElementById("menuafterScroll");
var lastScroll = 0;
var menuUp = false;
document.addEventListener("DOMContentLoaded", () => {
    blockMenu.style.height = menu.offsetHeight + "px";
    titleSelected();
})
document.addEventListener("scroll", (e) => {
    var scroll = window.scrollY;
    console.log(menuUp);
    if(window.scrollY < blockMenu.offsetHeight && menuUp == false)
    {
        console.log("1")
        menu.style.top = 0 - window.scrollY + "px";
    }
    else if(window.scrollY >= blockMenu.offsetHeight && !menu.classList.contains("menuScroll") && menuUp == false)
    {
        console.log("2");
        menu.style.top = 0 + "px";
        menu.classList.add("menuScroll");
        menuBackground.classList.add("menuafterScroll");
        menuUp = true;
    }
    else if(window.scrollY == 0)
    {
        console.log("3");
        menu.classList.remove("menuScroll");
        menuBackground.classList.remove("menuafterScroll");
        menuUp = false;
    }
    else if(window.scrollY > blockMenu.offsetHeight && lastScroll > scroll)
    {
        console.log("4");
        menu.style.transform = "translateY(0%)";
    }
    else if(window.scrollY > blockMenu.offsetHeight && lastScroll < scroll)
    {
        console.log("5");
        menu.style.transform = "translateY(-100%)";
    }
    console.log("t");
    lastScroll = window.scrollY;
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