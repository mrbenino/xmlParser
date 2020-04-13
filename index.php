<?php
function objectToMyModel($array_iteam,$model){
    foreach($array_iteam as $key => $value) {
        $model[$key] =$value;
    }return $model;
}
if (file_exists('200406104654_151394_2.XML')) {
    $xml = simplexml_load_file('200406104654_151394_2.XML');
    $json = json_encode($xml);
    $array = json_decode($json);
    //print_r($array->POSTOBJECT->Id);
    //print_r($array->POSTOBJECT->AC->SMDOCUMENTS);
    //print_r($array->POSTOBJECT->AC);
    $arrayModels = array();
    foreach($array->POSTOBJECT as $postObject){
        $model = array();
        foreach ($postObject->AC as $value) {
            $model = objectToMyModel($value,$model);
        }
        array_push($arrayModels,/*(object)*/$model); // casting to an object is optional
    }
    // print_r($arrayModels);
    //objectToMyModel($array->POSTOBJECT->AC->SMDOCUMENTS);
} else {exit('Не удалось открыть файл 200406104654_151394_2.XML.');}
?>
