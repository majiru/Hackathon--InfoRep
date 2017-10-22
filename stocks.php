<!DOCTYPE html>

<?php
    require 'stocksBackend.php';
    require 'tilePrefs.php';
    $prefs = getPrefs();
?>

<html>
<head>
    <script type="text/javascript" src="index_jscript.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="index_stylesheet.css">
    <meta charset="UTF-8">
    <title>b-esc: wokstar★</title>
    <style>
    </style>
</head>
<body onload="loading_page_non_home()" style="background-color: #f1eee9">
<div id="loading_overlay">
    <div id="loading_bar"></div>
</div>

<div id="m_side_menu" class="side_menu">
     <a href="javascript:void(0)" class="side_close" onclick="close_menu()">&times;</a>
     <a href="index.html">
        <img src="home-icon.png" width="30px" height="30px">
        Home
    </a>
    <a href="weather.html">
        <img src="weather-icon.png" width="30px" height="30px">
        Weather
    </a>
    <a href="stocks.html">
        <img src="stocks-icon.png" width="30px" height="30px">
        Stocks
    </a>
    <div style="position: relative; margin-left: 0.5%; top: 40%;">
        <a href="https://chris.com" target="_blank" class="popup" style="font-size: 17px">
            <img src="chris.png" width="30px" height="30px">
            Git
        </a>
        <a href="facebook.com" target="_blank" class="popup" style="font-size: 17px">
            <img src="Twitter-icon.png" width="30px" height="30px">
            Twitter
        </a>
    </div>
</div>
<span style="font-size:45px;cursor:pointer" onclick="open_menu()">★</span>

<!-- Div's to show all Tiles -->
<div class="row" id="fade_flex" >
    <div class="tile">
        <div style="display: none" onclick="close_settings(0)" class="exit_button">x</div>
        <iframe style="display: none" class="frame"  frameborder="0"></iframe>
        <div class="queue_vanish" onclick="open_settings(0,'settings.html?property=stocks1')">
            <h1><?php echo $prefs->boxFromCur[0];  ?></h1>
			<?php 
				foreach($prefs->listOfCur as $cur){
					echo("<p>" .getExchangeRate($prefs->boxFromCur[0], $cur) . "</p>");
				}
			?>
        </div>
    </div>

    <div class="tile">
        <div style="display: none" onclick="close_settings(1)" class="exit_button">x</div>
        <iframe style="display: none" class="frame" frameborder="0"></iframe>
        <div class="queue_vanish" onclick="open_settings(1,'settings.html?property=stocks2')">
            <h1><?php echo $prefs->boxFromCur[1];  ?></h1>
			<?php 
				foreach($prefs->listOfCur as $cur){
					echo("<p>" .getExchangeRate($prefs->boxFromCur[1], $cur) . "</p>");
				}
			?>
        </div>
    </div>

    <div class="tile">
        <div style="display: none" onclick="close_settings(2)" class="exit_button">x</div>
        <iframe style="display: none" class="frame" frameborder="0"></iframe>
        <div class="queue_vanish" onclick="open_settings(2,'settings.html?property=stocks3')">
            <h1><?php echo $prefs->boxFromCur[2];  ?></h1>
			<?php 
				foreach($prefs->listOfCur as $cur){
					echo("<p>" .getExchangeRate($prefs->boxFromCur[2], $cur) . "</p>");
				}
			?>
        </div>
    </div>

    <div class="tile">
        <div style="display: none" onclick="close_settings(3)" class="exit_button">x</div>
        <iframe style="display: none" class="frame"  frameborder="0"></iframe>
        <div class="queue_vanish" onclick="open_settings(3,'settings.html?property=stocks4')">
            <h1><?php echo $prefs->boxFromCur[3];  ?></h1>
			<?php 
				foreach($prefs->listOfCur as $cur){
					echo("<p>" .getExchangeRate($prefs->boxFromCur[3], $cur) . "</p>");
				}
			?>
        </div>
    </div>

    <div class="tile">
        <div style="display: none" onclick="close_settings(4)" class="exit_button">x</div>
        <iframe style="display: none" class="frame"  frameborder="0"></iframe>
        <div class="queue_vanish" onclick="open_settings(4,'settings.html?property=stocks5')">
           <h1><?php echo $prefs->boxFromCur[4];  ?></h1>
			<?php 
				foreach($prefs->listOfCur as $cur){
					echo("<p>" .getExchangeRate($prefs->boxFromCur[4], $cur) . "</p>");
				}
			?>
        </div>
    </div>

    <div class="tile">
        <div style="display: none" onclick="close_settings(5)" class="exit_button">x</div>
        <iframe style="display: none" class="frame" frameborder="0"></iframe>
        <div class="queue_vanish" onclick="open_settings(5,'settings.html?property=stocks6')">
            <h1><?php echo $prefs->boxFromCur[5];  ?></h1>
			<?php 
				foreach($prefs->listOfCur as $cur){
					echo("<p>" .getExchangeRate($prefs->boxFromCur[5], $cur) . "</p>");
				}
			?>
        </div>
    </div>

</div>




</body>
</html>
