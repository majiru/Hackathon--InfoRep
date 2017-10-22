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

function open_settings(tile_number,targ_page){
    document.getElementsByClassName("queue_vanish")[Number(tile_number)].style.display="none";
    document.getElementsByClassName("frame")[Number(tile_number)].style.display="block";
    document.getElementsByClassName("frame")[Number(tile_number)].src = targ_page;
    document.getElementsByClassName("exit_button")[Number(tile_number)].style.display="block";
}

function close_settings(tile_number){
    document.getElementsByClassName("queue_vanish")[Number(tile_number)].style.display="block";
    document.getElementsByClassName("frame")[Number(tile_number)].style.display="none";
    document.getElementsByClassName("exit_button")[Number(tile_number)].style.display="none";
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    let load_targ = results[2];

    if(load_targ=="stocks1"){
        document.getElementsByClassName("settings_option")[0].style.display="block";
    }
    if(load_targ=="stocks2"){
        document.getElementsByClassName("settings_option")[1].style.display="block";
    }
    if(load_targ=="stocks3"){
        document.getElementsByClassName("settings_option")[2].style.display="block";
    }
    if(load_targ=="stocks4"){
        document.getElementsByClassName("settings_option")[3].style.display="block";
    }
    if(load_targ=="stocks5"){
        document.getElementsByClassName("settings_option")[4].style.display="block";
    }
    if(load_targ=="stocks6"){
        document.getElementsByClassName("settings_option")[5].style.display="block";
    }

    if(load_targ=="weather1"){
        document.getElementsByClassName("settings_option")[6].style.display="block";
    }
    if(load_targ=="weather2"){
        document.getElementsByClassName("settings_option")[7].style.display="block";
    }
    if(load_targ=="weather3"){
        document.getElementsByClassName("settings_option")[8].style.display="block";
    }
    if(load_targ=="weather4"){
        document.getElementsByClassName("settings_option")[9].style.display="block";
    }
    if(load_targ=="weather5"){
        document.getElementsByClassName("settings_option")[10].style.display="block";
    }
    if(load_targ=="weather6"){
        document.getElementsByClassName("settings_option")[11].style.display="block";
    }

    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


