<?php

session_start();
include '../config/connection.php';

$userID = $_SESSION['userID'];
$idType = $_POST['idType'];
$idNumber = $_POST['idNumber'];

if($idType == "Drivers License"){
    $upd3 = "UPDATE user SET uIDType= '$idType', uIDNumber = '$idNumber', uUserVerify_License = 'Pending Driver ID' WHERE uID = '$userID'";
    $result3=mysqli_query($conn, $upd3);
    
}else{
    $upd3 = "UPDATE user SET uIDType= '$idType', uIDNumber = '$idNumber', uUserVerify_License = 'Pending Passenger Upd ID' WHERE uID = '$userID'";
    $result3=mysqli_query($conn, $upd3);
    
}

if($result3){
    $_SESSION['changeID'] = "Succesfully Changed the Identification";
    header("Location:userprofile-passenger.php");
}else{
    die(mysqli_error($conn));
}

?>