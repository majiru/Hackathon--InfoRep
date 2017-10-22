<?php
class stockPrefs{
    public $listOfCur = array("USD", "EUR", "ILS", "INR"); 
    public $boxFromCur = array("BTC","GBP", "RUB", "JPY", "CNY", "KRW" );
}


function storePrefs($prefObj){
    $filename = "StockPref.json";
    if(file_exists($filename)) unlink($filename);
    $fileBuff = fopen($filename, "w");
    fwrite($fileBuff, json_encode($prefObj));
    fclose($fileBuff);
}


function getPrefs(){
    $filename = "StockPref.json";
    if(!file_exists($filename)){
        $newPrefs = new stockPrefs();
        storePrefs($newPrefs);
    } 
    $fileBuff = fopen($filename, "r");
    $output = json_decode(fgets($fileBuff));
    fclose($fileBuff);
    return $output;
}

?>
