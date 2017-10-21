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

function loading_page_non_home(){
    setTimeout(close_loading_non_home,1500);
}

function close_loading(){
    document.getElementById("loading_bar").style.display="none";
    document.getElementById("loading_overlay").style.display="none";
    document.getElementById("fade_up").style.display="block";
    document.getElementById("fade_up1").style.display="block";
}

function close_loading_non_home(){
    document.getElementById("loading_bar").style.display="none";
    document.getElementById("loading_overlay").style.display="none";
    document.getElementById("fade_flex").style.display="flex";

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

