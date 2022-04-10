<?php
include "connection.php";

$categName = $_REQUEST["catgoryName"];
$userId =$_REQUEST["userId"];



$sql1="INSERT INTO categories (`Name`, `UserId`) VALUES (?,?);"; #Check if the user already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("si",$categName, $userId);
$stmt1->execute();
/* $result = $stmt1->get_result();

$arr_rows = array();
while( $rows =  $result->fetch_assoc() ){
    $arr_rows[] = $rows;
}
*/
$json = json_encode($_REQUEST);

echo $json; 



?>