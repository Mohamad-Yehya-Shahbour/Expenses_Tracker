<?php 
include "connection.php";

$exp_id = $_GET["id"];

$userId = $_POST["userId"];
$categoryName = $_POST["categoryName"];
$expenseDate = $_POST["expenseDate"];
$amount = $_POST["amount"];

$sql1="SELECT * FROM categories WHERE categories.Name = ?;"; #Check if the user already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$categoryName);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

$categoryId = $row["Id"];




$query = "UPDATE expenses SET `Value` = ?, `Date` = ?, `UserId` = ?, `CategoryId` = ? where expenses.Id = ?;";
$obj = $connection->prepare($query);
$obj->bind_param("sssss", $amount, $expenseDate, $userId, $categoryId, $exp_id);
$obj->execute();

//$_POST["id"] = $exp_id;

$response = [];
$response["success"] = 1;

$response_json = json_encode($_POST);
echo $response_json;

?>