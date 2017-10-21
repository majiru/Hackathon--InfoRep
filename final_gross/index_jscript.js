function open_menu() {
    document.getElementById("m_side_menu").style.width = "160px";
}

function close_menu() {
    document.getElementById("m_side_menu").style.width = "0px";
}

/*fake loading*/
function loading_page(){
    setTimeout(close_loading,1500);
}

function close_loading(){
    document.getElementById("loading_bar").style.display="none";
    document.getElementById("loading_overlay").style.display="none";
}

function open_about(){
    document.getElementById("about_info").style.display="block";
}

function close_about(){
    document.getElementById("about_info").style.display="none";
}

function open_devs(){
    document.getElementById("devs_info").style.display="block";
}

function close_devs(){
    document.getElementById("devs_info").style.display="none";
}