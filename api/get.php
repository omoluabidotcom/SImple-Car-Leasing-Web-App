<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: appoication.json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Hedaers: Access-Control-Allow-Hedaers Access-Control-Allow-Methods, Content-Type, X-Requested-with, Authorization ');

include_once '../config/Database.php';
include_once '../model/cars.php';

$instandb = new Database();
$db = $instandb->connect();

$instancars = new cars($db);

$data = json_decode(file_get_contents("php://input"));
$instancars->cars_id = $data->cars_id;

$result = $instancars->getLocation();

if($result) {

    $response = array();
    $response['data'] = array();
    
    $get_arr = array(
            'latitude' => $result['latitude'],
            'longitude' => $result['longitude']
        );

    array_push($response['data'], $get_arr);


    echo json_encode(array(
        "status" => "true",
        "message" => "",
        "data" => $response['data'],
        "http_code" => "200"
    ));

} else {

    echo json_encode(array(
        "status" => "false",
        "message" => "Unable to fetch data",
        "data" => "null",
        "error_code" => "400"
    ));
}

?>