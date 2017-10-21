<?php 

class jsonStorage {
    public $array = NULL;
    public $time = NULL;
    public $dataType = NULL;
}


function storeJson($dataType, $data){
    $jsonObj = createObject($dataType, $data); 
    writeJson($jsonObj);
}


function createObject($dataType, $data){
    $store = new jsonStorage();
    $store->array = $data;
    $store->dataType = $dataType;
    $store->time = time();
    return $store;
}


function writeJson($jsonObj){
    unlink($jsonObj->dataType . ".json");
    $fileBuff = fopen($jsonObj->dataType . ".json", "w");
    fwrite($fileBuff, json_encode($jsonObj));
    fclose($fileBuff);
}

function readJson($fileName){
    if(!file_exists($fileName)) return NULL;
    $fileBuff = fopen($fileName, "r");
    $jsonObj = json_decode(fgets($fileBuff));
    fclose($fileBuff);
    return $jsonObj;

}


function shouldUpdate($dataType){
    $jsonObj = readJson($dataType . ".json");
    if($jsonObj == NULL) return 1;
    if(time() - $jsonObj->time > 300000){
        return 1;
    }
    return 0;

}

function getStoredArray($dataType){
    $jsonObj = readJson($dataType . ".json");
    if($jsonObj == NULL) return NULL;
    return $jsonObj->array;
}

?>
