<?php 
include "connection.php";

$exp_id = $_GET["id"];

$query = "DELETE from expenses where expenses.Id = ?";
$obj = $connection->prepare($query);
$obj->bind_param("s", $exp_id);
$obj->execute();

$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;

?>