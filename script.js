function changeColors(raiser){	
    
    var elems = parent.frames["menu"].document.getElementsByClassName("menu_elem");
    for (var i = 0; i < elems.length; i++){
        elems[i].style.backgroundColor = "#145E5B";
    }
    parent.frames["menu"].document.getElementById(raiser).style.backgroundColor = "#DDDDDD";
}

