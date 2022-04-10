<?php
include "connection.php";

print_r($_POST);

if(isset($_POST["name"]) && $_POST["name"] != "" && strlen($_POST["name"]) >= 3) {
    $Name = $_POST["name"];
}else{
    die ("Enter a valid input");
}

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

if(isset($_POST["confirmpass"]) && $_POST["confirmpass"] != "" && strlen($_POST["confirmpass"]) >= 3) {
    $ConfirmPass = $_POST["confirmpass"];
}else{
    die ("Enter a valid input");
}



$sql1="SELECT * FROM users WHERE Email=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$Email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();



if(empty($row)){
    $sql2 = "INSERT INTO users (Name, Email, Pass) VALUES (?, ?, ?);"; #add the new user to the database
    $stmt2 = $connection->prepare($sql2);
    $stmt2->bind_param("sss", $Name, $Email, $hash);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    session_start();
    $_SESSION["name"] = $Name;
    header('location: ../login.php');
    $_SESSION["checking"] = "";
    }
    else{
        session_start();
        $_SESSION["checking"] = "EMAIL TAKEN";
        header('location: ../index.php');
    }




?>