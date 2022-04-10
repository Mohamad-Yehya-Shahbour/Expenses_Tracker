<?php
include "connection.php";

$userId = $_REQUEST["userId"];
$categoryName = $_REQUEST["categoryName"];
$expenseDate = $_REQUEST["expenseDate"];
$amount = $_REQUEST["amount"];



$sql1="SELECT * FROM categories WHERE categories.Name = ?;"; #Check if the user already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$categoryName);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

$categoryId = $row["Id"];

$sql2="INSERT INTO expenses (`Value`, `Date`, `UserId`, `CategoryId`) VALUES (?,?,?,?);"; #Check if the user already exists in the database
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ssii", $amount, $expenseDate, $userId, $categoryId);
$stmt2->execute();
$id = $stmt2->insert_id;

$_REQUEST["id"] = $id;
/*
$arr_rows = array();
while( $rows =   ){
    $arr_rows[] = $rows;
}
*/
$json = json_encode($_REQUEST);

echo $json; 



?>