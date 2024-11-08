<?php
include '..\db_connection.php';

session_start();

$table_name = $_SESSION['table'];
$patient = $_POST['patientName'];
$vaccine = $_POST['vaxAdministered'];
$worker = $_POST['workerInCharge'];

$patientQuery = "SELECT `Child_First_Name`, `Child_Last_Name` FROM `patients` WHERE $patient = `Patient_ID`";
$vaxQuery = "SELECT `Brand`, `Type` FROM `vaccines` WHERE $vaccine = `Vaccine_ID`";
$workerQuery = "SELECT `First_Name`, `Last_Name` FROM `healthworkers` WHERE $worker = `Worker_ID`";

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
try {
    $insert = "INSERT INTO
                    $table_name(Date_Administered, Patient_ID, Vaccine_ID, Worker_ID, Patient_Name, Vaccine_Administered, Worker_In_Charge)
                VALUES 
                    (NOW(),'".$patient."', '".$vaccine."','".$worker."','".$patientName."', '".$vax."', '".$workerName."')";
                    var_dump($insert);
    
    include "db_connection.php";
    
    $conn->exec($insert);
    $response = [
        'success' => true, 
        'message' => 'Transaction successfully added to the system.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: /transactions/transactions.php");


