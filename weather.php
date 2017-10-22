<!DOCTYPE html>

<?php
require 'weatherBackend.php';
?>

<html>
<head>
    <script type="text/javascript" src="index_jscript.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="index_stylesheet.css" />
    <meta charset="UTF-8" />
    <title>b-esc: wokstar?</title>
    <style></style>
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
    <a href="weather.php">
        <img src="weather-icon.png" width="30px" height="30px">
        Weather
    </a>
    <a href="stocks.php">
        <img src="stocks-icon.png" width="30px" height="30px">
        Stocks
    </a>
    <div style="position: relative; margin-left: 0.5%; top: 40%;">
        <a href="https://github.com/sinfulspartan/Hackathon--InfoRep" target="_blank" class="popup" style="font-size: 17px">
            <img src="chris.png" width="30px" height="30px">
            Git
        </a>
        <a href="chris.com" target="_blank" class="popup" style="font-size: 17px">
            <img src="Twitter-icon.png" width="30px" height="30px">
            Twitter
        </a>
    </div>
    </div>
    <span style="font-size:45px;cursor:pointer" onclick="open_menu()">?</span>

    <!-- Div's to show all Tiles -->
    <div class="row" id="fade_flex">
        <div class="tile" onclick="open_settings()">
            <h1>Sunrise</h1>
            <?php
            $weather =  json_decode( getWeatherData('Ames, ia'));
            echo("<p class='sunrise'>" . $weather->sunrise . "</p>");
            ?>
        </div>
        <div class="tile">
            <h1>Temperature</h1>
            <?php
            $weather =  json_decode( getWeatherData('Ames, ia'));
            echo("<p class='tempLow'>Low:" . $weather->tempLow . "</p>");
            echo("<p class='tempHigh'>High:" . $weather->tempHigh . "</p>");
            echo("<p class='precip'>Chance of rain:" . $weather->precip . "</p>");
            ?>

        </div>
        <div class="tile">
            <h1>Sunset</h1>
            <?php
            $weather =  json_decode( getWeatherData('Ames, ia'));
            echo("<p class='sunrise'>" . $weather->sunset . "</p>");
            ?>
        </div>
        <?php
        $forecast =  json_decode( getForecastData('Ames, ia',3));
        echo("<div class='tile'>");
        echo("<h1>" .$forecast[0]->date ."</h1>");
        echo("<p>Low:" . $forecast[0]->tempLow . "</p>");
        echo("<p>High:" . $forecast[0]->tempHigh . "</p>");
        echo("<p>Chance of rain:" . $forecast[0]->precip . "%</p>");
        echo("</div>");
        echo("<div class='tile'>");
        echo("<h1>" .$forecast[13]->date ."</h1>");
        echo("<p>Low:"  . $forecast[13]->tempLow . "</p>");
        echo("<p>High:" . $forecast[13]->tempHigh . "</p>");
        echo("<p>Chance of rain:" . $forecast[13]->precip . "%</p>");
        echo("</div>");
        echo("<div class='tile'>");
        echo("<h1>" .$forecast[20]->date ."</h1>");
        echo("<p>Low:"  . $forecast[20]->tempLow . "</p>");
        echo("<p>High:" . $forecast[20]->tempHigh . "</p>");
        echo("<p>Chance of rain:" . $forecast[20]->precip . "%</p>");
        echo("</div>");
        ?>
        
         
    </div>




</body>
</html>
