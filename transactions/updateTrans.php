<?php
session_start();

include '../db_connection.php';
$trans = include '../fetch_data.php';

$table_name = $_SESSION['table'];
$id = $_SESSION['trans-id'];
$patientID = $_POST['patientName'];
$vaxID = $_POST['vaxAdministered'];
$workerID = $_POST['workerInCharge'];

$patientQuery = "SELECT `Child_First_Name`, `Child_Last_Name` FROM `patients` WHERE $patientID = `Patient_ID`";
$vaxQuery = "SELECT `Brand`, `Type` FROM `vaccines` WHERE $vaxID = `Vaccine_ID`";
$workerQuery = "SELECT `First_Name`, `Last_Name` FROM `healthworkers` WHERE $workerID = `Worker_ID`";
$dateQuery = "SELECT `Date_Administered` FROM `transactions` WHERE $id = `Transaction_ID`";

$stmt = $conn->prepare($patientQuery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$p = $stmt->fetchAll();
$patientName = $p[0]['Child_First_Name'].' '.$p[0]['Child_Last_Name'];

$stmt = $conn->prepare($vaxQuery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$v = $stmt->fetchAll();
$vax = $v[0]['Brand'].' - '.$v[0]['Type'];

$stmt = $conn->prepare($workerQuery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$w = $stmt->fetchAll();
$workerName = $w[0]['First_Name'].' '.$w[0]['Last_Name'];

$stmt = $conn->prepare($dateQuery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$d = $stmt->fetchAll();
$date = $d[0]['Date_Administered'];

try {
    $query = "UPDATE `transactions` SET `Patient_ID` = $patientID, `Vaccine_ID` = $vaxID, `Worker_ID` = $workerID, `Patient_Name` = '$patientName', `Vaccine_Administered` = '$vax', `Worker_In_Charge` = '$workerName', `Date_Administered` = '$date' WHERE $id = `Transaction_ID`";

    include "db_connection.php";
    
    $conn->exec($query);
    $response = [
        'success' => true, 
        'message' => 'Transaction successfully updated.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: ../transactions/transactions.php");
