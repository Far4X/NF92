function changeColors(raiser){	
    
    var elems = document.getElementsByClassName("menu_elem");
    for (var i = 0; i < elems.length; i++){
        elems[i].style.backgroundColor = "#145E5B";
    }
    document.getElementById(raiser).style.backgroundColor = "#DDDDDD";
}

