<?php
include "connection.php";

$userid = $_GET["id"];

$sql1="SELECT *, expenses.Id as expId  FROM expenses, categories WHERE expenses.CategoryId = categories.Id AND expenses.UserId = ? ;"; #Check if the user already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("i",$userid,);
$stmt1->execute();
$result = $stmt1->get_result();

$arr_rows = array();
while( $rows =  $result->fetch_assoc() ){
    $arr_rows[] = $rows;
}

$json = json_encode($arr_rows);

echo $json;



?>