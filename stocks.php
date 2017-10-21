<!DOCTYPE html>

<?php
    require 'stocksBackend.php';
    $BTC = getExchangeRate("BTC", "USD");
    $EUR = getExchangeRate("EUR", "USD");
    $listOfCur = array("USD", "EUR", "ILS", "INR"); 

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
    <a href="index.html">about / home</a>
    <a href="https://github.com/sinfulspartan/Hackathon--InfoRep">github</a>
    <a href="weather.html">weather</a>
    <a href="stocks.html">stocks</a>
</div>
<span style="font-size:45px;cursor:pointer" onclick="open_menu()">★</span>

<!-- Div's to show all Tiles -->
<div class="row" id="fade_flex" >
    <div class="tile"  onclick="open_settings()">
        <iframe style="display: none" id="frame" src="settings.html" frameborder="0"></iframe>
        <div id="queue_vanish">
            <h1 >Stock 1</h1>
            <p> High</p>
            <p> Low </p>
            <p> Low </p>
            <p> Low </p>
            <p> Low </p>
        </div>
    </div>
    <div class="tile">
        <h1>BTC</h1>
        <?php 
        foreach($listOfCur as $cur){
            echo("<p>" .getExchangeRate("BTC", $cur) . "</p>");
        }
        ?>

    </div>
    <div class="tile">
        <h1>EUR</h1>
        <p> <?php echo $EUR ?></p>
        <p> Low </p>
        <p> Low </p>
        <p> Low </p>
        <p> Low </p>

    </div>

    <div class="tile">
        <h1>Stock 4</h1>
        <p> High</p>
        <p> Low </p>
        <p> Low </p>
        <p> Low </p>
        <p> Low </p>
    </div>
    <div class="tile">
        <h1>Stock 5</h1>
        <p> High</p>
        <p> Low </p>
        <p> Low </p>
        <p> Low </p>
        <p> Low </p>

    </div>
    <div class="tile">
        <h1>Stock 6</h1>
        <p> High</p>
        <p> Low </p>
        <p> Low </p>
        <p> Low </p>
        <p> Low </p>

    </div>
</div>




</body>
</html>
