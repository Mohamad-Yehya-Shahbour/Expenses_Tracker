<?php
include "connection.php";

if (isset($_GET["userId"])){
    $userId = $_GET["userId"];
}else{
    $userId = $_GET["id"];
}




$sql1="SELECT * , SUM(expenses.Value) as sum 
FROM expenses, categories
WHERE expenses.CategoryId = categories.Id AND expenses.UserId = ?
GROUP BY categories.Name;"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("i",$userId);
$stmt1->execute();
$result = $stmt1->get_result();

$arr_rows = array();
while( $rows =  $result->fetch_assoc() ){
    $arr_rows[] = $rows;
}

$json = json_encode($arr_rows);

echo $json; 



?>