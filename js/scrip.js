var nav = document.getElementById("nav");
var menu = document.getElementById("menu-list");
var iconMenu = document.getElementById("icon-menu");
var menuHeight = nav.clientHeight;
var menuLogo = document.getElementById("menu-logo");
var iconMenuRP = document.getElementById("icon-menu-rp");
        
iconMenu.onclick = function(){
console.log(menuHeight)
    var isClosed = nav.clientHeight === menuHeight;
    if(isClosed) {
        menuLogo.style.display = 'none';
        iconMenuRP.style.display = 'none';
        menu.style.display = 'block';
        nav.style.height = 'auto';
    }else{
        menuLogo.style.display = 'block';
        iconMenuRP.style.display = 'block';
        menu.style.display = 'none';
        nav.style.height = '60px';
    }
}