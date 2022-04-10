<?php
include "connection.php";



if(isset($_POST["email"]) && $_POST["email"] != "" && strlen($_POST["email"]) >= 5) {
    $Email = $_POST["email"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["pass"]) && $_POST["pass"] != "" && strlen($_POST["pass"]) >= 3) {
    $Pass = $_POST["pass"];
    $hash = hash('sha256', $Pass);
}else{
    die ("Enter a valid input");
}




$sql1="SELECT * FROM `users` WHERE users.Email=? AND users.Pass=?;"; #Check if the user already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$Email, $hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();







$count = mysqli_num_rows($result);



if($count != 0){
    $Name = $row["Name"];
    $Id = $row["Id"];
    session_start();

    $_SESSION["userId"] = "$Id";

    header('location: ../home.php');
    $_SESSION["checking"] = "";

    $connection -> close();
    }
    else{
        session_start();
        $_SESSION["checking"] = "enter valid input";
        header('location: ../login.php');
    }


?>