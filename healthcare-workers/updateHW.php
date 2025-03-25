<?php
session_start();
include '../db_connection.php';

$table_name = $_SESSION['table'];
$id = $_SESSION['hw-id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$age = $_POST['age'];
$address = $_POST['address'];
$email = $_POST['email'];
$contactNumber = $_POST['contactNumber'];
$role = $_POST['role'];
$dateQuery = "SELECT `Date_Added` FROM `healthworkers` WHERE $id = `Worker_ID`";

var_dump($_POST, $id);

$stmt = $conn->prepare($dateQuery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$d = $stmt->fetchAll();
$date = $d[0]['Date_Added'];

try {
    $query = "UPDATE `healthworkers` SET `Date_Added` = '$date', `First_Name` = '$firstName', `Last_Name` = '$lastName', `Password` = '$password', `Age` = $age, `Contact_Number` = '$contactNumber', `Email` = '$email', `Address` = '$address', `Role` = '$role'  WHERE $id = `Worker_ID`";

    include "db_connection.php";
    
    $conn->exec($query);
    $response = [
        'success' => true,
        'message' => 'Healthcare Worker Record successfully updated.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: ../healthcare-workers/healthworkers.php"); 
