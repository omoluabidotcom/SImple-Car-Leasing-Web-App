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

$instancars->model = $data->model;
$instancars->year = $data->year;
$instancars->plate_no = $data->plate_no;
$instancars->speed = $data->speed;
$instancars->max_load = $data->max_load;
$instancars->fuel_type = $data->fuel_type;

if ($instancars->register()) {

    echo json_encode(array(
        "status" => "true",
        "message" => "car registered",
        "data" => "null",
        "http_code" => "200"
    ));
} else {

    echo json_encode(array(
        "status" => "false",
        "message" => "unable to register car",
        "data" => "null",
        "error_code" => "400"
    ));
}

?>